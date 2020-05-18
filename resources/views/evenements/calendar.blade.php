 
<link href="{{ asset('public/calendar/core/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/list/main.css')}}" rel='stylesheet' />
<script src="{{ asset('public/calendar/core/main.js')}}"></script>
<script src="{{ asset('public/calendar/interaction/main.js')}}"></script>
<script src="{{ asset('public/calendar/daygrid/main.js')}}"></script>
<script src="{{ asset('public/calendar/list/main.js')}}"></script>
<script  src="{{ asset('public/calendar/google-calendar/main.js')}}"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
 
    var calendar = new FullCalendar.Calendar(calendarEl, {
	 locale: 'fr',

      plugins: [ 'interaction', 'dayGrid', 'list', 'googleCalendar' ],

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },

      displayEventTime: true, // don't show the time column in list view
  defaultDate: '<?php echo date('Y-m-d');?>',
    navLinks: true,
    eventLimit: true,
  
      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: 'AIzaSyCcYzKrsFJ3ImlhlmdRuAyaHlD_N2m1I3s',

      // TN Holidays
       events: 'ar.tn#holiday@group.v.calendar.google.com',
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
    ],
      eventClick: function(arg) {
        // opens events in a popup window
        window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

        arg.jsEvent.preventDefault() // don't navigate in main tab
      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }

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
 
