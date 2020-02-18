@extends('back.layouts.master')
@section('title','All Categories')
@section('content')

<div class="row">
<div class="col md-4">
<div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Create new Category</h6>
                </div>
                <div class="card-body">
               <form method="post" action="{{route('admin.category.create')}}">
                   @csrf
                   <div class="form-group">
                       <label>Category Name</label>
                       <input type="text" class="form-control" name="category" required />
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">ADD</button>
                    </div>
               </form>
                </div>
              </div>
</div>
<div class="col mb-8">
<div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                </div>
                <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Article count</th>
                      <th>Status</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $category)
                    <tr>
                      <td>{{$category->name}}</td>
                      <td>{{$category->articleCount()}}</td>
                        <td>
                            <input class="switch" category-id="{{$category->id}}" type="checkbox" data-on="Active" data-off="Passive" data-onstyle="success" data-offstyle="danger" @if($category->status==1) checked @endif data-toggle="toggle" />
                        </td>
                        <td>
           <a category-id="{{$category->id}}" class="btn btn-sm btm-primary edit-click"  title="Edit the Category"><i class="fa fa-edit text-black"></i></a>
           <a category-id="{{$category->id}}" category-name="{{$category->name}}" category-count="{{$category->articleCount()}}" class="btn btn-sm btm-danger remove-click"  title="Remove the Category"><i class="fa fa-times text-black"></i></a>
                   </td>
                 </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
                </div>
              </div>
</div>
</div>
<!-- The Modal -->
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit the Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
    <form method="post" action={{route('admin.category.update')}}>
        @csrf
        <div class="form-group">
            <label>
                Category Name
            </label>
            <input id="category" type="text" class="form-control" name="category" />
        <input  type="hidden" name="id" id="category_id" />>
        </div>
        <div class="form-group">
            <label>
                Category Slug
            </label>
            <input id="slug" type="text" class="form-control" name="slug" />
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete the Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div id="body" class="modal-body" >
      <div class="alert alert-danger" id="articleAlert"></div>
          <div id="articleAlert">

          </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <form method="post" action="{{route('admin.category.delete')}}">
        @csrf
        <input type="hidden" name="id" id="deleteId" />
        <button id="deletebutton" type="submit" class="btn btn-success">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section ('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    $(function() {
     $('.remove-click').click(function(){

        id = $(this)[0].getAttribute('category-id');
        count = $(this)[0].getAttribute('category-count');
      name = $(this)[0].getAttribute('category-name');
        if(id==1)
        {
            $('#articleAlert').html("You can't delete "+name+" Category.");
            $('#body').show();
            $('#deletebutton').hide();
            $('#deleteModal').modal();
            return;
        }
        $('#deletebutton').show();
        $('#deleteId').val(id);
        $('#articleAlert').html('');
        $('#body').hide();
       if(count>0)
      {
$('#articleAlert').html("We have "+count+" article at the category.Are you sure delete(harddelete) this category?System will delete the articles which have this category.UwU");
$('#body').show();
}
       $('#deleteModal').modal();
        });
        $('.edit-click').click(function(){
          id = $(this)[0].getAttribute('category-id');
          $.ajax({
            type:'GET',
            url:'{{route('admin.category.getdata')}}',
            data:{id:id},
            success:function(data){
            console.log(data);
            $('#category').val(data.name);
            $('#slug').val(data.slug);
            $('#category_id').val(data.id);
            $('#editModal').modal();
            }
          });
        });
        $('.switch').change(function() {
            id = $(this)[0].getAttribute('category-id');
            statu=$(this).prop('checked');
            $.get("{{route('admin.category.switch')}}", {id:id,statu:statu},  function(data, status) {});
        })
    })
</script>
@endsection
