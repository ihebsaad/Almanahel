
@extends('layouts.back')

 
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Ajouter
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('absences.store') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
			  	<div class="form-group">
                    <label for="classe">Classe:</label>
                    <select id="classe" type="number" class="form-control select2" name="classe" >
					 <option></option>
					<?php $classes= \App\Classe::get(); 
						foreach($classes as $cl)
						{
						echo ' <option value="'.$cl->id.'">'.$cl->titre.'</option>';
	
						}
					?>
 					</select>
                </div>
				<?php use \App\Http\Controllers\ClassesController; ?>
				
				
                <div class="form-group">
                    <label for="eleve">Elève:</label>
                    <select id="eleve" type="number" class="form-control  " name="eleve" >
					<option></option>
					<?php $eleves= \App\User::where('user_type','eleve')->get(); 
						foreach($eleves as $el)
						{
							$classe=ClassesController::ClasseEleve($el->id);
						echo ' <option   value="'.$el->id.'">'.$el->name. ' '.$el->lastname.'</option>';
	
						}
					?>
					</select>
                </div>		
                <div class="form-group">
                    <label for="seance">Séance:</label>
                    <input id="seance" type="text" class="form-control" name="seance"/>
                </div>						
                <div class="form-group">
                    <label for="details">Détails:</label>
                    <textarea id="details" type="text" class="form-control" name="details" ></textarea>
                </div>		
				<div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control"name="debut" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				</div>
				
				<div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" name="fin" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
			   <div class="form-group">
                    <label for="fin">Fin:</label>
                    <input id="fin" type="text" class="form-control" name="fin"/>
                </div>	
				
				<div class="form-group ">

             <label class="check "> <input type="checkbox" name="email"  value="1" checked/>Envoyer un Email aux parents</label>
					</div>

          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Ajouter</button>
  			 </div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
        </div>
    </div>
@endsection
 

@section('footer_scripts')


    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
 
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>


    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>


 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>

function toggle(className, displayState){
            var elements = document.getElementsByClassName(className);

            for (var i = 0; i < elements.length; i++){
                elements[i].style.display = displayState;
            }
  }

$(function () {
	
     $('#datetimepicker1').datetimepicker();
 	
     $('#datetimepicker2').datetimepicker();
 			
$('.select2').select2({
filter: true,
language: {
noResults: function () {
return 'Pas de résultats';
}
}

});
  
});

</script>
@endsection
