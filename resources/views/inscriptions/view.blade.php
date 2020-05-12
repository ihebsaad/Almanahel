@extends('layouts.back')
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"  >
   
   
   
   <link href="{{ asset('public/js/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/js/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>

@section('content')
<h3 style="margin-left:50px">Pré-inscription</h3><br><br>    
               <form class="form-horizontal" method="POST"  action="{{action('InscriptionsController@update', $id)}}" >
      {{ csrf_field() }}


             <fieldset>
                      <input type="hidden" id="idins" value="{{$id}}" ></input>
       <legend>Élève</legend> <!-- Titre du fieldset --> 
<div class="row"  style="margin-left:10px">
       <label for="eleve">Identifiant de l'élève : </label>
       <input type="number" name="eleve" id="eleve"  onchange="changing(this)"  value="{{ $inscription->eleve }}" />
       </div>
<div class="row" style="margin-left:10px">
       <label for="nom">Nom : </label>
       <input type="text" name="nom" id="nom"  onchange="changing(this)"   value="{{ $inscription->nom }}"  />
 
       <label for="prenom">Prénom : </label>
       <input type="text" name="prenom" id="prenom"  onchange="changing(this)"   value="{{ $inscription->prenom }}" />
</div>
<div class="row" style="margin-left:10px">
       <label for="datenaissance">Date de naissance : </label>
       <input type="date" name="datenaissance" id="datenaissance"  onchange="changing(this)"   value="{{ $inscription->datenaissance }}" />
 
    
</div>
<div class="row" style="margin-left:10px">
       <label for="type_etabliss">Etablissement d'origine où votre enfant est actuellement scolarisé : </label>
        Public <input type="radio" id="type_etabliss" name="type_etabliss" onchange="changing(this)"    value="0"   <?php if ($inscription->type_etabliss ==0){echo 'checked';} ?> >
        Privé<input type="radio"  id="nonactif" name="type_etabliss" onchange="disabling('type_etabliss')"  value="1"  <?php if ($inscription->type_etabliss ==1){echo 'checked';} ?>>
</div>
<div class="row" style="margin-left:10px">
       <label for="etablissement">Nom de l'établissement d'origine : </label>
       <input type="text" name="etablissement" id="etablissement"   onchange="changing(this)"    value="{{ $inscription->etablissement }}" />
 
    
</div>
<div class="row" style="margin-left:10px">
       <label for="niveau">Niveau d'études actuel : </label>
       <input type="text" name="niveau" id="niveau" id="etablissement"   onchange="changing(this)"    value="{{ $inscription->niveau }}" />
 
    
</div>
<div class="row" style="margin-left:10px">
       <label for="section">Section : </label>
    <select name="section" id="section"  onchange="changing(this)"  value="{{ $inscription->section }}"  >
    <option value="">--Please choose an option--</option>
     <option  <?php if ($inscription['section'] =='Bac Français'){echo 'selected="selected"';}?>  value="Bac Français">Bac Français</option>
    <option   <?php if ($inscription['section'] =='Sciences expérimentales'){echo 'selected="selected"';}?> value="Sciences expérimentales">Sciences expérimentales</option>
    <option  <?php if ($inscription['section'] =='Mathématiques'){echo 'selected="selected"';}?>  value="Mathématiques">Mathématiques</option>
    <option  <?php if ($inscription['section'] =='Sciences techniques'){echo 'selected="selected"';}?> value="Sciences techniques">Sciences techniques</option>
    <option  <?php if ($inscription['section'] =='Autre'){echo 'selected="selected"';}?> value="Autre">Autre</option>
  </select>
 
    
</div>
<div class="row" style="margin-left:10px">
       <label for="niveau">la moyenne de notes obtenues durant la dernière année d'étude  : </label>
       
    
</div>
<div class="row" style="margin-left:15px">
       <label for="moyenne_1">Le premier trimestre : </label>
       <input type="number" step="any" name="moyenne_1" id="moyenne_1" onchange="changing(this)"    value="{{ $inscription-> moyenne_1}}"  />
 
    
</div>
<div class="row" style="margin-left:15px">
       <label for="moyenne_2">Le deuxième trimestre : </label>
       <input type="number" step="any" name="moyenne_2" id="moyenne_2"  onchange="changing(this)"    value="{{ $inscription-> moyenne_2}}" />
 
    
