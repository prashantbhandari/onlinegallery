@extends("common.index")
@section("body")


<main id="main">
    <section class="page-header">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a>About Us</a></li>
            </ul>
        </div>
    </section>
  
    
   <!--==========================
    Results and Category Section
  ============================-->
    <section id="about">
        <div class="container-fluid">
            <div class="container gallery-container" style="margin-bottom: 20px">
                <h1>About us</h1>
            <div class="text-left about-us" style="text-align: justify;">
                {!!$desc->description!!}
            </div>
            </div>
        </div>
    </section>
</main>    
@endsection

  