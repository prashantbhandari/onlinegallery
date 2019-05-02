@extends("common.index")
@section("body")


<section class="page-header">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a>Gallery</a></li>
        </ul>
    </div>
</section>


<div class="container gallery-container">

    <h1>Photo Gallery</h1>

    <p class="page-description text-center">Photos of our Shop and others</p>
    
    <div class="tz-gallery" id="product-small">

        <div class="row">
            @foreach($images as $image)
                <div class="col-sm-4 col-md-3 col-xs-12">
                    <a class="lightbox" href="images/gallery/{{$image->image}}">
                        <img src="images/gallery/{{$image->image}}" alt="Park">
                    </a>
                </div>
            @endforeach
        </div>

    </div>
    <div class="container text-center">
        </br>
        {{$images->links()}}
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
@endsection