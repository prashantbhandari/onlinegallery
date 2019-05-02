@extends("common.index")
@section("body")


  <main id="main">
  <section class="page-header">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a>{{$category->name}}</a></li>
        </ul>
    </div>
  </section>
  
    
   <!--==========================
    Results and Category Section
  ============================-->
  <section id="resultscategory">
    <div class="container-fluid"  id="product-small">
        <div class="col-sm-12 col-md-3 col-lg-3" style="padding: 0px; margin-top: 40px;">
          <!-- Category -->
          <div class="single category" style="background-color:#eee">
            <h3 class="side-title">Category</h3>
            <div id="accordion">
              @foreach(App\Model\Category::all() as $category)
                <div class="panel">
                  <a>
                    <div class="panel-header" id="heading{{$category->id}}" data-toggle="collapse" data-target="#collapse{{$category->id}}" aria-expanded="false" aria-controls="collapse{{$category->id}}">
                      {{$category->name}}<span class="glyphicon glyphicon-menu-down"></span>
                    </div>
                  </a>
                  <div id="collapse{{$category->id}}" class="collapse" aria-labelledby="heading{{$category->id}}" data-parent="#accordion">
                    <div class="panel-body">
                        <ul class="list-group">
                          @foreach($category->sub_categories as $sub_category)
                          <a href="/product/sub_category/{{$sub_category->id}}"><li class="list-group-item">{{$sub_category->name}}</li></a>
                          @endforeach
                        </ul>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 container-fluid" style="padding: 0px; min-height: 500px;">
            <section id="resultnumber" class="d-none">
                <div class=" text-center container clearfix col-12"></br>
                <p> Showing<b> {{$category_products->firstItem()}} </b>to<b> {{$category_products->lastItem()}} </b>out of<b> {{$category_products->total()}} </b>products</p>
                </div></br>
              </section>
          <section id="services">
            @foreach ($category_products as $product)
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 d-flex" id="product-small">
                <div class="center-block" style="margin: 0px; width:100%">
                <a href="/product/{{$product->id}}" style="margin: 0px; width:100%">
                    <div class="center-block" style="margin: 0px; width:100%">
                    <div class="box col-centered">
                      <div class="pic"><img src="{{ URL::to('images/productimage/'.$product->productimages[0]->image) }}" alt=""></div>
                      <h4 class="title">Rs: {{$product->price}}/-</h4>
                      <p class="description">{{$product->name}}</p>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
            @endforeach
          </section>
          
        </div>
        <div class="container text-center">
          </br>
          {{$category_products->links()}}
        </div>
      </div>
</section>

  </main>    

 



 

@endsection

  