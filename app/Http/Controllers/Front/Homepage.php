<?php

namespace App\Http\Controllers\Front;

use Validator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;
use Mail;
class Homepage extends Controller
{
    public function __construct()
    {
        if(Config::find(1)->active==0)
        {
            return redirect()->to('nonactive')->send();
        }
        view()->share('pages',Page::where('status',1)->orderBy('order','ASC')->get());
        view()->share('categories',Category::where('status',1)->orderBy('name','ASC')->get());
    }
    public function index()
{
    $data['articles']=Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query)
    {
        $query->where('status',1);
    })->orderBy('created_at','DESC')->paginate(10);

    $data['articles']->withPath(url('page'));
    return view('homepage',$data);

}
public function single($category,$slug)
{
   $category=Category::whereSlug($category)->first() ?? abort(403,'We can not found category which you search');
    $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403,'We can not found category which you search');
    $article->increment('hit');
    $data['article']=$article;
return view('single',$data);
}
public function category($slug)
{
    $category=Category::whereSlug($slug)->first() ?? abort(403,'N0T F0UND ERR0R');
    $data['category']=$category;

    $data['articles']=Article::where('category_id',$category->id)->where('status',1)->orderBy('created_at','DESC')->paginate(2);
    return view('front.category',$data);

}
public function page($slug)
{
    $page=Page::whereSlug($slug)->first()?? abort(403,"We can not found page which you search");
    $data['page']=$page;
    return view('page',$data);
}
public function contact()
{
    return  view ('contact');
}
public function contactpost(Request $request){

    $rules=[
      'name'=>'required|min:5',
      'email'=>'required|email',
      'topic'=>'required',
      'message'=>'required|min:10'
    ];
    $validate=Validator::make($request->post(),$rules);

    if($validate->fails()){
      return redirect()->route('contact.post')->withErrors($validate)->withInput();
    }

    Mail::send([],[], function($message) use($request){
      $message->from('contact@website.com','Website');
      $message->to('stfincos@gmail.com');
      $message->setBody('From :'.$request->name.'<br />
                  Mail address :'.$request->email.'<br />
                  Title : '.$request->topic.'<br />
                  Mesage :'.$request->message.'<br /><br />
                  Date : '.now().'','text/html');
      $message->subject($request->name. ' send message!');
    });

    // $contact = new Contact;
    // $contact->name=$request->name;
    // $contact->email=$request->email;
    // $contact->topic=$request->topic;
    // $contact->message=$request->message;
    // $contact->save();
    return redirect()->route('contact.post')->with('success','Thanks.We got your message!');
  }
}
