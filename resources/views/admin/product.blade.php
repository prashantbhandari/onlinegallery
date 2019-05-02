@extends("admin.common.index")
@section("body")

<div class="content-wrapper">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin/home">Dashboard</a>
      </li>

      @if($sub_category != null)
        <li class="breadcrumb-item active">
          <a href="/admin/category">Category</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="/admin/sub_category/{{$sub_category->category->id}}">{{$sub_category->category->name}}</a>
        </li>
        <li class="breadcrumb-item active">
          {{$sub_category->name}}
        </li>
      
      @else
        <li class="breadcrumb-item active">
          Product
        </li>
      
      @endif
    </ol>
    <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        @if($sub_category != null)
          <i class="fa fa-shopping-cart "></i> Products of {{$sub_category->name}} sub-category
          <a class="btn-sm btn-success pull-right" href="/admin/product-entry/{{$sub_category->id}}">Add Product</a>
        @else
          <i class="fa fa-shopping-cart "></i> All Products
          <a class="btn-sm btn-success pull-right" href="/admin/product/product-entry">Add Product</a>
        @endif
        
          

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Image</th>
                <th>Availability</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Image</th>
                <th>Availability</th>
                <th style="width: 110px;">Option</th>                    
              </tr>
            </tfoot>
            <tbody>
@foreach(App\Model\Product::all() as $product)
@if($sub_category != null)
@if($sub_category->id == $product->sub_category_id)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        <img style=" width: 60px; max-height:100%;" src="{{ URL::to('images/productimage/'.$product->productimages[0]->image) }}"></img>
                      
                    </td>
                    <td>
                      @if($product->availability == 1)
                        In Stock
                      @else
                        Out of stock
                      @endif
                    </td>
                    <td>
                  
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delete_product({{ $product->id }})">Delete</button>
					          <a class="btn btn-sm btn-primary" href="/admin/product-entry/{{$product->id}}/edit">Edit</a>
                    </td>
                </tr>
@endif
@else
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        <img style=" width: 60px; max-height:100%;" src="{{ URL::to('images/productimage/'.$product->productimages[0]->image)}}"></img>
                      
                    </td>
                    <td>
                      @if($product->availability == 1)
                        In Stock
                      @else
                        Out of stock
                      @endif
                    </td>
                    <td>
                  
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delete_product({{ $product->id }})">Delete</button>
                    <a class="btn btn-sm btn-primary" href="/admin/product-entry/{{$product->id}}/editproduct">Edit</a>
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

		<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Product</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
          <h1 class="text-center"><i class="fa fa-exclamation-circle" style="color: red;"></i></h1>
          <p class="text-center" style="color: red;">The product will be <b>permanently</b> deleted.</p>
        <p>Are you sure you want to delete the product?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" @if($sub_category != null)onclick="delete_confirm()"@else onclick="delete_confirm_all()"@endif>Delete</button>                
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


{{-- Add Delete Edit --}}
<script>
	var deleteId = -1;

	function delete_product(id){
		deleteId = id;
	}

	function delete_confirm(){
		window.location.href = "/admin/sub_category/product/"+deleteId+"/delete";
	}

  function delete_confirm_all(){
		window.location.href = "/admin/product/"+deleteId+"/delete";
	}

</script>
  

@endsection


