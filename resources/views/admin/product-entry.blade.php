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
            @if($product != null)
                <a href="/admin/sub_category/{{$product->sub_category->category->id}}">{{$product->sub_category->category->name}}</a>
            @else
                <a href="/admin/sub_category/{{$sub_category->category->id}}">{{$sub_category->category->name}}</a>
            @endif
        </li>
        <li class="breadcrumb-item active">
                @if($product != null)
                    <a href="/admin/sub_category/product/{{$product->sub_category->id}}">{{$product->sub_category->name}}</a>
                @else
                    <a href="/admin/sub_category/product/{{$sub_category->id}}">{{$sub_category->name}}</a>
                @endif
        </li>
        @if($product != null)
            <li class="breadcrumb-item active">
                {{$product->name}}
            </li>
        @endif


      <li class="breadcrumb-item active">
            @if($product != null)
                Product Edit
            @else
                Product Entry
            @endif
        </li>
@else
        <li class="breadcrumb-item active">
                <a href="/admin/product">Products</a>
        </li>
        @if($product != null)
            <li class="breadcrumb-item active">
                    {{$product->name}}
            </li>
            <li class="breadcrumb-item active">
                Product Edit
            </li>
        @else
            <li class="breadcrumb-item active">
                Product Entry
            </li>
        @endif
@endif
    </ol>
    <!-- Example DataTables Card-->
    
    <div class="container-fluid">
     

            <form method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id" id="id" >
                <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-shopping-cart "></i>                 
                        @if($product != null)
                            Edit the product
                        @else
                            Fill the form to add a product
                        @endif
                </div>
                <div class="card-body">
                    <div class="card card-default">
                        <div class="card-header">Add Images</div>
                        <div class="card-body">
@if($product != null)
                                <div class="row">    
                                    <div class="col-xs-12 col-lg-12 col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-2">  
                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                        <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename" name="imagename[]" value="{{$product->productimages[0]->image}}" readonly required> <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <input type="file" class="file" accept="image/png, image/jpeg, image/gif" name="images[]"/> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div><small>This feild is required.</small><hr style="margin: 5px"/><!-- /input-group image-preview [TO HERE]--> 
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-2">  
                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                        <div class="input-group image-preview1">
                                            <input type="text" class="form-control image-preview-filename1" name="imagename[]" @if(isset($product->productimages[1]->image))value="{{$product->productimages[1]->image}}"@else value="" @endif readonly> <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear1" style="display:none;">
                                                    Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input1">
                                                    <span class="image-preview-input-title1">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="images[]" @if(isset($product->productimages[1]->image))value="{{$product->productimages[1]->image}}"@else value="" @endif/> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div><hr style="margin: 5px"/><!-- /input-group image-preview [TO HERE]--> 
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-2">  
                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                        <div class="input-group image-preview2">
                                            <input type="text" class="form-control image-preview-filename2" name="imagename[]" @if(isset($product->productimages[2]->image))value="{{$product->productimages[2]->image}}"@else value="" @endif readonly> <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear2" style="display:none;">
                                                    Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input2">
                                                    <span class="image-preview-input-title2">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="images[]" @if(isset($product->productimages[2]->image))value="{{$product->productimages[2]->image}}"@else value="" @endif/> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div><hr style="margin: 5px"/><!-- /input-group image-preview [TO HERE]--> 
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-2">  
                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                        <div class="input-group image-preview3">
                                            <input type="text" class="form-control image-preview-filename3" name="imagename[]" @if(isset($product->productimages[3]->image))value="{{$product->productimages[3]->image}}"@else value="" @endif readonly> <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear3" style="display:none;">
                                                    Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input3">
                                                    <span class="image-preview-input-title3">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="images[]" @if(isset($product->productimages[3]->image))value="{{$product->productimages[3]->image}}"@else value="" @endif/> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div><hr style="margin: 5px"/><!-- /input-group image-preview [TO HERE]--> 
                                    </div>
                                </div>
@else
                            <div class="row">    
                                <div class="col-xs-12 col-lg-12 col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-2">  
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename" value='' disabled required> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input">
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="images[]" value='' required/> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div><small>This feild is required.</small><hr style="margin: 5px"/><!-- /input-group image-preview [TO HERE]--> 
                                </div>
                                <div class="col-xs-12 col-lg-12 col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-2">  
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview1">
                                        <input type="text" class="form-control image-preview-filename1" value='' disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear1" style="display:none;">
                                                Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input1">
                                                <span class="image-preview-input-title1">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="images[]" value=''/> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div><hr style="margin: 5px"/><!-- /input-group image-preview [TO HERE]--> 
                                </div>
                                <div class="col-xs-12 col-lg-12 col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-2">  
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview2">
                                        <input type="text" class="form-control image-preview-filename2" value='' disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear2" style="display:none;">
                                                Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input2">
                                                <span class="image-preview-input-title2">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="images[]" value=''/> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div><hr style="margin: 5px"/><!-- /input-group image-preview [TO HERE]--> 
                                </div>
                                <div class="col-xs-12 col-lg-12 col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-2">  
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview3">
                                        <input type="text" class="form-control image-preview-filename3" value='' disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear3" style="display:none;">
                                                 Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input3">
                                                <span class="image-preview-input-title3">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="images[]" value=''/> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div><!-- /input-group image-preview [TO HERE]--> 
                                </div>
                            </div>
