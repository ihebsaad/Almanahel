@extends('layouts.back')


@section('content')
<h3 style="margin-left:50px">Formulaire Pré-inscription </h3>    
            <form class="form-horizontal" method="POST" action="{{ route('inscriptions.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
             <fieldset>
       <legend>Élève</legend> <!-- Titre du fieldset --> 
 
<div class="row" style="margin-left:10px">

    <div class="col">
       <label  for="nom">Nom : </label>
       <input required type="text" name="nom" id="nom"  class="form-control"/>
 </div>
  <div class="col">
       <label  for="prenom">Prénom : </label>
       <input required type="text" name="prenom" id="prenom" class="form-control" />
     
</div>
</div>
<div class="row" style="margin-left:10px">

    <div class="col">
       <label  for="datenaissance">Date de naissance : </label>
       <input  required  type="text" name="datenaissance" id="datenaissance" class="form-control" />
 
  </div>
 <?php
            $year=date('Y');
             $annee=intval($year);
             $anneep=$annee-1;
             $annees=$annee+1
            ?>
            <div class="col">
                <label for="annee">Année : </label>
               <select  class="custom-select" name="section" id="section">
                <option value="<?php echo $anneep ?>"><?php echo $anneep.'-'.$annee ?></option>
                 <option value="<?php echo $annee ?>"><?php echo $annee.'-'.$annees ?></option>
                
              </select>
            </div>

</div>

        
   <div class="row" style="margin-left:10px">
  
    <div class="col">
       <label  for="email">E-mail: </label>
         <label id="alert8" style="display:none; color:red;">L'adresse E-mail est invalide</label>
       <input   required  class="form-control" type="text" name="email" id="email" onchange="validation();checkexiste2(this) " />

    </div>
</div>
<div class="row" style="margin-left:10px">
  
    <div class="col">
       <label  for="reemail_rep">Confirmez E-mail: </label>
       <label id="alert" style="display:none; color:red;">Il faut retapez le mail</label>
       <input  class="form-control" type="text" name="reemail" id="reemail" onBlur="checkMail1()"/>
 </div>
   
</div>



<div class="row" style="margin-left:10px">
  
    <div class="col">
       <label  for="type_etabliss">Etablissement d'origine où votre enfant est actuellement scolarisé : </label>
        Public <input  required  type="radio" id="type_etabliss" name="type_etabliss" value="0" >
        Privé<input  required  type="radio" id="type_etabliss" name="type_etabliss" value="1">

</div>
</div>
<div class="row" style="margin-left:10px">

    <div class="col">
       <label  for="etablissement">Nom de l'établissement d'origine : </label>
       <input  required  type="text" name="etablissement" id="etablissement"  class="form-control"/>
 
    
</div>

</div>
<div class="row" style="margin-left:10px">
 
    <div class="col">
       <label for="niveau">Niveau d'études actuel : </label>
       <input  required  type="text" name="niveau" id="niveau" class="form-control" onKeyUp="sectionverif()"/>

   </div> 
</div>
<?php ?>
<div  id="sect"class="row" style="margin-left:10px ;display:none"  >

    <div class="col">
       <label  class="form-label" for="section">Section : </label>
    <select  name="section" id="section" class="form-control" >
    <option value="">--Please choose an option--</option>
     <option value="Bac Français">Bac Français</option>
    <option value="Sciences expérimentales">Sciences expérimentales</option>
    <option value="Mathématiques">Mathématiques</option>
    <option value="Sciences techniques">Sciences techniques</option>
    <option value="Autre">Autre</option>
  </select>

  </div>  
</div>

<div class="row" style="margin-left:10px">
 
    <div class="col">
       <label class="form-label" for="niveau">la moyenne de notes obtenues durant la dernière année d'étude  : </label>
     </div>  
 
</div>
<div class="row" style="margin-left:15px">
 
    <div class="col">
       <label  for="moyenne_1">Le premier trimestre : </label>
      <label id="alert4" style="display:none; color:red;">La moyenne de premier trimestre est invalide</label>
       <input  required  max=20 min=0 type="number" step="any" name="moyenne_1" id="moyenne_1" class="form-control" onblur="checkmoyenne1()" />
 </div>
