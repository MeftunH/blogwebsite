
  <!-- Main Content -->
  @extends('front.layouts.master')
 @section('title',$article->title)
 @section('bg',$article->image)
 @section('content')
    <div class="col-md-9 mx-auto">
      {!!$article->content!!}
     <p>
      <span class="text-danger">  Click rate: <b>{{$article->hit}} </b>   </span>
</p>
    </div>
    @include('front.widgets.categoryWidget');

@endsection 
