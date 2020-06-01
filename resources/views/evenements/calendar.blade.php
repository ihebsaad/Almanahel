 
<link href="{{ asset('public/calendar/core/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('public/calendar/list/main.css')}}" rel='stylesheet' />
<script src="{{ asset('public/calendar/core/main.js')}}"></script>
<script src="{{ asset('public/calendar/timegrid/main.js')}}"></script>
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
	     navLinks: true,
	  businessHours: true, // display business hours

      defaultDate: '<?php echo date("Y-m-d");?>' ,
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },
 
       googleCalendarApiKey: 'AIzaSyCcYzKrsFJ3ImlhlmdRuAyaHlD_N2m1I3s',
buttonText: {today: "Aujourd'hui", month: 'Mois', week: 'Semaine', day: 'Jour', list: 'Liste',all-day:'Toute la journée'},
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
 
  eventSources: [
     {
	 googleCalendarId:'ihebs002@gmail.com', 
       events: ['ar.tn#holiday@group.v.calendar.google.com'],
      color: '#0b8043',   // an option!
      textColor: 'white' // an option!
    },
	{
   events: [
<?php			$liste=\App\Evenement::where('visible',1)->get();
		$ct=count($liste);	 
		$i=0;
    if ($ct>0) {
	  foreach($liste as $event)  
	  {$i++;
				$titre=$event->titre;
				$type=$event->type;
 				 $debut = DateTime::createFromFormat('d/m/Y', $event->debut );
 				 $fin = DateTime::createFromFormat('d/m/Y', $event->fin );
				 $debut=$debut->format('Y-m-d');
				 $fin=$fin->format('Y-m-d');
				 if($type=="simple"){
				 $color="
				   color: '#04b431',    
				   textColor: 'white'
				 
				 ";
				 }
				 if($type=="vacances"){
				  $color="				  
				   color: '#028dc8',    
				   textColor: 'white'
				  ";
				 }
				 if($type=="examens"){
				  $color="				  
				   color: '#ec3aa5',    
				   textColor: 'white'				  
				  ";
					
				 }				 
				 /**
				 
				 */
 				  //$start=$date.'T'.$debut;
				 //$debut =substr ($reserv['Reservation']['debut'],0 , strlen($reserv['Reservation']['debut'])-3 );
  				// $end=$date.'T'.$fin;
				 //$fin =substr ($reserv['Reservation']['fin'],0 , strlen($reserv['Reservation']['fin'])-3 );
 				 
	 // }
				echo 
				"{
					title: '"  . $titre ."',
					start:  '".  $debut. "' ,
					end: '". $fin ."' ,
					 ". $color ."
					 
					
					
 				} ";
			 	if($i<$ct){echo ',';}
		
	 	}// end foreach
   }//end if
	?>			 
			 
  /*
    {
      title: 'Event1',
      start: '2020-05-10'
    },
    {
      title: 'Event2',
      start: '2020-05-15'
    }
    // etc...*/
	
  ] //,
 // color: '#028dc8',    
 // textColor: 'white'  
	}
	
	],
 /*events: [
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
    , 
      eventClick: function(arg) {
        // opens events in a popup window
        window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

        arg.jsEvent.preventDefault() // don't navigate in main tab
      },
	  
	  */ 

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }

    });

    calendar.render();
  });
</script>
<style>

 
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
 

  <div id='loading'>Chargement...</div>
<div class="row" stylr="width:100%">
<div style="width:120px;background-color:#04b431;color:white;margin-left:20px">Evénement court</div>
<div style="width:120px;background-color:#ec3aa5;color:white;margin-left:20px">Examens</div>
<div style="width:120px;background-color:#028dc8;color:white;margin-left:20px">Vacances </div>
 </div>
 <div id='calendar'></div>
 
 