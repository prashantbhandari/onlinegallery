@extends("common.index")
@section("body")

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-0.7}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideDuration: 400,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 3000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 032 css*/
        .jssorb032 {position:absolute;}
        .jssorb032 .i {position:absolute;cursor:pointer;}
        .jssorb032 .i .b {fill:#fff;fill-opacity:0.7;stroke:#000;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.25;}
        .jssorb032 .i:hover .b {fill:#000;fill-opacity:.6;stroke:#fff;stroke-opacity:.35;}
        .jssorb032 .iav .b {fill:#000;fill-opacity:1;stroke:#fff;stroke-opacity:.35;}
        .jssorb032 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:50%;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:fixed;top:50%;left:50%;width:38px;height:50px;" src="{{ URL::to('images/index/spin.svg') }}" />
        </div>
        <div data-u="slides" style=" cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
          @foreach(App\Model\CarouselImage::all() as $image)
            <div data-p="225.00" class="sliderimages">
              <img data-u="image" src="{{ URL::to('images/carousel/'.$image->image) }}"></img> 
            </div>
          @endforeach
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb032" style="opacity: 1; position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="opacity: 1; width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="opacity: 1; width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    
   <!--==========================
    Results and Category Section
  ============================-->
  <section id="resultscategory">
    <div class="container-fluid" id="home-page">
        <div class="col-sm-12 col-md-3 col-lg-3 category" style="padding: 0px;">
          <!-- Category -->
          <div class="single category" style=" background-color:#eee">
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
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 container-fluid" style="padding: 0px;">
            <section id="resultnumber" class="d-none">
                <div class=" text-center container clearfix col-12"><br>
                <p> Showing<b> {{$products->firstItem()}} </b>to<b> {{$products->lastItem()}} </b>out of<b> {{$products->total()}} </b>products</p>
                </div><br>
              </section>
          <section id="services">
            @foreach ($products as $product)
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 d-flex"  id="product-small">
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
          <br>
          {{$products->links()}}
        </div>
      </div>
</section>

<!--==========================
      New Arrivals
    ============================-->
    <section id="testimonials">
      <div class="container">
        <div class="section-header">
          <h2>New Arrivals</h2>
        </div>
        <div class="owl-carousel testimonials-carousel">
            @foreach($new_products as $new)
              <div class=" center-block col-lg-3 col-md-3 col-sm-4 col-xs-6 d-flex"  id="product-small" style="width: 100%">
                <a href="/product/{{$new->id}}">
                  <div class="box">
                    <div class="pic"><img src="{{ URL::to('images/productimage/'.$new->productimages[0]->image) }}" alt="{{$new->productimages[0]->image}}"></div>
                    <h4 class="title">Rs: {{$new->price}}/-</h4>
                    <p class="description">{{$new->name}}</p>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
      </div>
    </section><!-- #new arrivals -->
   
      <!--==========================
      Most Viewed
    ============================-->
    <section id="testimonials">
      <div class="container">
        <div class="section-header">
          <h2>Most Viewed</h2>
        </div>
        <div class="owl-carousel testimonials-carousel">
          @foreach($most_viewed as $product)
            <div class=" center-block col-lg-3 col-md-3 col-sm-3 col-xs-6 d-flex"  id="product-small" style="width: 100%">
              <a href="/product/{{$product->id}}">
                <div class="box">
                    <div class="pic"><img src="{{ URL::to('images/productimage/'.$product->productimages[0]->image) }}" alt=""></div>
                  <h4 class="title">Rs: {{$product->price}}/-</h4>
                  <p class="description">{{$product->name}}</p>
                </div>
              </a>
            </div>
            @endforeach
        </div>
      </div>
    </section><!-- #new arrivals -->
  </main>    

 



    <!--==========================
      Contact Section
    ============================-->
  <section id="contact">
    <div class="container">
      <div class="section-header">
        <h2>Contact Us</h2>
      </div>
    </div>
    <div class="container">
      <div class="col-lg-8" id="product-small" style="height: 524px;">
        <div id="google-map" data-latitude="{{$contact_info->latitude}}" data-longitude="{{$contact_info->longitude}}" style="height: 424px;"></div>
      </div>
      <div class="col-lg-4">
        <div class="contact-info">
          <div class="row">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>{{$contact_info->address}}</address>
            </div>
          </div>
          <div class="row">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p>{{$contact_info->phone}}</p>
            </div>
          </div>
          <div class="row">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:{{$contact_info->email}}">{{$contact_info->email}}</a></p>
            </div>
          </div>
          <div class="row">
            <div class="social-links centered" style="magrin-top: 20px; margin-bottom: 0px;">
              <a href="{{$contact_info->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="{{$contact_info->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="{{$contact_info->instagram}}" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="{{$contact_info->google_plus}}" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="{{$contact_info->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- #contact -->

@endsection

  