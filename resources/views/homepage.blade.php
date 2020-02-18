
  <!-- Main Content -->
 @extends('front.layouts.master')
 @section('title','Homepage')
 @section('content')

      <div class="col-md-9 mx-auto">
        @include('front.widgets.articlelist')
      </div>
    @include('front.widgets.categoryWidget')

@endsection
