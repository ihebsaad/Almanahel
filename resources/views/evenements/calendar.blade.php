 
<link href="{{ asset('public/calendar/core/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/list/main.css')}}" rel='stylesheet' />
<script src="{{ asset('public/calendar/core/main.js')}}"></script>
<script src="{{ asset('public/calendar/timegrid/main.js')}}"></script>
<script src="{{ asset('public/calendar/interaction/main.js')}}"></script>
<script src="{{ asset('public/calendar/daygrid/main.js')}}"></script>
<script src="{{ asset('public/calendar/list/main.js')}}"></script>
<script  src="{{ asset('public/calendar/google-calendar/main.js')}}"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
 
    var calendar = new FullCalendar.Calendar(calendarEl, {
	 locale: 'fr',

      plugins: [ 'interaction', 'dayGrid', 'list', 'googleCalendar','timeGrid' ],

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },

    //  displayEventTime: true, // don't show the time column in list view
     navLinks: true,
   
      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
     //  googleCalendarApiKey: 'AIzaSyCcYzKrsFJ3ImlhlmdRuAyaHlD_N2m1I3s',

      // TN Holidays
      // events: 'ar.tn#holiday@group.v.calendar.google.com', 
	//   businessHours: true, // display business hours
       
      events: [
        {
          title: 'All Day Event',
          start: '2020-02-01'
        },
        {
          title: 'Long Event',
          start: '2020-02-07',
          end: '2020-02-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-02-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-02-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-02-11',
          end: '2020-02-13'
        },
        {
          title: 'Meeting',
          start: '2020-02-12T10:30:00',
          end: '2020-02-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-02-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-02-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-02-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-02-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2020-02-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-02-28'
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
 
