 
<script  src="{{ asset('public/js/jquery-3.5.1.js') }}"  type="text/javascript"></script>

<!--<script src="{{--  URL::asset('public/js/jquery-ui/jquery.ui.min.js') --}}" type="text/javascript"></script>-->
{{ csrf_field() }}

 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js" type="text/javascript"></script>


<script src="{{ URL::asset('public/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

 
 
<!----- Datepicker ------->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

 
 @yield('footer_scripts')

