<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width; initial-scale=1.0;" name="viewport">
  <meta content="" name="keywords">
  <link href="{{ URL::to('images/index/'.$t_image) }}" rel="icon">
  <link href="{{ URL::to('images/index/'.$t_image) }}" rel="apple-touch-icon">
  <title>{{$title}}</title>
  <meta name="description" content="{{$meta_d}}">

  <!-- Favicons -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
  

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Jquery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.min.css">

  <!-- Datatables -->
  <link rel="stylesheet" href="{{ URL::to('assets/datatables/dataTables.bootstrap4.min.css') }}" />
  
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ URL::to('assets/toastr/toastr.min.css') }}" />

  <!-- Libraries CSS Files -->
  <link href="{{ URL::to('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ URL::to('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  

  <!-- Main Stylesheet File -->
  <link href="{{ URL::to('css/style.css') }}" rel="stylesheet">
  <link href="{{ URL::to('css/gallery-grid.css') }}" rel="stylesheet">
  <link href="{{ URL::to('css/product.css') }}" rel="stylesheet">
  <link href="{{ URL::to('css/starrating.css') }}" rel="stylesheet">
  <link href="{{ URL::to('css/tab.css') }}" rel="stylesheet">

  <!-- Toastr -->
  <link rel="stylesheet" href="{{ URL::to('assets/toastr/toastr.min.css') }}">
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none">
      <div class="container clearfix">
        <div class="col-lg-6 ">
          <div class="contact-info pull-left">
            <i class="fa fa-envelope-o"></i> <a href="mailto:{{$contact_info->email}}">{{$contact_info->email}}</a>
            <i class="fa fa-phone"></i> {{$contact_info->phone}}
          </div>
        </div>
        <div class="col-lg-6">            
          <div class="social-links pull-right">
            <a href="{{$contact_info->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="{{$contact_info->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="{{$contact_info->instagram}}" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="{{$contact_info->google_plus}}" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="{{$contact_info->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
      <div class="container">
  
        <div id="logo" class="pull-left">
          <h1><a href="/" class="scrollto"><b>Sex Material Nepal</b></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>
  
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="/">Home</a></li>
            <li><a href="/about-us">About Us</a></li>
            <li class="menu-has-children"><a>Product</a>
              <ul>
                @foreach(App\Model\Category::all() as $category)
                  <li><a href="/product/category/{{$category->id}}">{{$category->name}}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="/gallery">Gallary</a></li>          
            <li><a href="/#contact">Contact</a></li>
          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </header><!-- #header -->