</div>
    

<div class="row" style="margin-left:15px">
 
    <div class="col">
       <label  for="moyenne_2">Le deuxième trimestre : </label>
        <label id="alert5" style="display:none; color:red;">La moyenne de deuxième trimestre est invalide</label>
       <input  required   max=20 min=0 type="number" step="any" name="moyenne_2" id="moyenne_2"class="form-control" onblur="checkmoyenne2()" />

    </div>
</div>
<div class="row" style="margin-left:15px">
  
    <div class="col">
       <label  for="moyenne_3">Le troisième trimestre : </label>
         <label id="alert6" style="display:none; color:red;">La moyenne de  troisième trimestre est invalide</label>
       <input    max=20 min=0 type="number" step="any" name="moyenne_3" id="moyenne_3" class="form-control" onblur="checkmoyenne3()" />

    </div>
</div>
<div class="row" style="margin-left:15px">
     
    <div class="col">
       <label  for="moyenne_g">La moyenne générale : </label>
         <label id="alert7" style="display:none; color:red;">La moyenne générale est invalide</label>
       <input    max=20 min=0 type="number" step="any" name="moyenne_g" id="moyenne_g" class="form-control"  onblur="checkmoyenneg()" />
 </div>
   
</div>
<div class="row" style="margin-left:10px">
     
    <div class="col">
       <label  for="frere">Votre enfant a t'il un frère ou une soeur actuellement scolarisé(e) dans notre établissement ? </label>
      Oui <input  required  type="radio" id="frere" name="frere" value="1">
      Non <input  required  type="radio" id="frere" name="frere" value="0">
</div>

</div>
<div class="row" style="margin-left:10px">
     
    <div class="col">
       <label for="clubs">Votre enfant souhaite-t-il intégrer un Club ? </label>
      Oui <input  required  type="radio" id="clubs" name="clubs" value="1" onBlur="clubverif()">
      Non <input  required  type="radio" id="clubs" name="clubs" value="0" onBlur="clubverif1()"  >
      </div>

</div>
<div  id="sect1"class="row" style="margin-left:10px ;display:none"  >
  
    <div class="col">
       <label   for="section">Nom de Club : </label>
    <select name="nomclub" id="nomclub" class="form-control" onBlur="autreverif()" >
    <option value="">--Please choose an option--</option>
     <option value="Musique">Musique</option>
    <option value="Théâtre">Théâtre</option>
    <option value="Robotique">Robotique</option>
    <option value="Anglais">Anglais</option>
    <option value="Autres">Autres</option>
  </select>
 </div>
 
    </div> 

    <div  id="sectautre"class="row" style="margin-left:10px ;display:none"  >

    <div class="col">
       <label  for="section">Nom d'autre club : </label>
    <input   type="text" name="nomclubautre" id="nomclubautre" class="form-control" />
 </div>
 
    </div> 
<div id="sect2" style="display:none">
<div class="row" style="margin-left:10px;">
   
    <div class="col">
       <label  for="niveau">les horaires d'activités de club : </label>
     
    </div>
</div>
<div class="row" style="margin-left:15px">
    
    <div class="col">
       <label for="heure_17h">17h15-18h30: </label>
     <input    type="checkbox" id="heure_17h" name="heure_17h" value="1"  >
    </div>
    
</div>
<div class="row" style="margin-left:15px">
     
    <div class="col">
       <label for="heure_12h">12h30-13h45 :  </label>
   <input type="checkbox" id="heure_12h" name="heure_12h" value="1">
     </div>
     
     </div>
<div class="row" style="margin-left:15px">

    <div class="col">
       <label   for="vendredi">Vendredi après-midi : </label>
  <input   type="checkbox" id="vendredi" name="vendredi" value="1">
      
     </div>
</div>
<div class="row" style="margin-left:15px">

    <div class="col">
       <label  for="samedi">Samedi après-midi : </label>
       <input  type="checkbox" id="samedi" name="samedi" value="1">

 </div>
  
</div>
<div class="row" style="margin-left:15px">
 
    <div class="col">
       <label  for="dimanche">Dimanche matin : </label>
       <input  type="checkbox" id="dimanche" name="dimanche" value="1">
       </div>
     
 
