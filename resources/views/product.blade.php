@extends('common.index')
@section('body')

<section class="page-header">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
        <li><a href="/product/category/{{$product->category->id}}">{{$product->category->name}}</a></li>
        <li><a href="/product/sub_category/{{$product->sub_category->id}}">{{$product->sub_category->name}}</a></li>

            <li><a>{{$product->name}}</a></li>
        </ul>
    </div>
</section>

<div class="container">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">	
				<div class="col-lg-6 col-md-6 col-sm-12 centered" style="padding: 0px;">
          <div class="container">
            <div class="">
              <ul id="glasscase" class="gc-start">
                @foreach($product->productimages as $images)
              <li><img src="{{ URL::to('images/productimage/'.$images->image)}}" alt="Text" /></li>
                  
                  @endforeach
              </ul>
            </div>
          </div>
        </div>
				<div class="col-lg-6 col-md-6 col-sm-12">
          <div class="product-title"><h3><b>{{$product->name}}</b></h3></div>
          <div class=" container product-rating-container" style="padding: 0px;">
            <div class="col-lg-4 col-md-4 col-sm-4 container star-rating rated" style="padding: 0px;">
                <span class="fa fa-star-o" data-rating="1"></span>
                <span class="fa fa-star-o" data-rating="2"></span>
                <span class="fa fa-star-o" data-rating="3"></span>
                <span class="fa fa-star-o" data-rating="4"></span>
                <span class="fa fa-star-o" data-rating="5"></span>
              <input type="hidden" class="rating-value" value="{{$rating}}">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 container pull-left review-link" style="margin-bottom: 10px;">
              <p class="review-link-in" style="padding-right: 10px; margin-bottom: 0px">{{$number}} customer reviews</p>
            </div>
          </div>          
          <div class="product-desc container">{{$product->short_desc}}</div>
          <hr>
          <div class="product-price">
            <span class="font-weight-semibold"><b>Price:</b></span>
            <li style="display: inline-block"><p style="color: orange; margin-bottom: 0px"><b>Rs. {{$product->price}}</b></p></li>
          </div>
          <div class="product-catagory">
          <span class="font-weight-semibold"><b>In Catagory:</b></span>
          <li style="display: inline-block"><a href="/product/category/{{$product->sub_category->category->id}}" class="btn">{{$product->sub_category->category->name}}</a></li>
            <li style="display: inline-block"><a href="/product/sub_category/{{$product->sub_category->id}}" class="btn">{{$product->sub_category->name}}</a></li>
          </div>
          <div class="product-stock">
            <span class="font-weight-semibold"><b>Availability:</b></span>
            @if($product->availability == 1)
              <li style="display: inline-block">In Stock</li>
            @else
              <li style="display: inline-block">Out of Stock</li>
            @endif
          </div>
					<hr>
					<div class="row">
            <div class="social-links centered" id="social" style="magrin-top: 20px; margin-bottom: 0px;">
              <a href="{{$contact_info->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="{{$contact_info->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="{{$contact_info->instagram}}" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="{{$contact_info->google_plus}}" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="{{$contact_info->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
          <hr>
				</div>
			</div> 
		</div>
		
        


    <section id="tab"  style="position: sticky;">
      <div class="container">
              <div class="col-lg-12">
                  <div class="tab" role="tabpanel">
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#section1" aria-controls="section1" role="tab" data-toggle="tab">Specification</a></li>
                          <li role="presentation"><a href="#section2" aria-controls="section2" role="tab" data-toggle="tab">Description</a></li>
                          <li role="presentation"><a href="#section3" aria-controls="section3" role="tab" data-toggle="tab">Review</a></li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content tabs" id="tab-pane">
                          <div role="tabpanel" class="tab-pane fade in active" id="section1">
                              <div class="table-responsive" style="margin-top: 30px">
                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="border-width: 2px;">
                                    <tbody>
                                      @foreach($product->specifications as $spec)
                                        <tr>
                                          <td>{{$spec->attribute_name}}</td>
                                        <td>{{$spec->attribute}}</td>
                                          
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>                          
                              </div>
                          <div role="tabpanel" class="tab-pane fade" id="section2">
                              <p>{!!$product->long_desc!!}</p>
                          </div>
                          <div class="tab-pane fade" id="section3">
                            <section  id="review">
                            <div class="row" id="post-review-box">
                              <div class="col-md-12">
                                  <div class="text" style="margin: 20px 0px 20px 0px;">
                                    <h3>Write your own review</h3>
                                  </div>
                                  <div class="text" style="margin: 20px 0px 20px 0px;">
                                      How do you rate this product?*
                                  </div>
                                  <form method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                  <input type="hidden" name="id" id="id" >
                                  <div class="form-group">
                                    <div class="star-rating rate">
                                      <span class="fa fa-star-o" data-rating="1"></span>
                                      <span class="fa fa-star-o" data-rating="2"></span>
                                      <span class="fa fa-star-o" data-rating="3"></span>
                                      <span class="fa fa-star-o" data-rating="4"></span>
                                      <span class="fa fa-star-o" data-rating="5"></span>
                                      <input type="hidden" name="stars" class="rating-value" value="1">
                                    </div>
                                  </div>
                                  Review*  
                                  <div class="form-group">
                                    <textarea class="form-control countedup" id="new-review" name="comment" placeholder="Enter your review here..." style="margin: 0px; height: 200px;" required></textarea>
                                    <p class="pull-right" id="counterup" style="font-size: 12px; margin: 0px;">500 characters remaining</p>
                                  </div>
                                  <br/>
                                  <div class="">
                                    <button class="btn btn-success btn-lg pull-right" type="submit">Submit Review</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </section>  
                          </div>
                      </div>
                  </div>
              </div>
      </div>
    </section>
    

    <!--==========================
      Related products
    ============================-->
    <section id="testimonials">
      <div class="container">
        <div class="section-header">
          <h2>Related Products</h2>
        </div>
        <div class="owl-carousel testimonials-carousel">
          @foreach($related as $product )
            <div class=" center-block col-lg-3 col-md-3 col-sm-3 col-xs-6 d-flex" id="product-small" style="width: 100%">
              <a href="/product/{{$product->id}}">
                <div class="box">
                <div class="pic"><img src="{{ URL::to('images/productimage/'.$product->productimages[0]->image)}}" alt=""></div>
                <h4 class="title">Rs: {{$product->price}}/-</h4>
                <p class="description">{{$product->name}}</p>
                </div>
              </a>
            </div>
            @endforeach
        </div>
      </div>
    </section><!-- related products -->


	</div>
</div>

<script>
  $('a.write-review-link').on('shown.bs.tab', function (e) {
   $('.nav-tabs .active').removeClass('active');//remove all active classes
   $('a[href="'+$(this).attr('href')+'"]').parent().addClass('active');//add the active class to the #message tab
    var that = this;
    $('html, body').animate({
        scrollTop: $( $(that).attr('href') ).offset().top
    }, 500);
});
</script>

@endsection