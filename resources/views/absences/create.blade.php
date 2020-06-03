
@extends('layouts.back')

 
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <label>Ajouter</label>
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
		<?php	  //ANNEE
		$year=date('Y');$month=date('m');
		$mois=intval($month);
		$annee=intval($year);
		if($mois > 9 ){$annee=$annee-1;}
		?>
			   <input id="annee" type="hidden" class="form-control" name="annee"  value="<?php echo $annee;?>"/>

			  	<div class="form-group">
                    <label for="classe">Classe:</label>
                    <select id="classe"  class="form-control select2" name="classe" style="height:38px;" onchange="verif()">
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
                    <select id="eleve" type="number" class="form-control  " name="eleve"  style="height:38px;" >
					<option></option>
					<?php $eleves= \App\User::where('user_type','eleve')->get(); 
						foreach($eleves as $el)
						{
							$classe=ClassesController::ClasseEleve($el->id);
							echo  ($classe) ;
 							if(   isset($classe )){
								
						 echo ' <option  class="classe cl-'.$classe.'" value="'.$el->id.'">'.$el->name. ' '.$el->lastname.'</option>';
							}else{
						 echo ' <option  class="classe" value="'.$el->id.'">'.$el->name. ' '.$el->lastname.'</option>';
							}
	
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
                    <label for="seance">Date de Début:</label>
                    <input autocomplete="off" id="debut" type="text" class="form-control" name="debut"/>
                </div>
				 <div class="form-group">
                    <label for="heure_debut">Heure de Début:</label>
                    <input id="heure_debut" type="time" class="form-control" name="heure_debut"/>
                </div>				
                <div class="form-group">
                    <label for="fin">Date de Fin:</label>
                    <input autocomplete="off" id="fin" type="text" class="form-control" name="fin" />
                </div>	
				 <div class="form-group">
                    <label for="heure_fin">Heure de Fin:</label>
                    <input id="heure_fin" type="time" class="form-control" name="heure_fin"/>
                </div>	
				<!--		
				<div class="form-group">
				<label for="datetimepicker1">Début:</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="debut" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				</div>
				 
			 <div class="form-group">
				<label for="datetimepicker2">Fin:</label>				
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" name="fin" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				
            </div>
			 -->
				
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

<!--
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
 
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>


    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
--->

 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
function verif()
{
	var classe= document.getElementById('classe').value ;
	toggle('classe','none');
	toggle('cl-'+classe,'block');
}
function toggle(className, displayState){
            var elements = document.getElementsByClassName(className);

            for (var i = 0; i < elements.length; i++){
                elements[i].style.display = displayState;
            }
  }

$(function () {
	 $('#debut').datepicker({
                  //  locale: 'fr',
			closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            weekHeader: 'Sem.',
            buttonImage: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAATCAYAAAB2pebxAAABGUlEQVQ4jc2UP06EQBjFfyCN3ZR2yxHwBGBCYUIhN1hqGrWj03KsiM3Y7p7AI8CeQI/ATbBgiE+gMlvsS8jM+97jy5s/mQCFszFQAQN1c2AJZzMgA3rqpgcYx5FQDAb4Ah6AFmdfNxp0QAp0OJvMUii2BDDUzS3w7s2KOcGd5+UsRDhbAo+AWfyU4GwnPAYG4XucTYOPt1PkG2SsYTbq2iT2X3ZFkVeeTChyA9wDN5uNi/x62TzaMD5t1DTdy7rsbPfnJNan0i24ejOcHUPOgLM0CSTuyY+pzAH2wFG46jugupw9mZczSORl/BZ4Fq56ArTzPYn5vUA6h/XNVX03DZe0J59Maxsk7iCeBPgWrroB4sA/LiX/R/8DOHhi5y8Apx4AAAAASUVORK5CYII=",

            firstDay: 1,
            dateFormat: "dd/mm/yy"


                });
		$('#fin').datepicker({
                 //   locale: 'fr',
			closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            weekHeader: 'Sem.',
            buttonImage: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAATCAYAAAB2pebxAAABGUlEQVQ4jc2UP06EQBjFfyCN3ZR2yxHwBGBCYUIhN1hqGrWj03KsiM3Y7p7AI8CeQI/ATbBgiE+gMlvsS8jM+97jy5s/mQCFszFQAQN1c2AJZzMgA3rqpgcYx5FQDAb4Ah6AFmdfNxp0QAp0OJvMUii2BDDUzS3w7s2KOcGd5+UsRDhbAo+AWfyU4GwnPAYG4XucTYOPt1PkG2SsYTbq2iT2X3ZFkVeeTChyA9wDN5uNi/x62TzaMD5t1DTdy7rsbPfnJNan0i24ejOcHUPOgLM0CSTuyY+pzAH2wFG46jugupw9mZczSORl/BZ4Fq56ArTzPYn5vUA6h/XNVX03DZe0J59Maxsk7iCeBPgWrroB4sA/LiX/R/8DOHhi5y8Apx4AAAAASUVORK5CYII=",

            firstDay: 1,
            dateFormat: "dd/mm/yy"
                });		
   /*  $('#datetimepicker1').datetimepicker({
                    locale: 'fr'
                });
 	
     $('#datetimepicker2').datetimepicker({
                    locale: 'fr'
                });
 		*/	
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
