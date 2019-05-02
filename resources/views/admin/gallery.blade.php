@extends("admin.common.index")
@section("body")

<div class="content-wrapper">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Gallery</li>
    </ol>
    <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-image "></i> Gallery
				<a class="btn-sm btn-success pull-right" href data-toggle="modal" data-target="#addModal" onclick="add()">Add Images</a>

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>S.N</th>
                <th>Image</th>
                <th>Added at</br><small>(Year-Month-Day Hour:Minute:second)</small></th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>S.N</th>
                <th>Image</th>       
                <th><small>(Year-Month-Day Hour:Minute:second)</small></br>Added at</th>            
                <th>Option</th>                    
              </tr>
            </tfoot>
            <tbody>
              @foreach($gallery_images as $gallery)
                <tr>
                  <td>{{$loop->iteration}}</td>
                <td><img style=" width: 150px; max-height:100%;" src="{{ URL::to('images/gallery/'.$gallery->image) }}"></img></td>
                <td>{{$gallery->created_at}}</td>
                  <td>
                  
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delete_image({{$gallery->id}})">Delete</button>
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

  

	<!-- Add/Edit modal -->
	<div id="addModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

	<!-- Modal content-->
			<div class="modal-content">
				<form method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<input type="hidden" name="id" id="id" >
					
					<div class="modal-body">
						<div class="form-group">
							<label>Upload Multiple images at once</label>
                            <input type="file" accept="image/png, image/jpeg, image/gif" class="form-control" id="images" name="images[]" required multiple/>
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
        <h4 class="modal-title">Delete Category</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
          <h1 class="text-center"><i class="fa fa-exclamation-circle" style="color: red;"></i></h1>
        <p>Are you sure you want to delete the image?</p>
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
		//$("#id").val("");
		token = $("input[name='_token']").val();
		$('input').val("");
		$("input[name='_token']").val(token);
	}

	function delete_image(id){
		deleteId = id;
	}

	function delete_confirm(){
		window.location.href = "/admin/gallery/"+deleteId+"/delete";
	}

</script>

@endsection