@endif
                         </div>
                    <div class="card-footer"><small>At least one image is required.</small></div>
                </div>
                        



                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control pname" placeholder="Product name" name="name" id="name" @if($product != null) value="{{$product->name}}"@endif required>
                        <p class="pull-right" id="pname" style="font-size: 12px">150 characters remaining</p>

                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea class="form-control countedup" placeholder="Short Description" name="short_desc" id="short_desc" required>@if($product != null){{$product->short_desc}}@endif</textarea>
                        <p class="pull-right" id="counterup" style="font-size: 12px">700 characters remaining</p>
                    </div>
                    <div class="form-group">
                        <label>Long Description*</label>
                        <textarea class="ckeditor form-control" placeholder="Long Description" name="long_desc" id="long_desc">@if($product != null){{$product->long_desc}}@endif</textarea>
                    </div>


@if($sub_category == null)
@if($categoryedit == false)
                    <div class="form-group">
                        <label for="select_category">Select Category:</label>
                        <select class="form-control" name="select_category" id="select_category"  required>
                            <option value="" hidden selected>--- select category ---</option>
                            @foreach(App\Model\Category::all() as $category)
                                @if($product != null)
                                    <option value="{{$category->id}}" onclick=" changesubcategory({{$category->id}})" @if($product->sub_category->category->id == $category->id) selected @endif>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}" onclick=" changesubcategory({{$category->id}})">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label>Select SubCategory:</label>
                        <select class="form-control" name="select_subcategory" id="select_subcategory" required>
                            <option value="" hidden>--- select subcategory --- (First, select category.)</option>
                            @if($product != null)
                                @foreach($product->sub_category->category->sub_categories as $sub_category)
                                    <option value="{{$sub_category->id}}" @if($product->sub_category->id == $sub_category->id) selected @endif>{{$sub_category->name}}</option>
                                @endforeach
                            @endif



                            
                        </select>
                    </div>
@endif
@endif
                    <div class="form-group">
                        <label>Price in Rupees</label>
                        <input type="text" class="form-control pprice" placeholder="Price" name="price" id="price"  @if($product != null)value="{{$product->price}}"@endif required>
                        <p class="pull-right" id="pprice" style="font-size: 12px">100 characters remaining</p>
                    </div>
                    <div class="form-group">
                        <label>Availability</label><br>
                        
                        @if($product != null)
                            <input type="radio"  name="availability" value="1" @if($product->availability == 1)checked @endif> In Stock<br>
                            <input type="radio"  name="availability" value="0" @if($product->availability == 0)checked @endif> Out of Stock<br>
                        @else
                            <input type="radio"  name="availability" value="1" checked> In Stock<br>
                            <input type="radio"  name="availability" value="0"> Out of Stock<br>
                        @endif

                    </div>
                    <div class="card card-default">
                        <div class="card-header">Add Specifications</div>
                        <div class="card-body">
@if($product != null)
@foreach($product->specifications as $spec)
@if($loop->iteration == 1)
                            <div class="control-group" id="fields">
                                <div class="controls">
                                    <div class="row entry input-group">
                                        <div class="col nopadding">
                                            <div class="form-group"> 
                                                <input class="form-control" name="specification_name[]" value="{{$spec->attribute_name}}" type="text" placeholder="Name" required/>
                                            </div>
                                        </div>
                                        <div class="col-1"> = </div>
                                        <div class="col nopadding">
                                            <div class="form-group">
                                                <div class="input-group">
                                                <input class="form-control" name="specification_value[]" value="{{$spec->attribute}}" type="text" placeholder="Value" required/> 
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-success btn-add" type="button"><span class="fa fa-plus"></span></button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>         
@else
                                      
                            <div class="control-group" id="fields">
                                <div class="controls">
                                    <div class="row entry input-group">
                                        <div class="col nopadding">
                                            <div class="form-group"> 
                                                <input class="form-control" name="specification_name[]" value="{{$spec->attribute_name}}" type="text" placeholder="Name" required/>
                                            </div>
                                        </div>
                                        <div class="col-1"> = </div>
                                        <div class="col nopadding">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-control" name="specification_value[]" type="text" value="{{$spec->attribute}}" placeholder="Value" required/> 
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-danger btn-remove" type="button"><span class="fa fa-minus"></span></button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
@endif
@endforeach
@else  
                            <div class="row">
                                <div class="col nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="specification_name" name="specification_name[]" value="" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-1">=</div>
                                <div class="col nopadding">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="specification_value" name="specification_value[]" value="" placeholder="Value" required>
                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="clear"></div>
                            </div>
                            <div id="education_fields">
                                </div>
@endif
    
                        </div>
                        <div class="card-footer"><small>Click <span class="fa fa-plus"></span> to add another specification field.</small> <small>Click <span class="fa fa-minus"></span> to remove specification field.</small></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary pull-left">
                            @if($product != null)
                                Update
                            @else
                                Submit
                            @endif
                        </button>
                    </div>
                </div>
            </form>
  </div>
</div>

<script>
    function changesubcategory(id){
        $.get('/admin/product-entry/select/'+id, function(data){

        var sub_category = $('#select_subcategory');
        sub_category.empty();
        console.log(data);

        $.each(data, function(key, value){
            sub_category.append("<option value="+value.id+">"+value.name+"</option>");
        });
        

        });  
    }
</script>

@endsection









