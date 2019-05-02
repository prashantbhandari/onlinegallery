<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Panel</title>
  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">  
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.min.css">
  <!-- Custom styles for this template-->
  <link href="{{ URL::to('css/admin/sb-admin.css') }}" rel="stylesheet">
  <!-- image upload-->
  <link href="{{ URL::to('css/admin/imageupload.css') }}" rel="stylesheet">
  <!-- image upload-->
  <link href="{{ URL::to('css/admin/starrating.css') }}" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="{{ URL::to('css/admin/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ URL::to('assets/toastr/toastr.min.css') }}">
</head>
<body class=" sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" id="mainNav">
    <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fas fa-list"></i>
          </a>
        </li>
      </ul>
    <a class="navbar-brand" href="/admin/home" style="padding-left: 10px">  Sex Material Nepal</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/admin/home">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Admins">
          <a class="nav-link" href="/admin/admins">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Admins</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Category">
          <a class="nav-link" href="/admin/category">
            <i class="fa fa-address-book "></i>
            <span class="nav-link-text">Category</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
          <a class="nav-link" href="/admin/product">
            <i class="fa fa-shopping-cart "></i>
            <span class="nav-link-text">Products</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Images">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-image"></i>
            <span class="nav-link-text">Images</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="/admin/gallery">Gallery</a>
            </li>
            <li>
              <a href="/admin/carousel">Carousel</a>
            </li>
            <li>
                <a href="/admin/title-image">Title Image</a>
              </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="General Info">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-info"></i>
            <span class="nav-link-text">General Info</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents1">
            <li>
              <a href="/admin/contact-info">Contact Info</a>
            </li>
            <li>
              <a href="/admin/about-us">About Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
            <?php 
            $sum = 0;
            $count = 0;
            foreach(App\Model\NewReview::all() as $review){
              $sum = $sum + $review->one;
              $count++;
            }
            ?>
            @if($count == 0)
              <a class="nav-link" href="/admin/reviews">
            @else
              <a class="nav-link" href="/admin/reviews/{{$count}}/new-reviews">
            @endif              
            <i class="fa fa-fw fa-star"></i>
              <span class="nav-link-text">Reviews 
                  
                  @if($sum == 0)
                  @else
                    <span class="badge badge-danger"> {{$sum}}
                    </span>
                  @endif
              </span>
            </a>
          </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item" title="Reviews">
            <?php 
            $sum = 0;
            $count = 0;
            foreach(App\Model\NewReview::all() as $review){
              $sum = $sum + $review->one;
              $count++;
            }
            ?>
            @if($count == 0)
              <a class="nav-link" href="/admin/reviews">
            @else
              <a class="nav-link" href="/admin/reviews/{{$count}}/new-reviews">
            @endif

            <i class="fa fa-bell"> 
              @if($sum == 0)
              @else
                <span class="badge badge-danger"> {{$sum}}
                </span>
              @endif
            </i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <span class="caret"></span> {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu-right">
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="margin-right: 20px">
              <a class="dropdown-item" href="/admin/change-password">
                Change Password
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
            </div>
        </div>
        </li>
    </ul>
    </div>
  </nav>
  