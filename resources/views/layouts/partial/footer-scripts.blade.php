
{{ csrf_field() }}

   <!-- Bootstrap core JavaScript -->
   <script    src="{{  URL::asset('public/site/vendor/jquery/jquery.min.js') }}"   ></script> 
  <script    src="{{  URL::asset('public/site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"     ></script>


 <link rel="stylesheet" href="{{  URL::asset('public/css/jquery.bootstrap.year.calendar.min.css') }}" />
  <script     src="{{  URL::asset('public/js/jquery.bootstrap.year.calendar.min.js') }}" ></script>
  
<script type="text/javascript">var ajax_url = 'https://mdbootstrap.com/wp-load.php';</script><link rel="alternate" hreflang="en" href="https://mdbootstrap.com/plugins/jquery/full-calendar/" />
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.0/main.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.0/locales/fr.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.0/main.css"  /> 


<script  src="{{  URL::asset('public/site/js/jquery.slicknav.min.js') }}"  ></script>
<script type="text/javascript">
  $('ul#navigation').slicknav({
    prependTo:"#menumob"
  });
  
  /*
$(function() {

  // page is now ready, initialize the calendar...

  $('#calendar').fullCalendar({
    // put your options and callbacks here
  })

});
  */
  $(document).ready(function(){

 

    $("select#elevestat").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
    $("select#mpreinscrit").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".partie").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".partie").hide();
            }
        });
    }).change();

    $(".toggle-accordion").on("click", function() {
    var accordionId = $(this).attr("accordion-id"),
      numPanelOpen = $(accordionId + ' .collapse.in').length;
    
    $(this).toggleClass("active");

    if (numPanelOpen == 0) {
      openAllPanels(accordionId);
    } else {
      closeAllPanels(accordionId);
    }
  });
});
</script>
 @yield('footer_scripts')
