
@extends('layouts.back')

 
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <label>Absence</label>
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
            <form method="post" action="{{ route('absences.edit') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
			  <input type="hidden" value="<?php echo $absence['id']; ?>" name="id"  >
			  	<div class="form-group">
                    <label for="classe">Classe:</label>
                    <select id="classe" type="number" class="form-control " name="classe" readonly style="height:38px;">
					 <option></option>
					<?php $classes= \App\Classe::get(); 
						foreach($classes as $cl)
						{ if($absence['classe']==$cl->id){ $sel='selected="selected"'; 

						echo ' <option '.$sel.' value="'.$cl->id.'">'.$cl->titre.'</option>';
	
						}
						}
					?>
 					</select>
                </div>
				<?php use \App\Http\Controllers\ClassesController; ?>
				
				
                <div class="form-group">
                    <label for="eleve">Elève:</label>
                    <select id="eleve" type="number" class="form-control  " name="eleve" readonly style="height:38px;" >
					<option></option>
					<?php $eleves= \App\User::where('user_type','eleve')->get(); 
						foreach($eleves as $el)
						{if($absence['eleve']==$el->id){$sel='selected="selected"'; 
							$classe=ClassesController::ClasseEleve($el->id);
						echo ' <option  '.$sel.' value="'.$el->id.'">'.$el->name. ' '.$el->lastname.'</option>';
	
						}
						}
					?>
					</select>
                </div>		
                <div class="form-group">
                    <label for="seance">Séance:</label>
                    <input id="seance" type="text" class="form-control" name="seance" value="<?php echo $absence['seance']; ?>"  />
                </div>						
                <div class="form-group">
                    <label for="details">Détails:</label>
                    <textarea id="details" type="text" class="form-control" name="details" ><?php echo $absence['details']; ?></textarea>
                </div>		
				 <div class="form-group">
                    <label for="seance">Date de Début:</label>
                    <input autocomplete="off" id="debut" type="text" class="form-control" name="debut" value="<?php echo $absence['debut']; ?>"  />
                </div>
				 <div class="form-group">
                    <label for="heure_debut">Heure de Début:</label>
                    <input id="heure_debut" type="time" class="form-control" name="heure_debut"  value="<?php echo $absence['heure_debut']; ?>"  />
                </div>				
                <div class="form-group">
                    <label for="fin">Date de Fin:</label>
                    <input autocomplete="off" id="fin" type="text" class="form-control" name="fin" value="<?php echo $absence['fin']; ?>"  />
                </div>	
				 <div class="form-group">
                    <label for="heure_fin">Heure de Fin:</label>
                    <input id="heure_fin" type="time" class="form-control" name="heure_fin" value="<?php echo $absence['heure_fin']; ?>"  />
                </div>	
			 
				
			 

          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Modifier</button>
  			 </div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
        </div>
    </div>
@endsection
 

@section('footer_scripts')
     

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
	 $('#debut').datepicker({
                    locale: 'fr'
                });
		$('#fin').datepicker({
                    locale: 'fr'
                });
 			
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
