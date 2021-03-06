@extends("admin.common.index")
@section("body")

<div class="content-wrapper">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin/home">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">
        <a href="/admin/category">Category</a>
      </li>
      <li class="breadcrumb-item active">
        {{$category->name}}
      </li>
    </ol>
    <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-address-book "></i> SubCategory of {{$category->name}}
				<a class="btn-sm btn-success pull-right" href data-toggle="modal" data-target="#addModal" onclick="add()">Add SubCategory</a>

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>S.N</th>
                <th>SubCategory Name</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>S.N</th>
                <th>SubCategory Name</th>                   
                <th>Option</th>                    
              </tr>
            </tfoot>
            <tbody>
@foreach(App\Model\SubCategory::all() as $sub_category)
@if($category->id == $sub_category->category_id)
                <tr>
                  <td>{{$no++}}</td>
                  <td><a href="/admin/sub_category/product/{{$sub_category->id}}">{{$sub_category->name}}</a></td>
                  <td>
                  
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delete_sub_category({{ $sub_category->id }})">Delete</button>
											<span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addModal" onclick="edit_sub_category({{ $sub_category->id }})">Edit</span>
										</td>
                </tr>
@endif
@endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

  

	<!-- Add/Edit modal -->
	<div id="addModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

	<!-- Modal content-->
			<div class="modal-content">
				<form method="post" enctype="multipart/form-data">
					{{csrf_field()}}
          <input type="hidden" name="id" id="id" >
					<div class="modal-header">
						<h4 class="modal-title">Add SubCategory</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
            {{-- Form content --}}
						<div class="form-group">
							<label>SubCategory Name</label>
              <input type="text" class="form-control subcate" placeholder="SubCategory name" name="name" id="name">
              <p class="pull-right" id="subcate" style="font-size: 12px">50 characters remaining</p>
            </div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary pull-left">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>

		</div>
	</div>

		<!-- Add/Edit modal -->


		<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete SubCategory</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
          <h1 class="text-center"><i class="fa fa-exclamation-circle" style="color: red;"></i></h1>
          <p class="text-center" style="color: red;">Deleting this Subcategory will <b>permanently</b> delete all the products associated within it.</p>
        <p>Are you sure you want to delete the Subcategory?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="delete_confirm()">Delete</button>                
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


{{-- Add Delete Edit --}}
<script>
	var deleteId = -1;

	function add(){
		// $("#id").val("");
		token = $("input[name='_token']").val();
		$('input').val("");
		$("input[name='_token']").val(token);
	}

	function edit_sub_category(id){
		$.get('/admin/sub_category/'+id+'/api', function(data, status){
			$("#id").val(data.id);
			$("#name").val(data.name);
		});
	}

	function delete_sub_category(id){
		deleteId = id;
	}

	function delete_confirm(){
		window.location.href = "/admin/sub_category/"+deleteId+"/delete";
	}

</script>
  

@endsection


