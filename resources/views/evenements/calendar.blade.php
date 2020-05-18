 
<link href="{{ asset('public/calendar/core/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/list/main.css')}}" rel='stylesheet' />
<script src="{{ asset('public/calendar/core/main.js')}}"></script>
<script src="{{ asset('public/calendar/timgrid/main.js')}}"></script>
<script src="{{ asset('public/calendar/interaction/main.js')}}"></script>
<script src="{{ asset('public/calendar/daygrid/main.js')}}"></script>
<script src="{{ asset('public/calendar/list/main.js')}}"></script>
<script  src="{{ asset('public/calendar/google-calendar/main.js')}}"></script>
<script>document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'list', 'googleCalendar','timeGrid' ],
	
	firstDay:1,
	locale:'fr',
      defaultDate: '<?php echo date("Y-m-d");?>' ,
	 // defaultDate: '<?php echo date('Y-m-d');?>',
   header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },
 
       googleCalendarApiKey: 'AIzaSyCcYzKrsFJ3ImlhlmdRuAyaHlD_N2m1I3s',

buttonText: {today: "Aujourd'hui", month: 'Mois', week: 'Semaine', day: 'Jour', list: 'Liste'},
//buttonIcons: {next: 'right-single-arrow', previous:'left-single-arrow',prevYear: 'left-double-arrow', nextYear: 'right-double-arrow'},
 
 
 /*
  eventSources: [

    // your event source
    {
      events: function(start, end, timezone, callback) {
        // ...
      },
      color: 'yellow',   // an option!
      textColor: 'black' // an option!
    }

    // any other sources...

  ]
 */
 events: [
 'ar.tn#holiday@group.v.calendar.google.com',
        {
          title: 'All Day Event',
          start: '2020-05-01'
        },
        {
          title: 'Long Event',
          start: '2020-05-07',
          end: '2020-05-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-05-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-05-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-05-11',
          end: '2020-05-13'
        },
        {
          title: 'Meeting',
          start: '2020-05-12T10:30:00',
          end: '2020-05-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-05-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-05-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-05-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-05-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2020-05-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-05-28'
        }
      ]
    });

    calendar.render();
  });
</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
 

  <div id='loading'>loading...</div>

  <div id='calendar'></div>
 
<?php echo date('Y-m-d');?>