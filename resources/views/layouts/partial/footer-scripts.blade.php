  
{{ csrf_field() }}

   <!-- Bootstrap core JavaScript -->
  <script    src="{{  URL::asset('public/site/vendor/jquery/jquery.min.js') }}"   ></script>
  <script    src="{{  URL::asset('public/site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"     ></script>


<script  src="{{  URL::asset('public/site/js/jquery.slicknav.min.js') }}"  ></script>
<script type="text/javascript">
  $('ul#navigation').slicknav({
    prependTo:"#menumob"
  });
  //$('#navigation').slicknav();
  
  
 
</script>
 @yield('footer_scripts')
