
{{ csrf_field() }}

   <!-- Bootstrap core JavaScript -->
  <!--<script    src="{{  URL::asset('public/site/vendor/jquery/jquery.min.js') }}"   ></script>-->
  <script    src="{{  URL::asset('public/site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"     ></script>


 <link rel="stylesheet" href="{{  URL::asset('public/css/jquery.bootstrap.year.calendar.min.css') }}" />
  <script     src="{{  URL::asset('public/js/jquery.bootstrap.year.calendar.min.js') }}" ></script>
  


<script  src="{{  URL::asset('public/site/js/jquery.slicknav.min.js') }}"  ></script>
<script type="text/javascript">
  $('ul#navigation').slicknav({
    prependTo:"#menumob"
  });
  
  
   $('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
     defaultDate: '2018-11-16',
   // defaultDate: '<?php echo date('Y-m-d');?>',
    navLinks: true,
    eventLimit: true,
    events: [{
            title: 'Front-End Conference',
            start: '2018-11-16',
            end: '2018-11-18'
        },
        {
            title: 'Hair stylist with Mike',
            start: '2018-11-20',
            allDay: true
        },
        {
            title: 'Car mechanic',
            start: '2018-11-14T09:00:00',
            end: '2018-11-14T11:00:00'
        },
        {
            title: 'Dinner with Mike',
            start: '2018-11-21T19:00:00',
            end: '2018-11-21T22:00:00'
        },
        {
            title: 'Chillout',
            start: '2018-11-15',
            allDay: true
        },
        {
            title: 'Vacation',
            start: '2018-11-23',
            end: '2018-11-29'
        },
    ]
});   
  
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