</div>
</div>
<div class="row" style="margin-left:10px">
  
    <div class="col">
       <label  for="bulletin1">Les deux derniers Bulletins de notes de la dernière année d'études: </label>
        <label id="alert2" style="display:none; color:red;">La taille de fichier 1 dépasse la taille maximale</label>
       <input    accept="image/png, image/jpeg,image/jpg,.pdf" type="file" name="bulletin1" id="bulletin1" class="form-control" onchange="checktaillebull1()"/>
               <label id="alert3" style="display:none; color:red;">La taille de fichier 2 dépasse la taille maximale</label>
       <input   type="file"  accept="image/png, image/jpeg,image/jpg,.pdf"  name="bulletin2" id="bulletin2" class="form-control" onchange="checktaillebull2()" />
 
  
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
       <label  for="civilite">Civilité : </label>
       <input  required  type="text" name="civilite" id="civilite" class="form-control" />
        </div>
    <div class="col">
       <label for="nom_rep">Nom : </label>
       <input  class="form-control" type="text" name="nom_rep" id="nom_rep" />
 </div>
  <div class="col">
       <label  for="prenom_rep">Prénom : </label>
       <input  required  class="form-control" type="text" name="prenom_rep" id="prenom_rep" />
       </div>
       </div>

<div class="row" style="margin-left:10px">
 
    <div class="col">
       <label  for="ville">Ville : </label>
       <input  required  class="form-control" type="text" name="ville" id="ville" />

    </div>
</div>
<div class="row" style="margin-left:10px">
   
    <div class="col">
       <label  for="tel">Téléphone Portable : </label>
       <input  required  class="form-control" type="number" name="tel" id="tel" />

    </div>
</div>
<div class="row" style="margin-left:10px">
  
    <div class="col">
       <label   for="tel2">Téléphone fixe : </label>
       <input  required  class="form-control" type="number" name="tel2" id="tel2" />

    </div>
</div>

<div class="row" style="margin-left:10px">
   
    <div class="col">
       <label  for="email_rep">E-mail: </label>
    <label id="alert9" style="display:none; color:red;">L'adresse E-mail est invalide</label>
       <input   required  class="form-control" type="text" name="email_rep" id="email_rep" onchange="validation1()"  />
 </div>
 
</div>
<div class="row" style="margin-left:10px">

    <div class="col">
       <label  for="reemail_rep">Confirmez E-mail: </label>
       <label id="alert1" style="display:none; color:red;">Il faut retapez le mail</label>
       <input  class="form-control" type="text" name="reemail_rep" id="reemail_rep" onBlur="checkMail()"/>
 </div>
 
</div>



<div class="row" style="margin-left:10px">
       
 
    
</div>



   </fieldset>
    <div class="row form-group" style="margin-bottom:30px">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"  id="test" class="btn btn-primary">
                                   S'inscrire
                                </button>
                            </div>
                        </div>


             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
 $('#test').prop('disabled', false);
