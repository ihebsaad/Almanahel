 
<link href="{{ asset('public/calendar/core/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/list/main.css')}}" rel='stylesheet' />
<script src="{{ asset('public/calendar/core/main.js')}}"></script>
<script src="{{ asset('public/calendar/timgrid/main.js')}}"></script>
<script src="{{ asset('public/calendar/interaction/main.js')}}"></script>
<script src="{{ asset('public/calendar/daygrid/main.js')}}"></script>
<script src="{{ asset('public/calendar/list/main.js')}}"></script>
<script  src="{{ asset('public/calendar/google-calendar/main.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: '<?php echo date("Y-m-d"); ?>',
  	  
	  
	  
	  
	  
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
 
