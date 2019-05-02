@extends("admin.common.index")
@section("body")

<div class="content-wrapper">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Title Image</li>
    </ol>
    <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-image "></i> Title Image.
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tbody>
              @foreach(App\Model\TitleImage::all() as $image)
                <tr>
                <td><img style=" width: 150px; max-height:100%;" src="{{ URL::to('images/index/'.$image->image) }}"></img></td>
                    <td>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addModal" onclick="add()">Change</button>
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
				<form method="post" accept-charset="UTF-8" enctype="multipart/form-data">
					{{csrf_field()}}
					<input type="hidden" name="id" id="id" value="{{$image->id}}" >
					
					<div class="modal-body">
                        <div class="form-group">
                            <label>Change Title image</label>
                            <input type="file" accept="image/png, image/jpeg, image/gif" class="form-control" id="image" name="image" required/>
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


<script>
	

</script>

@endsection
