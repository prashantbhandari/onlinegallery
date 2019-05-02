@extends("admin.common.index")
@section("body")

<div class="content-wrapper">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin/home">Dashboard</a>
        </li>
        @if($product!= Null)
    <li class="breadcrumb-item active">{{$product->name}}</li>
    @endif
    <li class="breadcrumb-item active">Reviews</li>
      </ol>
      <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                    @if($product!= Null)
                        <i class="fa fa-star"></i> Reviews of Poduct:   {{$product->name}}
                    @else
                        <i class="fa fa-star"></i> All Reviews
                    @endif

            </div>

        <div class="card-body">
            <div class="table-responsive">
              <table class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    @if($product != Null)
                        <th>S.N</th>
                        <th>Indivisual Ratings</th>
                        <th>Comment</th>
                        <th>AddedDate</th>
                    @else
                        <th>S.N</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th style="width: 100px;">Ratings</th>
                        <th>Comment</th>
                        <th style="width: 150px;">Added Date</th>
                    @endif
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    @if($product != Null)

                    <th></th>
                    <th><small><b>Average Rating =</b></small><br>
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
                        <small>({{$average_stars}})</small>
                        </th>
                        <th></th>
                        <th></th>  
                    @else
                        <th>S.N</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Ratings</th>
                        <th>Comment</th>
                        <th>Added Date</th>
                    @endif
                  </tr>
                </tfoot>
                <tbody>
@foreach($reviews as $review)
                    <tr @if($no_of_new_reviews > 0)style="background-color: #fee;"@endif>
                        @if($product != Null)
                            <td>{{$loop->iteration}}</td>

                            <td>  
                                <?php $star = $review->stars;?>
                                    @for($i = 0; $i < 5; $i++)
                                            
                                            @if($star >0)
                                                    <i class="fa fa-star"></i>
                                                    <?php $star--;?>
                                            @elseif($star == 0)
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                    @endfor     
                                <small>({{$review->stars}})</small>
                            </td>
                            <td>{{$review->comment}}</td>
                            <td>{{$review->created_at}}</td>
                        @else
                            <td>{{$loop->iteration}}</td>
                            <td>{{$review->product->name}}</td>
                            <td><img style=" width: 60px; max-height:100%;"  src="/images/productimage/{{$review->product->productimages[0]->image}}"></td>
                            <td>
                                <?php $star = $review->stars;?>
                                @for($i = 0; $i < 5; $i++)                    
                                        @if($star >0)
                                                <i class="fa fa-star"></i>
                                                <?php $star--;?>
                                        @elseif($star == 0)
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                @endfor     
                                <small>({{$review->stars}})</small>
                            </td>
                            <td>{{$review->comment}}</td>
                            <td>{{$review->created_at}}</td>
                        @endif
                    </tr>
                    <?php $no_of_new_reviews--?>
    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 100%;"></div>
    </div>                
@endsection