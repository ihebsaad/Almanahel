@extends('layouts.back')
   
   
   
   <link href="{{ asset('public/js/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/js/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>


@section('content')
<div class=" " style="padding:8px 8px 8px 8px">
        <div class="portlet box grey">
<h3 style="margin-left:50px">Inscription</h3><br><br>    
               <form class="form-horizontal" method="POST"  action="{{action('InscriptionsvController@update1', $id)}} " enctype="multipart/form-data" >
      {{ csrf_field() }}


             <fieldset>
                      <input type="hidden" id="idins" value="{{$id}}" />
       <legend>Élève</legend> <!-- Titre du fieldset --> 
      
<div class="row"  style="margin-left:10px">
    
    <div class="col">
       <label  for="eleve">Identifiant de l'élève : </label>
       <input class="form-control" type="number" name="eleve" id="eleve"  readonly onchange="changing(this)"  value="{{ $inscriptionv->ideleve }}" />
       </div>
    
    </div>
   
<div class="row" style="margin-left:10px">

      <div class="col">
       <label  for="nom">Nom : </label>
       <input  class="form-control" type="text" name="nom" id="nom"  onchange="changing(this)"   value="{{ $inscriptionv->nom }}"  />
       </div>
  <div class="col">
       <label \ for="prenom">Prénom : </label>
       <input  class="form-control" type="text" name="prenom" id="prenom"  onchange="changing(this)"   value="{{ $inscriptionv->prenom }}" />
       </div>
       
</div>
<div class="row" style="margin-left:10px">
 
     <div class="col">
       <label class="form-label" for="datenaissance">Date de naissance : </label>

       <input  class="form-control datepicker" type="text" name="datenaissance" id="datenaissance"  onchange="changing(this)"   value="{{ $inscriptionv->datenaissance }}" />
 

         </div>
</div>
<div class="row" style="margin-left:10px">
 
    <div class="col">
       <label  for="email">E-mail: </label>
       <input class="form-control" type="text" name="email" id="email" onchange="changing(this)"    value="{{ $inscriptionv-> email}}" />
 </div>

 
</div>
 
<div class="row" style="margin-left:10px">

       <div class="col">
       <label   for="type_etabliss">Etablissement d'origine où votre enfant est actuellement scolarisé : </label>
        Public <input type="radio" id="type_etabliss" name="type_etabliss" onchange="changing(this)"    value="0"   <?php if ($inscriptionv->type_etabliss ==0){echo 'checked';} ?> >
        Privé<input type="radio"  id="nonactif" name="type_etabliss" onchange="disabling('type_etabliss')"  value="1"  <?php if ($inscriptionv->type_etabliss ==1){echo 'checked';} ?>>

</div>
       </div>

<div class="row" style="margin-left:10px">
  
          <div class="col">
       <label  for="etablissement">Nom de l'établissement d'origine : </label>
       <input class="form-control" type="text" name="etablissement" id="etablissement"   onchange="changing(this)"    value="{{ $inscriptionv->etablissement }}" />

    </div> 
</div>
<div class="row" style="margin-left:10px">
    
       <div class="col">
       <label  for="niveau">Niveau d'études actuel : </label>
       <input class="form-control" type="text" name="niveau" id="niveau" id="etablissement"   onchange="changing(this)"    value="{{ $inscriptionv->niveau }}" />
 </div>
 
</div>
<?php if($inscriptionv->niveau=="Bac" || $inscriptionv->niveau=="Baccalauréat" ||$inscriptionv->niveau=="bac"|| $inscriptionv->niveau =="3 ième année"|| $inscriptionv->niveau =="4 ième année"){
?>
<div class="row" style="margin-left:10px";>

 <div class="col">
       <label  for="section">Section : </label>
    <select class="form-control"  name="section" id="section"  onchange="changing(this)"  value="{{ $inscriptionv->section }}"  >
    <option value="">--Please choose an option--</option>
     <option  <?php if ($inscriptionv['section'] =='Bac Français'){echo 'selected="selected"';}?>  value="Bac Français">Bac Français</option>
    <option   <?php if ($inscriptionv['section'] =='Sciences expérimentales'){echo 'selected="selected"';}?> value="Sciences expérimentales">Sciences expérimentales</option>
    <option  <?php if ($inscriptionv['section'] =='Mathématiques'){echo 'selected="selected"';}?>  value="Mathématiques">Mathématiques</option>
    <option  <?php if ($inscriptionv['section'] =='Sciences techniques'){echo 'selected="selected"';}?> value="Sciences techniques">Sciences techniques</option>
    <option  <?php if ($inscriptionv['section'] =='Autre'){echo 'selected="selected"';}?> value="Autre">Autre</option>
  </select>
 </div>

</div>
<?php
} ?>
  
<div class="row" style="margin-left:10px">
 
  <div class="col">
       <label  for="niveau">la moyenne de notes obtenues durant la dernière année d'étude  : </label>
  
  
    </div>

