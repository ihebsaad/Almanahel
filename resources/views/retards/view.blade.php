
@extends('layouts.back')


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

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
            <form method="post" action="{{ route('retards.edit') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
			   <input   type="hidden" class="form-control" name="id" value="<?php echo $retard['id']; ?>" />

<div class="form-group">
                    <label for="classe">Classe:</label>
                    <select id="classe" type="number" class="form-control select2" name="classe" style="height:38px;">
					 <option></option>
					<?php $classes= \App\Classe::get(); 
						foreach($classes as $cl)
						{ if($retard['classe']==$cl->id){$sel='selected="selected"';}else{$sel='';}

						echo ' <option '.$sel.' value="'.$cl->id.'">'.$cl->titre.'</option>';
	
						}
					?>
 					</select>
                </div>
				<?php use \App\Http\Controllers\ClassesController; ?>
				
				
                <div class="form-group">
                    <label for="eleve">Elève:</label>
                    <select id="eleve" type="number" class="form-control  " name="eleve"  style="height:38px;padding:" >
					<option></option>
					<?php $eleves= \App\User::where('user_type','eleve')->get(); 
						foreach($eleves as $el)
						{if($retard['eleve']==$el->id){$sel='selected="selected"';}else{$sel='';}
							$classe=ClassesController::ClasseEleve($el->id);
						echo ' <option  '.$sel.' value="'.$el->id.'">'.$el->name. ' '.$el->lastname.'</option>';
	
						}
					?>
					</select>
                </div>		             <div class="form-group">
                    <label for="seance">Séance:</label>
                    <input id="seance" type="text" class="form-control" name="seance"   value="<?php echo $retard['seance']; ; ?>"/>
                </div>						
                <div class="form-group">
                    <label for="details">Détails:</label>
                    <textarea id="details" type="text" class="form-control" name="details"   ><?php echo $retard['details'] ; ?></textarea>
                </div>		
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input id="date" type="text" class="form-control" name="date"  value="<?php echo $retard['date'] ; ?>"/>
                </div>	
			   

          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Enregistrer</button>
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

$('#date').datepicker();


</script>
@endsection
				