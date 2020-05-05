  
{{ csrf_field() }}

   <!-- Bootstrap core JavaScript -->
  <script    src="{{  URL::asset('public/site/vendor/jquery/jquery.min.js') }}"   ></script>
  <script    src="{{  URL::asset('public/site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"     ></script>

  <!-- Custom scripts for this template -->
  <script  src="{{  URL::asset('public/site/js/clean-blog.min.js') }}"  ></script>

 @yield('footer_scripts')