</div>
<div class="row" style="margin-left:15px">
  
    <div class="col">
       <label  for="moyenne_1">Le premier trimestre : </label>
       <input class="form-control" type="number" step="any" name="moyenne_1" id="moyenne_1" onchange="changing(this)"    value="{{ $inscriptionv-> moyenne_1}}"  />
 
  
    </div>
</div>
<div class="row" style="margin-left:15px">
 
       <div class="col">
       <label  for="moyenne_2">Le deuxième trimestre : </label>
       <input class="form-control" type="number" step="any" name="moyenne_2" id="moyenne_2"  onchange="changing(this)"    value="{{ $inscriptionv-> moyenne_2}}" />
 </div>

</div>
<div class="row" style="margin-left:15px">

     <div class="col">
     
       <label  for="moyenne_3">Le troisième trimestre : </label>
       <input  class="form-control" type="number" step="any" name="moyenne_3" id="moyenne_3" onchange="changing(this)"    value="{{ $inscriptionv-> moyenne_3}}"  />
 </div>

</div>
<div class="row" style="margin-left:15px">
    
     <div class="col">
       <label class="form-label"  for="moyenne_g">La moyenne générale : </label>
       <input class="form-control" type="number" step="any" name="moyenne_g" id="moyenne_g" onchange="changing(this)"    value="{{ $inscriptionv-> moyenne_g}}"  />

 </div>
</div>
<div class="row" style="margin-left:10px">

<div class="col">
       <label class="form-label" for="frere">Votre enfant a t'il un frère ou une soeur actuellement scolarisé(e) dans notre établissement ? </label>
      Oui <input type="radio" id="frere" name="frere" onchange="changing(this)"   value="1"   <?php if ($inscriptionv->frere ==1){echo 'checked';} ?>>
      Non <input type="radio" id="frerenon" name="frere"  onchange="disabling1('frere')"   value="1"   <?php if ($inscriptionv->frere ==0){echo 'checked';} ?>>
      </div>
        

</div>
<div class="row" style="margin-left:10px">

     <div class="col">
       <label  for="clubs">Votre enfant souhaite-t-il intégrer un Club ? </label>
      Oui <input type="radio" id="clubs" name="clubs" onchange="changing(this)"    value="1"   <?php if ($inscriptionv->clubs ==1){echo 'checked';} ?>>
      Non <input type="radio" id="clubsnon"name="clubs" onchange="disabling2('clubs')" value="0"   <?php if ($inscriptionv->clubs ==0){echo 'checked';} ?>>
      </div>
 
</div>
<?php if($inscriptionv->clubs=="1"){
?>
<div class="row" style="margin-left:10px";>

      <div class="col">
       <label  for="nomclub">Nom de Club : </label>
    <select class="form-control"  name="nomclub" id="nomclub"  onchange="changing(this)"  value="{{ $inscriptionv->nomclub}}"  >
    <option value="">--Please choose an option--</option>
     <option  <?php if ($inscriptionv['nomclub'] =='Musique'){echo 'selected="selected"';}?>  value="Musique">Musique</option>
    <option   <?php if ($inscriptionv['nomclub'] =='Théâtre'){echo 'selected="selected"';}?> value="Théâtre">Théâtre</option>
 <option  <?php if ($inscriptionv['nomclub'] =='Robotique'){echo 'selected="selected"';}?> value="Robotique">Robotique</option>
   <option  <?php if ($inscriptionv['nomclub'] =='Anglais'){echo 'selected="selected"';}?>  value="Anglais">Anglais</option>
    <option  <?php if ($inscriptionv['nomclub'] =='Autres'){echo 'selected="selected"';}?> value="Autres">Autres</option>
  </select>
 </div>

</div>
<?php if($inscriptionv->nomclub=="Autres"){
?>
<div class="row" style="margin-left:10px";>

      <div class="col">
       <label  for="section">Nom d'autre club : </label>
    <input class="form-control" type="text"  name="nomclubautre" id="nomclubautre" onchange="changing(this)"    value="{{ $inscriptionv-> nomclubautre}}"/>
  
 </div>

</div>
<?php
} ?>

<div class="row" style="margin-left:10px">
   
      <div class="col">
       <label  for="niveau">les horaires d'activités de club : </label>
       
    </div>

</div>
<div class="row" style="margin-left:15px">
    
        <div class="col">
       <label  for="17h">17h15-18h30: </label>

     <input  type="checkbox" id="heure_17h" name="heure_17h" onchange="changing1(this)" value="1"     <?php if ($inscriptionv->heure_17h ==1){echo 'checked';} ?> >
   </div> 
   
</div>
<div class="row" style="margin-left:15px">

    <div class="col">
       <label  for="12h">12h30-13h45 :  </label>
   <input type="checkbox" id="heure_12h" name="heure_12h" onchange="changing1(this)"   value="1"   <?php if ($inscriptionv->heure_12h ==1){echo 'checked';} ?>>
 </div>
     </div>
 
<div class="row" style="margin-left:15px">
  
 <div class="col">
       <label  for="vendredi">Vendredi après-midi : </label>
  <input type="checkbox" id="vendredi" name="vendredi" onchange="changing1(this)"   value="1"   <?php if ($inscriptionv->vendredi ==1){echo 'checked';} ?>>
     </div>
     

</div>
<div class="row" style="margin-left:15px">
    
      <div class="col">
       <label  for="samedi">Samedi après-midi : </label>
       <input type="checkbox" id="samedi" name="samedi" value="1" onchange="changing1(this)"    value="1"   <?php if ($inscriptionv->samedi ==1){echo 'checked';} ?>>

      </div>

</div>
<div class="row" style="margin-left:15px">
   
      
        <div class="col">
      
       <label for="dimanche">Dimanche matin : </label>
       <input type="checkbox" id="dimanche" name="dimanche" value="1" onchange="changing1(this)"    value="1"   <?php if ($inscriptionv->dimanche ==1){echo 'checked';} ?>>
        </div>
     

 
</div>
<?php
} ?>


      <div class="row" style="margin-left:10px">
   
      <div class="col">
       <label  for="bulletin1">Les deux derniers Bulletins de notes de la dernière année d'études: </label>
        </div>
         
            </div>
           <div class="row" style="margin-left:10px">
             
       <div class="col">
       <input class="form-control" type="file" accept="image/png, image/jpeg,image/jpg,.pdf" name="bulletin1" id="bulletin1"   />
 </div>
          <div class="col">

        <?php if($inscriptionv->bulletin1 !==''  && $inscriptionv->bulletin1 !==null ){?>


          <a target="_blank" class="form-control" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/storage/fichiers/<?php echo $inscriptionv['bulletin1'];?>" > 
           <span class="far fa-eye"></span> <?php echo $inscriptionv['bulletin1'];?>
</a>
          <?php } ?>

                </div>
                </div>
              
                   <div class="row" style="margin-left:10px">
                     
       <div class="col">
       <input class="form-control" type="file" accept="image/png, image/jpeg,image/jpg,.pdf"  name="bulletin2" id="bulletin2"   />
 </div>
          <div class="col">

        <?php if($inscriptionv->bulletin2 !=='' && $inscriptionv->bulletin2 !==null ){?>


          <a target="_blank" class="form-control" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/storage/fichiers/<?php echo $inscriptionv['bulletin2'];?>" > 
           <span class="far fa-eye"></span> <?php echo $inscriptionv['bulletin2'];?>
</a>
          <?php } ?>

                </div>
           
    </div>




   </fieldset>
   <fieldset>
   <div class="row" style="margin-left:10px">
       
 
    
