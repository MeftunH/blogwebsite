@extends('back.layouts.master')
@section('title','Create page')
@section('content')

<div class="card shadow mb-4"></div>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
              @yield('title')
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($erros->all as $error)
                    {{$error}}
                    @endforeach
                </div>
                @endif
               <form method="post" action="{{route('admin.page.create.post')}}"enctype="multipart/form-data">
                   @csrf
        <div class="form-group">
<label>page's title</label>
<input type="text" name="title" class="form-control" required> </input>
        </div>

        <div class="form-group">
<label>page's picture</label>
<input type="file" name="image" class="form-control" required> </input>
        </div>
        <div class="form-group">
<label>page's content</label>
<textarea name="content" id='editor' class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">

<label>page's content</label>
<button type="submit" class="btn btn-primary btn-block">Create</button>
        </div>
               </form>
              </div>
            </div>

@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
  $('#editor').summernote();
});
</script>

@endsection
