
@extends('layouts.back')


@section('content')
<h3 style="margin-left:50px">Formulaire Pré-inscription </h3><br><br>    
            <form class="form-horizontal" method="POST" action="{{ route('inscriptions.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
             <fieldset>
       <legend>Élève</legend> <!-- Titre du fieldset --> 
 
<div class="row" style="margin-left:10px">

    <div class="col">
       <label  for="nom">Nom : </label>
       <input type="text" name="nom" id="nom"  class="form-control"/>
 </div>
  <div class="col">
       <label  for="prenom">Prénom : </label>
       <input type="text" name="prenom" id="prenom" class="form-control" />
     
</div>
</div>
<div class="row" style="margin-left:10px">

    <div class="col">
       <label  for="datenaissance">Date de naissance : </label>
       <input type="text" name="datenaissance" id="datenaissance" class="form-control" />
 
  </div></div>
   <div class="row" style="margin-left:10px">
  
    <div class="col">
       <label  for="email">E-mail: </label>
       <input  class="form-control" type="text" name="email" id="email" />

    </div>
</div>
<div class="row" style="margin-left:10px">
  
    <div class="col">
       <label  for="reemail_rep">Confirmez E-mail: </label>
       <label id="alert" style="display:none; color:red;">Il faut retapez le mail</label>
       <input  class="form-control" type="text" name="reemail" id="reemail" onBlur="checkMail1()"/>
 </div>
   
</div>

 <?php	  //ANNEE
		$year=date('Y');$month=date('m');
		$mois=intval($month);
		$annee=intval($year);
		if($mois > 9 ){$annee=$annee-1;}
		?>
	   <input id="annee" type="hidden" class="form-control" name="annee"  value="<?php echo $annee;?>"/>

<div class="row" style="margin-left:10px">
  
    <div class="col">
       <label  for="type_etabliss">Etablissement d'origine où votre enfant est actuellement scolarisé : </label>
        Public <input type="radio" id="type_etabliss" name="type_etabliss" value="0" >
        Privé<input type="radio" id="type_etabliss" name="type_etabliss" value="1">

</div>
</div>
<div class="row" style="margin-left:10px">

    <div class="col">
       <label  for="etablissement">Nom de l'établissement d'origine : </label>
       <input type="text" name="etablissement" id="etablissement"  class="form-control"/>
 
    
</div>

</div>
<div class="row" style="margin-left:10px">
 
    <div class="col">
       <label for="niveau">Niveau d'études actuel : </label>
       <input type="text" name="niveau" id="niveau" class="form-control" onKeyUp="sectionverif()"/>

   </div> 
</div>
<?php ?>
<div  id="sect"class="row" style="margin-left:10px ;display:none"  >

    <div class="col">
       <label  class="form-label" for="section">Section : </label>
    <select name="section" id="section" class="form-control" >
    <option value="">--Please choose an option--</option>
     <option value="Bac Français<">Bac Français</option>
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
       <input type="number" step="any" name="moyenne_1" id="moyenne_1" class="form-control"  />
 </div>
</div>
    

<div class="row" style="margin-left:15px">
 
    <div class="col">
       <label  for="moyenne_2">Le deuxième trimestre : </label>
       <input type="number" step="any" name="moyenne_2" id="moyenne_2"class="form-control" />

    </div>
</div>
<div class="row" style="margin-left:15px">
  
    <div class="col">
       <label  for="moyenne_3">Le troisième trimestre : </label>
       <input type="number" step="any" name="moyenne_3" id="moyenne_3" class="form-control" />

    </div>
</div>
<div class="row" style="margin-left:15px">
     
    <div class="col">
       <label  for="moyenne_g">La moyenne générale : </label>
       <input type="number" step="any" name="moyenne_g" id="moyenne_g" class="form-control" />
 </div>
   
</div>
<div class="row" style="margin-left:10px">
     
    <div class="col">
       <label  for="frere">Votre enfant a t'il un frère ou une soeur actuellement scolarisé(e) dans notre établissement ? </label>
      Oui <input type="radio" id="frere" name="frere" value="1">
      Non <input type="radio" id="frere" name="frere" value="0">
</div>

</div>
<div class="row" style="margin-left:10px">
     
    <div class="col">
       <label for="clubs">Votre enfant souhaite-t-il intégrer un Club ? </label>
      Oui <input type="radio" id="clubs" name="clubs" value="1" onBlur="clubverif()">
      Non <input type="radio" id="clubs" name="clubs" value="0" onBlur="clubverif1()"  >
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
    <input type="text" name="nomclubautre" id="nomclubautre" class="form-control" />
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
     <input type="checkbox" id="heure_17h" name="heure_17h" value="1"  >
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
  <input type="checkbox" id="vendredi" name="vendredi" value="1">
      
     </div>
</div>
<div class="row" style="margin-left:15px">

    <div class="col">
       <label  for="samedi">Samedi après-midi : </label>
       <input type="checkbox" id="samedi" name="samedi" value="1">

 </div>
  
</div>
<div class="row" style="margin-left:15px">
 
    <div class="col">
       <label  for="dimanche">Dimanche matin : </label>
       <input type="checkbox" id="dimanche" name="dimanche" value="1">
       </div>
     
 
</div>
</div>
<div class="row" style="margin-left:10px">
  
    <div class="col">
       <label  for="bulletin1">Les deux derniers Bulletins de notes de la dernière année d'études: </label>
       <input type="file" accept="image/png, image/jpeg,image/jpg,.pdf"  name="bulletin1" id="bulletin1" class="form-control" />
       <input type="file"  accept="image/png, image/jpeg,image/jpg,.pdf" name="bulletin2" id="bulletin2" class="form-control" />
 
  
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
       <input type="text" name="civilite" id="civilite" class="form-control" />
        </div>
    <div class="col">
       <label for="nom_rep">Nom : </label>
       <input  class="form-control" type="text" name="nom_rep" id="nom_rep" />
 </div>
  <div class="col">
       <label  for="prenom_rep">Prénom : </label>
       <input  class="form-control" type="text" name="prenom_rep" id="prenom_rep" />
       </div>
       </div>

<div class="row" style="margin-left:10px">
 
    <div class="col">
       <label  for="ville">Ville : </label>
       <input class="form-control" type="text" name="ville" id="ville" />

    </div>
</div>
<div class="row" style="margin-left:10px">
   
    <div class="col">
       <label  for="tel">Téléphone Portable : </label>
       <input class="form-control" type="number" name="tel" id="tel" />

    </div>
</div>
<div class="row" style="margin-left:10px">
  
    <div class="col">
       <label   for="tel2">Téléphone fixe : </label>
       <input class="form-control" type="number" name="tel2" id="tel2" />

    </div>
</div>

<div class="row" style="margin-left:10px">
   
    <div class="col">
       <label  for="email_rep">E-mail: </label>

       <input  class="form-control" type="text" name="email_rep" id="email_rep"  />
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



</script>


@endsection






