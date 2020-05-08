  
{{ csrf_field() }}

   <!-- Bootstrap core JavaScript -->
  <script    src="{{  URL::asset('public/site/vendor/jquery/jquery.min.js') }}"   ></script>
  <script    src="{{  URL::asset('public/site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"     ></script>

  <!-- Custom scripts for this template -->
  <script  src="{{  URL::asset('public/site/js/clean-blog.min.js') }}"  ></script>
<script  src="{{  URL::asset('public/site/js/jquery.slicknav.min.js') }}"  ></script>
<script type="text/javascript">
	$('ul#navigation').slicknav({
		prependTo:"#menumob"
	});
	//$('#navigation').slicknav();
	
	    $("#news-slider10").owlCarousel({
        items : 4,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true
    });
</script>
 @yield('footer_scripts')
