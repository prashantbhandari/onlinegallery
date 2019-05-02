@extends("admin.common.index")
@section("body")

<div class="content-wrapper">
  
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin/home">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">
              About Us
      </li>
    </ol>
    <!-- Example DataTables Card-->
    
    <div class="container-fluid">
     

            <form method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id" id="id" value="{{$desc->id}}" >
                <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-phone "></i>                 
                            Add About us description
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" style="height: 300px;" class="ckeditor form-control" placeholder="Description" name="description" id="description" required>{{$desc->description}}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary pull-left">
                            Submit
                    </button>
                </div>
                </div>
            </form>
  </div>
</div>
@endsection









