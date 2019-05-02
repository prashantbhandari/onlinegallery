<!--==========================
    Footer
  ============================-->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright 2018 SexMaterialNepal. All Rights Reserved
        </div>
      </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ URL::to('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::to('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::to('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::to('lib/superfish/hoverIntent.js') }}"></script>
    <script src="{{ URL::to('lib/superfish/superfish.min.js') }}"></script>
    <script src="{{ URL::to('lib/wow/wow.min.js') }}"></script>
    <script src="{{ URL::to('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::to('lib/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ URL::to('lib/magnific-popup/magnific-popup.min.js') }}"></script>
    <script src="{{ URL::to('lib/sticky/sticky.js') }}"></script>
    <script src="{{ URL::to('js/productImage.js') }}"></script>
    <script src="{{ URL::to('js/jssor.slider-27.1.0.min.js') }}"></script> 
    <script type="text/javascript">jssor_1_slider_init();</script>   
    <script src="https://maps.googleapis.com/maps/api/js?key={{$contact_info->api_key}}"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Toastr -->
    <script src="{{ URL::to('assets/toastr/toastr.min.js') }}"></script>
 
    @include("errors.errors")
      
    @section('script')
    @show

    <!-- product page tabs -->
    <script>
      $(document).ready(function(){
          $(".nav-tabs a").click(function(){
            $(this).tab('show');
          });
      });
    </script>

    <!-- Product Image -->
      <script type="text/javascript">
        $(document).ready( function () {
            //If your <ul> has the id "glasscase"
            $('#glasscase').glassCase({ 'thumbsPosition': 'bottom', 'widthDisplay' : 560});
        });
      </script>

    <!-- Template Main Javascript File -->
    <script src="{{ URL::to('js/main.js') }}"></script>

    <!-- review -->
    <script src="{{ URL::to('js/review.js') }}"></script>
    <script src="{{ URL::to('js/starrating.js') }}"></script>
    <script src="{{ URL::to('js/counter.js') }}"></script>

  </body>
</html>
