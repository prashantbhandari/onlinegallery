{{-- @extends('layouts.app')

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sex Contact Gallery
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends("admin.common.index")
@section("body")

<div class="content-wrapper">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin/home">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Navbar</li>
      </ol>
      <div class="container-fluid">

        <div class="card-body">
            <div class="table-responsive">
              <table class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>views</th>
                    <th>Average Rating</th>
                    <th>Added on</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th style="width: 30px;">S.N</th>
                    <th>Name</th>
                    <th style="width: 60px;">Image</th>
                    <th style="max-width: 50px;">views</th>
                    <th style="min-width: 200px;">Average Rating</th>
                    <th style="min-width: 150px;">Added on</th>
                    <th style="width: 110px;">Option</th>                    
                  </tr>
                </tfoot>
                <tbody>
@foreach(App\Model\Product::all() as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            <img style=" width: 60px; max-height:100%;" src="{{ URL::to('images/productimage/'.$product->productimages[0]->image) }}"></img>
                        </td>
                        <td>{{$product->view_count}}</td>

                        <?php
                        $reviews = $product->reviews;
                        $total_stars = 0;
                        $number  = count($reviews);
                        foreach($reviews as $review){
                            $total_stars = $total_stars + $review->stars;
                        }
                        if($number == 0){
                            $average_stars = "Not Rated";
                        }
                        else{
                            $average_stars = $total_stars / $number;
                            $average_stars = number_format((float)$average_stars, 3, '.' ,'');
                        }
                        ?>

                        <td>  
                            <?php $stars = $average_stars;?>
                                @for($i = 0; $i < 5; $i++)
                                        
                                        @if($stars >0)
                                            @if($stars >= 1)
                                                <i class="fa fa-star"></i>
                                                <?php $stars--;?>
                                            @else
                                                @if($stars >= 0.333 && $stars <= 0.666)
                                                    <i class="fa fa-star-half"></i>
                                                    <?php $stars = 0;?>
                                                @elseif($stars > 0.66)
                                                    <i class="fa fa-star"></i>
                                                    <?php $stars = 0;?>
                                                @elseif($stars < 0.33)
                                                    <i class="fa fa-star-o"></i>
                                                    <?php $stars = 0;?>
                                                @endif
                                            @endif
                                        @elseif($stars == 0)
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                @endfor     
                            <small>({{$average_stars}})<a href="/admin/product/{{$product->id}}/reviews">Detail</a></small>
                        </td>
                        <td>{{$product->created_at}}</td>
                        <td>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delete_product({{ $product->id }})">Delete</button>
                            <a class="btn btn-sm btn-primary" href="/admin/product-entry/{{$product->id}}/editproduct">Edit</a>
                        </td>
                    </tr>
    @endforeach
                </tbody>
              </table>
            </div>
          </div>
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 100%;"></div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    

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
                      <button type="button" class="btn btn-danger" onclick="delete_confirm_all()">Delete</button>                
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
              
                function delete_confirm_all(){
                      window.location.href = "/admin/home/"+deleteId+"/delete";
                  }
              
              </script>
                
@endsection
    

