@extends('back.layouts.master')
@section('title','All articles')
@section('content')

<div class="card shadow mb-4"></div>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">We have <strong>{{$articles->count()}}</strong> articles</h6>
            </div>

            <div class="card-body">
                <a href="{{route('admin.trashed.article')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i>Deleted Articles</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Picture</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Hit</th>
                      <th>Creat date</th>
                      <th>Status</th>
                      <th>Operations</th>
                    </tr>

                  </thead>
                  <tbody>

                  @foreach($articles as $article)
                    <tr>
                      <td>
      <img src="{{asset($article->image)}}" width="300"></td>
                      <td>{{$article->title}}</td>
                        <td>{{$article->getCategory->name}}</td>
                        <td>{{$article->hit}}</td>
                        <td>{{$article->created_at->diffForHumans()}}</td>
                        <td>
                            <input class="switch" article-id="{{$article->id}}" type="checkbox" data-on="Active" data-off="Passive" data-onstyle="success" data-offstyle="danger" @if($article->status==1) checked @endif data-toggle="toggle">

                        </td>
                        <td>
                        <a target="_blank" href="{{route('single',[$article->getCategory->slug,$article->slug])}}" title="View" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> </a>
                        <a href="{{route('admin.articles.edit',$article->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> </a>
                        <a href="{{route('admin.delete.article',$article->id)}}" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </a>

                   </td>
                 </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

@endsection
@section ('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<input id="toggle-event" type="checkbox" data-toggle="toggle">
<div id="console-event"></div>
<script>
   $(function() {
        $('.switch').change(function() {
            id = $(this)[0].getAttribute('article-id');
            statu=$(this).prop('checked');
            $.get("{{route('admin.switch')}}", {id:id,statu:statu},  function(data, status) {});
        })
    })
</script>
@endsection