function checkMail()
{
var champA = document.getElementById("email_rep").value;
var champB = document.getElementById("reemail_rep").value;
 
if(champA == champB)
{
document.getElementById("alert1").style.display="none";
}
else
{
document.getElementById("alert1").style.display="block";
document.getElementById("reemail_rep").value  = "";
}}
function checkMail1()
{
var champA = document.getElementById("email").value;
var champB = document.getElementById("reemail").value;
 
if(champA == champB)
{
document.getElementById("alert").style.display="none";
}
else
{
document.getElementById("alert").style.display="block";
document.getElementById("reemail").value  = "";
}}
// fin du script -->
function sectionverif()
{
  var niveau = document.getElementById("niveau").value;
 if(niveau=="Bac" || niveau=="Baccalauréat" ||niveau=="bac"|| niveau=="3 ième année"|| niveau=="4 ième année"  )
{
document.getElementById('sect').style.display = 'block'; 
}
else
{
document.getElementById('sect').style.display = 'none'; 
}
}
function autreverif()
{
  var nomclub = document.getElementById("nomclub").value;
 if(nomclub=="Autres")
{
document.getElementById('sectautre').style.display = 'block'; 
}
else
{
document.getElementById('sectautre').style.display = 'none'; 
}
}
function clubverif()
{
  var clubs = document.getElementById("clubs").value;
  
 if(clubs==true)
{
document.getElementById('sect1').style.display = 'block'; 
document.getElementById('sect2').style.display = 'block'; 
}
else
{
  document.getElementById('sect1').style.display = 'none'; 
document.getElementById('sect2').style.display = 'none'; 
}}
function clubverif1()
{
  var clubs = document.getElementById("clubs").value;
  
 if(clubs==false)
{
document.getElementById('sect1').style.display = 'block'; 
document.getElementById('sect2').style.display = 'block'; 
}
else
{
  document.getElementById('sect1').style.display = 'none'; 
document.getElementById('sect2').style.display = 'none'; 
}}
     $(function () {
     $('#datenaissance').datepicker({
                    locale: 'fr'
                });
});
     function checktaillebull1()
{
taille=document.getElementById('bulletin1').files[0].size;
if(taille >2000000)
{
document.getElementById("alert2").style.display="block";
document.getElementById("bulletin1").value  = "";
}
else
{
document.getElementById("alert2").style.display="none";
}
 
}
     function checktaillebull2()
{
taille=document.getElementById('bulletin2').files[0].size;
if(taille >2000000)
{
document.getElementById("alert3").style.display="block";
document.getElementById("bulletin2").value  = "";
}
else
{
document.getElementById("alert3").style.display="none";
}
 
}
    function checkmoyenne1()
{
var moy1 = document.getElementById("moyenne_1").value;
if(moy1 >20 || moy1 <0) 
{
document.getElementById("alert4").style.display="block";
document.getElementById("moyenne_1").value  = "";
}
else
{
document.getElementById("alert4").style.display="none";
}
 
}
 function checkmoyenne2()
{
var moy1 = document.getElementById("moyenne_2").value;
if(moy1 >20 || moy1 <0) 
{
document.getElementById("alert5").style.display="block";
document.getElementById("moyenne_2").value  = "";
}
else
{
document.getElementById("alert5").style.display="none";
}}
 function checkmoyenne3()
{
var moy1 = document.getElementById("moyenne_3").value;
if(moy1 >20 || moy1 <0) 
{
document.getElementById("alert6").style.display="block";
document.getElementById("moyenne_3").value  = "";
}
else
{
document.getElementById("alert6").style.display="none";
}}
function checkmoyenneg()
{
var moy1 = document.getElementById("moyenne_g").value;
if(moy1 >20 || moy1 <0) 
{
document.getElementById("alert7").style.display="block";
document.getElementById("moyenne_g").value  = "";
}
else
{
document.getElementById("alert7").style.display="none";
}
 
}
function validation()
{
var expressionReguliere = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
if (expressionReguliere.test(document.getElementById("email").value))
{
  document.getElementById("alert8").style.display="none";
}
else
{
  document.getElementById("alert8").style.display="block";
document.getElementById("email").value  = "";
}
return false;
}
function validation1()
{
var expressionReguliere = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
if (expressionReguliere.test(document.getElementById("email_rep").value))
{
  document.getElementById("alert9").style.display="none";
}
else
{
  document.getElementById("alert9").style.display="block";
document.getElementById("email_rep").value  = "";
}
return false;
}
 function checkexiste2( elm) {
        var id=elm.id;
        var val =document.getElementById(id).value;
        //  var type = $('#type').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptions.checkexiste2') }}",
            method: "POST",
            data: {   val:val, _token: _token},
            success: function (data) {
               parsed = JSON.parse(data);
    
                if(data>0){
                     
                    document.getElementById(id).style.background='white';
                    document.getElementById(id).style.color='black';
                    $('#test').prop('disabled', true);
                     string='Utilisateur existe avec ce mail ! ';
                    
                   // alert(string);  
                    Swal.fire({
                        type: 'error',
                        title: 'Existe ...',
                        html: string
                    });                
                }
                 else
                  {  $('#test').prop('disabled', false);}
            }
        });
        // } else {
        // }
    }
</script>


@endsection