</div>
 </fieldset>
   <fieldset>
       <legend>Représentant légal</legend> <!-- Titre du fieldset --> 

       
<div class="row" style="margin-left:10px">

       <div class="col">
   
       <label  for="civilite">Civilité: </label>
       <input class="form-control" type="text" name="civilite" id="civilite" onchange="changing(this)"  value="{{ $inscriptionv-> civilite}}" />
       </div>
      <div class="col">
       <label for="nom_rep">Nom : </label>
       <input class="form-control" type="text" name="nom_rep" id="nom_rep" onchange="changing(this)"   value="{{ $inscriptionv-> nom_rep}}" />
 </div>
 <div class="col">
       <label  for="prenom_rep">Prénom : </label>
       <input class="form-control" type="text" name="prenom_rep" id="prenom_rep"  onchange="changing(this)"    value="{{ $inscriptionv-> prenom_rep}}"  />
</div>

</div>


<div class="row" style="margin-left:10px">

     <div class="col">  
       <label for="ville">Ville : </label>
       <input class="form-control" type="text" name="ville" id="ville"  onchange="changing(this)"   value="{{ $inscriptionv-> ville}}"/>
 </div>

</div>
<div class="row" style="margin-left:10px">

      <div class="col"> 
       <label for="tel">Téléphone Portable : </label>
       <input class="form-control" type="number" name="tel" id="tel" onchange="changing(this)"   value="{{ $inscriptionv-> tel}}" />
 
  </div>  

</div>
<div class="row" style="margin-left:10px">

     <div class="col"> 
       <label class="form-label" for="tel2">Téléphone fixe : </label>
       <input class="form-control" type="number" name="tel2" id="tel2"   onchange="changing(this)"   value="{{ $inscriptionv-> tel2}}"/>
 
 </div>

</div>
<div class="row" style="margin-left:10px">
   
    <div class="col">
       <label  for="email">E-mail: </label>
       <input class="form-control" type="text" name="email_rep" id="email_rep" onchange="changing(this)"    value="{{ $inscriptionv-> email_rep}}" />

    </div>
</div>


<div class="row" style="margin-left:10px">
       
 
    
</div>



   </fieldset>
    <div class="form-group "  style="margin-left:30px">
       <button  type="submit"  class="btn btn-primary">Enregistrer</button>
  
                    

         
     
         </div>
   


             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
                </div>
              </div>
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
            url: "{{ route('inscriptionsv.updating') }}",
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
            url: "{{ route('inscriptionsv.updating') }}",
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
            url: "{{ route('inscriptionsv.updating') }}",
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
            url: "{{ route('inscriptionsv.updating') }}",
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

