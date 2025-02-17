@extends('back.layouts.master')
@section('title','All pages')
@section('content')

<div class="card shadow mb-4"></div>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">We have <strong>{{$pages->count()}}</strong> pages</h6>
            </div>

            <div class="card-body">
                <div id="orderSuccess" style="display:none" class="alert alert-success">
                  Ordering was update successifully
                </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>
                          Ordering
                      </th>
                      <th>Picture</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody id="orders">
                  @foreach($pages as $page)
                    <tr id="page_{{$page->id}}">
                        <td class="text-center" style="width:5px !important"><i class="fa fa-arrows-alt-v fa-2x handle"  style="cursor:move"></td>
                      <td>
      <img src="{{asset($page->image)}}"  width="200"></td>
                      <td>{{$page->title}}</td>
                        <td>
                            <input class="switch" page-id="{{$page->id}}" type="checkbox" data-on="Active" data-off="Passive" data-onstyle="success" data-offstyle="danger" @if($page->status==1) checked @endif data-toggle="toggle">

                        </td>
                        <td>
                        <a target="_blank" href="{{route('page',$page->slug)}}" title="View" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> </a>
                        <a href="{{route('admin.page.edit',$page->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> </a>
                        <a href="{{route('admin.page.delete',$page->id)}}" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </a>
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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>
$('#orders').sortable({
handle:'.handle',
update:function()
{
   var ordering=$('#orders').sortable('serialize');
   $.get("{{route('admin.page.orders')}}?"+ordering,function(data,status){
    $("#orderSuccess").show();
setTimeout(function() { $("#orderSuccess").hide(); }, 1000);
   });
}
});
</script>
<input id="toggle-event" type="checkbox" data-toggle="toggle">
<div id="console-event"></div>
<script>
     $(function() {
        $('.switch').change(function() {
            id = $(this)[0].getAttribute('page-id');
            statu=$(this).prop('checked');
            $.get("{{route('admin.page.switch')}}", {id:id,statu:statu},  function(data, status){
  console.log(data);


            });
        })
    })
</script>
@endsection