</div>
<div class="row" style="margin-left:15px">
       <label for="moyenne_3">Le troisième trimestre : </label>
       <input type="number" step="any" name="moyenne_3" id="moyenne_3" onchange="changing(this)"    value="{{ $inscription-> moyenne_3}}"  />
 
    
</div>
<div class="row" style="margin-left:15px">
       <label for="moyenne_g">La moyenne générale : </label>
       <input type="number" step="any" name="moyenne_g" id="moyenne_g" onchange="changing(this)"    value="{{ $inscription-> moyenne_g}}"  />
 
    
</div>
<div class="row" style="margin-left:10px">
       <label for="frere">Votre enfant a t'il un frère ou une soeur actuellement scolarisé(e) dans notre établissement ? </label>
      Oui <input type="radio" id="frere" name="frere" onchange="changing(this)"   value="1"   <?php if ($inscription->frere ==1){echo 'checked';} ?>>
      Non <input type="radio" id="frerenon" name="frere"  onchange="disabling1('frere')"   value="1"   <?php if ($inscription->frere ==0){echo 'checked';} ?>>
</div>
<div class="row" style="margin-left:10px">
       <label for="clubs">Votre enfant souhaite-t-il intégrer un Club ? </label>
      Oui <input type="radio" id="clubs" name="clubs" onchange="changing(this)"    value="1"   <?php if ($inscription->clubs ==1){echo 'checked';} ?>>
      Non <input type="radio" id="clubsnon"name="clubs" onchange="disabling2('clubs')" value="0"   <?php if ($inscription->clubs ==0){echo 'checked';} ?>>
</div>
<div class="row" style="margin-left:10px">
       <label for="niveau">les horaires d'activités de club : </label>
       
    
</div>
<div class="row" style="margin-left:15px">
       <label for="17h">17h15-18h30: </label>

     <input type="checkbox" id="heure_17h" name="heure_17h" onchange="changing1(this)" value="1"     <?php if ($inscription->heure_17h ==1){echo 'checked';} ?> >
       
</div>
<div class="row" style="margin-left:15px">
       <label for="12h">12h30-13h45 :  </label>
   <input type="checkbox" id="heure_12h" name="heure_12h" onchange="changing1(this)"   value="1"   <?php if ($inscription->heure_12h ==1){echo 'checked';} ?>>
     </div>
<div class="row" style="margin-left:15px">
       <label for="vendredi">Vendredi après-midi : </label>
  <input type="checkbox" id="vendredi" name="vendredi" onchange="changing1(this)"   value="1"   <?php if ($inscription->vendredi ==1){echo 'checked';} ?>>
     
</div><div class="row" style="margin-left:15px">
       <label for="samedi">Samedi après-midi : </label>
       <input type="checkbox" id="samedi" name="samedi" value="1" onchange="changing1(this)"    value="1"   <?php if ($inscription->samedi ==1){echo 'checked';} ?>>
 
</div>
<div class="row" style="margin-left:15px">
       <label for="dimanche">Dimanche matin : </label>
       <input type="checkbox" id="dimanche" name="dimanche" value="1" onchange="changing1(this)"    value="1"   <?php if ($inscription->dimanche ==1){echo 'checked';} ?>>
 
</div>

<div class="row" style="margin-left:10px">
       <label for="fichierpartg">Les deux derniers Bulletins de notes de la dernière année d'études: </label>
       <input type="file"  name="fichierpartg" id="fichierpartg" />
 
    
</div>



   </fieldset>
   <fieldset>
   <div class="row" style="margin-left:10px">
       
 
    
</div>
 </fieldset>
   <fieldset>
       <legend>Représentant légal</legend> <!-- Titre du fieldset --> 
<div class="row"  style="margin-left:10px">
       <label for="civilite">Identité du représentant légal : </label>
       <input type="number" name="civilite" id="civilite" onchange="changing(this)"  value="{{ $inscription-> civilite}}" />
       </div>
<div class="row" style="margin-left:10px">
       <label for="nom_rep">Nom : </label>
       <input type="text" name="nom_rep" id="nom_rep" onchange="changing(this)"   value="{{ $inscription-> nom_rep}}" />
 
       <label for="prenom_rep">Prénom : </label>
       <input type="text" name="prenom_rep" id="prenom_rep"  onchange="changing(this)"    value="{{ $inscription-> prenom_rep}}"  />
