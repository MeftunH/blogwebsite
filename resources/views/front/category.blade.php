
  <!-- Main Content -->
  @extends('front.layouts.master')
 @section('title',$category->name.' Category |||'.' we have '.count($articles).' article in this category')

 @section('content')

      <div class="col-md-9 mx-auto">
      @include('front.widgets.articlelist')
   </div>
    @include('front.widgets.categoryWidget')
@endsection
