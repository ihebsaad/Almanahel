 
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
      // events: 'ar.tn#holiday@group.v.calendar.google.com', 
	   businessHours: true, // display business hours
      editable: true,
      events: [
        {
          title: 'Business Lunch',
          start: '2020-02-03T13:00:00',
          constraint: 'businessHours'
        },
        {
          title: 'Meeting',
          start: '2020-02-13T11:00:00',
          constraint: 'availableForMeeting', // defined below
          color: '#257e4a'
        },
        {
          title: 'Conference',
          start: '2020-02-18',
          end: '2020-02-20'
        },
        {
          title: 'Party',
          start: '2020-02-29T20:00:00'
        },

        // areas where "Meeting" must be dropped
        {
          groupId: 'availableForMeeting',
          start: '2020-02-11T10:00:00',
          end: '2020-02-11T16:00:00',
          rendering: 'background'
        },
        {
          groupId: 'availableForMeeting',
          start: '2020-02-13T10:00:00',
          end: '2020-02-13T16:00:00',
          rendering: 'background'
        },

        // red areas where no events can be dropped
        {
          start: '2020-02-24',
          end: '2020-02-28',
          overlap: false,
          rendering: 'background',
          color: '#ff9f89'
        },
        {
          start: '2020-02-06',
          end: '2020-02-08',
          overlap: false,
          rendering: 'background',
          color: '#ff9f89'
        }
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
 