</div>
<div class="row" style="margin-left:10px">
       <label for="ville">Ville : </label>
       <input type="text" name="ville" id="ville"  onchange="changing(this)"   value="{{ $inscription-> ville}}"/>
 
    
</div>
<div class="row" style="margin-left:10px">
       <label for="tel">Téléphone Portable : </label>
       <input type="number" name="tel" id="tel" onchange="changing(this)"   value="{{ $inscription-> tel}}" />
 
    
</div>
<div class="row" style="margin-left:10px">
       <label for="tel2">Téléphone fixe : </label>
       <input type="number" name="tel2" id="tel2"   onchange="changing(this)"   value="{{ $inscription-> tel2}}"/>
 
    
</div>
<div class="row" style="margin-left:10px">
       <label for="email">E-mail: </label>
       <input type="text" name="email" id="email" onchange="changing(this)"    value="{{ $inscription-> email}}" />
 
    
</div>

<div class="row" style="margin-left:10px">
       
 
    
</div>



   </fieldset>
   


             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>

$(function () {
$('.itemName').select2({
filter: true,
language: {
noResults: function () {
return 'Pas de résultats';
}
}

});




});

function changing(elm) {
        var champ = elm.id;

        var val = document.getElementById(champ).value;

        var inscription = $('#idins').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptions.updating') }}",
            method: "POST",
            data: {inscription: inscription, champ: champ, val: val, _token: _token},
            success: function (data) {
                $('#' + champ).animate({
                    opacity: '0.3',
                });
                $('#' + champ).animate({
                    opacity: '1',
                });

            }
        });
        // } else {

        // }
    }
     function disabling(elm) {
        var champ=elm;

        var val =1;
         var inscription = $('#idins').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptions.updating') }}",
            method: "POST",
            data: {inscription: inscription , champ:champ ,val:val, _token: _token},
            success: function (data) {
                if (elm=='type_etabliss'){
                $('#nonactif').animate({
                    opacity: '0.3',
                });
                $('#nonactif').animate({
                    opacity: '1',
                });
                }


            }
        });
        // } else {

        // }
    }
    function disabling1(elm) {
        var champ=elm;

        var val =0;
         var inscription = $('#idins').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptions.updating') }}",
            method: "POST",
            data: {inscription: inscription , champ:champ ,val:val, _token: _token},
            success: function (data) {
                if (elm=='frere'){
                $('#frerenon').animate({
                    opacity: '0.3',
                });
                $('#frerenon').animate({
                    opacity: '1',
                });
                }


            }
        });
        // } else {

        // }
    }
       function disabling2(elm) {
        var champ=elm;

        var val =0;
         var inscription = $('#idins').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptions.updating') }}",
            method: "POST",
            data: {inscription: inscription , champ:champ ,val:val, _token: _token},
            success: function (data) {
                if (elm=='clubs'){
                $('#clubsnon').animate({
                    opacity: '0.3',
                });
                $('#clubsnon').animate({
                    opacity: '1',
                });
                }


            }
        });
        // } else {

        // }
    }
    function disabling3(elm) {
        var champ=elm;

        var val =0;
         var inscription = $('#idins').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptions.updating') }}",
            method: "POST",
            data: {inscription: inscription , champ:champ ,val:val, _token: _token},
            success: function (data) {
                if (elm=='heure_17h'){
                $('#heure_17h').animate({
                    opacity: '0.3',
                });
                $('#heure_17h').animate({
                    opacity: '1',
                });
                }


            }
        });
        // } else {

        // }
    }
    function changing1(elm) {
        var champ = elm.id;
       var val =document.getElementById(champ).checked==1;

    if (val==true){val=1;}
    if (val==false){val=0;}
        
      

        var inscription = $('#idins').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptions.updating') }}",
            method: "POST",
            data: {inscription: inscription, champ: champ, val: val, _token: _token},
            success: function (data) {
                $('#' + champ).animate({
                    opacity: '0.3',
                });
                $('#' + champ).animate({
                    opacity: '1',
                });

            }
        });
        // } else {

        // }
    }

</script>

@endsection

