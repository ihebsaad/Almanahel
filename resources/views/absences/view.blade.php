
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
                    <select id="classe" type="number" class="form-control select2" name="classe" style="height:38px;">
					 <option></option>
					<?php $classes= \App\Classe::get(); 
						foreach($classes as $cl)
						{ if($absence['classe']==$cl->id){$sel='selected="selected"';}else{$sel='';}

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
						{if($absence['eleve']==$el->id){$sel='selected="selected"';}else{$sel='';}
							$classe=ClassesController::ClasseEleve($el->id);
						echo ' <option  '.$sel.' value="'.$el->id.'">'.$el->name. ' '.$el->lastname.'</option>';
	
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


<style>
label{box-sizing:border-box;
color:rgb(133, 135, 150);
cursor:default;
display:inline-block;
font-family:Nunito, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-size:16px;
font-weight:400;}

.card-title{
	background-color:rgb(248, 249, 252);
border-bottom-color:rgb(227, 230, 240);
border-bottom-left-radius:0px;
border-bottom-right-radius:0px;
border-bottom-style:solid;
border-bottom-width:1px;
border-top-left-radius:4.6px;
border-top-right-radius:4.6px;
box-sizing:border-box;
color:rgb(133, 135, 150);
display:block;
font-family:Nunito, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-size:16px;
font-weight:400;
height:49px;
line-height:24px;
margin-bottom:0px;
overflow-wrap:break-word;
padding-bottom:12px;
padding-left:20px;
padding-right:20px;
padding-top:12px;
text-align:left;
text-size-adjust:100%;
}
.btn{
	align-items:flex-start;
background-color:rgb(38, 83, 212);
background-image:none;
border-bottom-color:rgb(36, 78, 201);
border-bottom-left-radius:5.6px;
border-bottom-right-radius:5.6px;
border-bottom-style:solid;
border-bottom-width:1px;
border-image-outset:0px;
border-image-repeat:stretch;
border-image-slice:100%;
border-image-source:none;
border-image-width:1;
border-left-color:rgb(36, 78, 201);
border-left-style:solid;
border-left-width:1px;
border-right-color:rgb(36, 78, 201);
border-right-style:solid;
border-right-width:1px;
border-top-color:rgb(36, 78, 201);
border-top-left-radius:5.6px;
border-top-right-radius:5.6px;
border-top-style:solid;
border-top-width:1px;
box-sizing:border-box;
color:rgb(255, 255, 255);
cursor:pointer;
display:inline-block;
font-family:Nunito, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-size:16px;
font-stretch:100%;
font-style:normal;
font-variant-caps:normal;
font-variant-east-asian:normal;
font-variant-ligatures:normal;
font-variant-numeric:normal;
font-weight:400;
height:38px;
letter-spacing:normal;
line-height:24px;
margin-bottom:0px;
margin-left:0px;
margin-right:0px;
margin-top:0px;
overflow-wrap:break-word;
overflow-x:visible;
overflow-y:visible;
padding-bottom:6px;
padding-left:12px;
padding-right:12px;
padding-top:6px;
text-align:center;
text-decoration-color:rgb(255, 255, 255);
text-decoration-line:none;
text-decoration-style:solid;
text-indent:0px;
text-rendering:auto;
text-shadow:none;
text-size-adjust:100%;
text-transform:none;
transition-delay:0s, 0s, 0s, 0s;
transition-duration:0.15s, 0.15s, 0.15s, 0.15s;
transition-property:color, background-color, border-color, box-shadow;
transition-timing-function:ease-in-out, ease-in-out, ease-in-out, ease-in-out;
user-select:none;
vertical-align:middle;
white-space:nowrap;
width:78.7344px;
word-spacing:0px;
writing-mode:horizontal-tb;
-webkit-appearance:none;
-webkit-box-direction:normal;
-webkit-tap-highlight-color:rgba(0, 0, 0, 0);
-webkit-border-image;
	
}
</style>

@endsection
