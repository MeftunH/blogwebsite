@extends('back.layouts.master')
@section('title','Trashed')
@section('content')

<div class="card shadow mb-4"></div>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">We have <strong>{{$articles->count()}}</strong> articles</h6>
            </div>

            <div class="card-body">
                <a href="{{route('admin.articles.index')}}" class="btn btn-primary btn-sm">Active Articles</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Picture</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Hit</th>
                      <th>Creat date</th>
                      <th>Operations</th>
                    </tr>

                  </thead>
                  <tbody>

                  @foreach($articles as $article)
                    <tr>
                      <td>
      <img src="{{asset($article->image)}}" class width="200"></td>
                      <td>{{$article->title}}</td>
                        <td>{{$article->getCategory->name}}</td>
                        <td>{{$article->hit}}</td>
                        <td>{{$article->created_at->diffForHumans()}}</td>
                        <td>
                        <a href="{{route('admin.recover.article',$article->id)}}" title="Recover article and components" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i> </a>
                        <a href="{{route('admin.hard.delete.article',$article->id)}}" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </a>
                   </td>
                 </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
</div>
</script>
@endsection
