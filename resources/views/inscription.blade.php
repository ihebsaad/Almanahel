@extends('layouts.front')

@section('content')

 <?php 
$cont =  App\Contenu::where('zone', 'inscription')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'inscription2')->first();$contenu2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'inscription3')->first();$contenu3=$cont3->contenu ;
 
?>
<style>
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .nouveau{ color: #000; margin-top: 10px;}
    .ancien{ color: #000; margin-top: 10px; }
    /* Accordion */
	.panel-default>.panel-heading {
	  color: #333;
	  background-color: #eee;
	  border-color: #e4e5e7;
	  padding: 0;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}
	.panel-default>.panel-heading a {
	    display: block;
	    padding: 10px 15px;
	    font-size: 16px;
	}
	.panel-default>.panel-heading a:after {
	  content: "";
	  position: relative;
	  top: 1px;
	  display: inline-block;
	  font-family: 'Glyphicons Halflings';
	  font-style: normal;
	  font-weight: 400;
	  line-height: 1;
	  -webkit-font-smoothing: antialiased;
	  -moz-osx-font-smoothing: grayscale;
	  float: right;
	  transition: transform .25s linear;
	  -webkit-transition: -webkit-transform .25s linear;
	}
	.panel-default>.panel-heading a[aria-expanded="true"] {
	  background-color: #ccc;
	}
	.panel-default>.panel-heading a[aria-expanded="true"]:after {
	  content: "\2212";
	  -webkit-transform: rotate(180deg);
	  transform: rotate(180deg);
	}
	.panel-default>.panel-heading a[aria-expanded="false"]:after {
	  content: "\002b";
	  -webkit-transform: rotate(90deg);
	  transform: rotate(90deg);
	}
	.accordion-option {
	  width: 100%;
	  float: left;
	  clear: both;
	  margin: 15px 0;
	}
	.accordion-option .title {
	  font-size: 20px;
	  font-weight: bold;
	  float: left;
	  padding: 0;
	  margin: 0;
	}
	.accordion-option .toggle-accordion {
	  float: right;
	  font-size: 16px;
	  color: #6a6c6f;
	}
	.panel-body {
		
	    padding: 10px 15px;
	}
	.sectionform {
		background-color:#ccc;
		color: black;
		font-weight:600;
		padding:5px 20px;
    	margin-top: 20px;
		margin-bottom: 15px}
	.btn-preinscrit {
	}
</style>
<div class="jumbotron card card-image" style="background-image: url({{  URL::asset('public/site/img/gradient.jpg') }}); padding:0px!important;text-align:left!important;border:none!important;border-radius:0px!important;margin-top: -30px;">
  <div class="text-white text-center py-5 px-4" style="padding-top: 20px!important; padding-bottom: 40px!important;">
    <div>
      <h2 class="card-title h1-responsive pt-3 mb-5 font-bold" style="margin-bottom: 0px!important;"><strong>Inscription</strong></h2>
    </div>
  </div>
</div>
<div class="container">
<div class="row" style="width:100%;padding-bottom: 20px">
  <div class="clearfix"></div>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="width:100%;padding-bottom: 20px">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      Critères et calendrier d'admission
        </a>
      </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body" style="width:100%;">
           
		  <?php echo $contenu; ?>
		   
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          Procédure de préinscription
        </a>
      </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <?php echo $contenu2; ?>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          Procédure d'inscription
        </a>
      </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <?php echo $contenu3; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row" style="text-align: center;padding-bottom: 20px"  id="inscription">
	<h3> Pré-inscription / Inscription 2020-2021 </h3>
</div>
<div class="row">
	<section style=" font-size: 18px; font-weight: 500; color: #545454;width:200px">
		Vous êtes : <select id="elevestat" class="form-control">
            <option>Sélectionnez</option>
            <option value="nouveau">Nouveau élève</option>
            <option value="ancien">Ancien élève</option>
        </select>
         
	</section>
</div>
<div class="container">
    <div class="nouveau box">
    	<div class="row" style="margin-top: 10px">
    	<p style="color:#f20101;text-decoration: underline;">Cette pré-inscription ne concerne pas les élèves déjà scolarisés au lycée Al-Manahel</p>
			    <label for="mpreinscrit">Pour qu'un élève soit admis au lycée Al-Manahel, la première démarche à faire par le parent concerné est soit de: </label>
			    <select  class="custom-select" name="mpreinscrit" id="mpreinscrit" >
			    <option value="">Veuillez choisir une option</option>
			     <option value="formenligne">1- Compléter le formulaire en ligne, joindre une copie des deux derniers bulletins de notes et valider la pré-inscription</option>
			    <option value="telechargeform">2- Télécharger le formulaire en pdf, le remplir, le signer et le déposer, avec une copie des deux  derniers bulletins de notes, au secrétariat du lycée.</option>
			  </select>
		</div>
		<div class="formenligne partie">
    	<h4 style="padding-top: 20px;">Veuillez remplir le formulaire ci dessous:</h4>
    	            <form class="form-horizontal" method="POST" action="{{ route('inscriptions.store') }} "  enctype="multipart/form-data">
                        {{ csrf_field() }}
					<fieldset>
						<input  value="2020" type="hidden" name="annee" id="annee" />
						<input  value="front" type="hidden" name="sourcepg" id="sourcepg" />
					<div class="row sectionform">L'élève</div>
					<div class="row">
	    				<div class="col">
						       <label for="nom">Nom : </label>
						       <input required class="form-control" type="text" name="nom" id="nom"  placeholder="Veuillez entrer votre nom" />
						</div> 
						<div class="col">
						       <label for="prenom">Prénom : </label>
						       <input required class="form-control" type="text" name="prenom" id="prenom" placeholder="Veuillez entrer votre prenom" />
						</div>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="datenaissance">Date de naissance : </label>
					       <input required class="form-control" type="text" name="datenaissance" id="datenaissance" />
					 	</div>
					 	<div class="col">
					 	</div>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="email">E-mail : </label>
					          <label id="alert8" style="display:none; color:red;">L'adresse E-mail est invalide</label>
					       <input required class="form-control" type="text" name="email" id="email" onchange="validation()" />
					   </div>
					 	<div class="col">
					       <label for="reemail">Confirmez E-mail : </label>
					       <span class="badge badge-danger" id="alertemail" style="display:none;">Il faut retaper le même email</span>
					       <input class="form-control" type="text" name="reemail" id="reemail" />
					 	</div>
					</div>
					<div class="row" style="margin-top: 20px">
						<div class="col">
					       <label for="type_etabliss">Etablissement d'origine où votre enfant est actuellement scolarisé : </label>

					       <div class="form-check form-check-inline" style=" top: -3px; margin-left: 10px;">
							  <input required class="form-check-input" type="radio" name="type_etabliss" id="type_etabliss1" value="0">
							  <label class="form-check-label" for="type_etabliss1">Public</label>
							</div>
							<div class="form-check form-check-inline" style=" top: -3px; margin-left: 10px;">
							  <input required class="form-check-input" type="radio" name="type_etabliss" id="type_etabliss2" value="1">
							  <label class="form-check-label" for="type_etabliss2">Privé</label>
							</div>
						</div>
					</div>
					<div class="row" >
						<div class="col">
					       <label for="etablissement">Nom de l'établissement d'origine : </label>
					       <input required class="form-control" type="text" name="etablissement" id="etablissement" placeholder="Veuillez entrer le nom de l'établissement" />
					 	</div>
					 	<div class="col"></div>
					    
					</div>
					<div class="row" style="margin-top: 10px">
					 	<div class="col">
					 		<label for="niveau">Niveau d'études actuel : </label>
					       <input required class="form-control" type="text" name="niveau" id="niveau" placeholder="Veuillez entrer votre niveau d'études actuel" />
					 	</div>
						<div class="col">
						    <label for="section">Section : </label>
						    <select  class="custom-select" name="section" id="section">
						    <option value="">Veuillez choisir une option</option>
						     <option value="Bac Français">Bac Français</option>
						    <option value="Sciences expérimentales">Sciences expérimentales</option>
						    <option value="Mathématiques">Mathématiques</option>
						    <option value="Sciences techniques">Sciences techniques</option>
						    <option value="Autre">Autre</option>
						  </select>
						</div>
					    
					</div>
					<div class="row" style="margin-top: 10px">
					       <div class="col" ><b>la moyenne de notes obtenues durant la dernière année d'étude  :</b> </div>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="moyenne_1">Le premier trimestre : </label>
					             <label id="alert4" style="display:none; color:red;">La moyenne de premier trimestre est invalide</label>
					       <input required class="form-control" type="number" step="any" name="moyenne_1" id="moyenne_1" placeholder="Moyenne de Le premier trimestre" onblur="checkmoyenne1()" />
					 	</div>

						<div class="col">
					       <label for="moyenne_2">Le deuxième trimestre : </label>
					           <label id="alert5" style="display:none; color:red;">La moyenne de deuxième trimestre est invalide</label>
					       <input required class="form-control" type="number" step="any" name="moyenne_2" id="moyenne_2" placeholder="Moyenne de Le deuxième trimestre" onblur="checkmoyenne2()" />
						</div>
						<div class="col">
					       <label for="moyenne_3">Le troisième trimestre : </label>
					        <label id="alert6" style="display:none; color:red;">La moyenne de  troisième trimestre est invalide</label>
					       <input  class="form-control" type="number" step="any" name="moyenne_3" id="moyenne_3" placeholder="Moyenne de Le troisième trimestre" onblur="checkmoyenne3()" />
					    </div>
					    
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">							
					       <label for="moyenne_g">La moyenne générale : </label>
					        <label id="alert7" style="display:none; color:red;">La moyenne générale est invalide</label>
					       <input  class="form-control" type="number" step="any" name="moyenne_g" id="moyenne_g" placeholder="Moyenne générale" onblur="checkmoyenneg()" />
						</div>
						<div class="col"></div>
						<div class="col"></div>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="frere">Votre enfant a t'il un frère ou une soeur actuellement scolarisé(e) dans notre établissement ? </label>
					      	<div class="form-check form-check-inline" style=" top: -3px; margin-left: 10px;">
							  <input required class="form-check-input" type="radio" name="frere" id="frere1" value="1">
							  <label class="form-check-label" for="frere1">Oui</label>
							</div>
							<div class="form-check form-check-inline" style=" top: -3px; margin-left: 10px;">
							  <input class="form-check-input" type="radio" name="frere" id="frere2" value="0">
							  <label class="form-check-label" for="frere2">Non</label>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="clubs">Votre enfant souhaite-t-il intégrer un Club ? </label>
					      <div class="form-check form-check-inline" style=" top: -3px; margin-left: 10px;">
							  <input required class="form-check-input" type="radio" name="clubs" id="clubs1" value="1"  onclick="clubverif()">
							  <label class="form-check-label" for="clubs1">Oui</label>
							</div>
							<div class="form-check form-check-inline" style=" top: -3px; margin-left: 10px;">
							  <input  required class="form-check-input" type="radio" name="clubs" id="clubs2" value="0" onclick="clubverif1()" >
							  <label class="form-check-label" for="clubs2">Non</label>
							</div>
						</div>
					</div>
					<div  id="sect1"class="row" style="display:none"  >
					    <div class="col">
					       <label   for="section">Nom de Club : </label>
					    <select name="nomclub" id="nomclub" class="form-control" onchange="autreverif()" >
						    <option value="">Veuillez choisir une option</option>
						     <option value="Musique">Musique</option>
						    <option value="Théâtre">Théâtre</option>
						    <option value="Robotique">Robotique</option>
						    <option value="Anglais">Anglais</option>
						    <option value="Autres">Autres</option>
						</select>
						</div>
					 	<div class="col"></div>
					 	<div class="col"></div>
					</div> 

					    <div  id="sectautre"class="row" style="margin-top: 10px;display:none"  >

						    <div class="col">
						       <label  for="section">Nom d'autre club : </label>
						    <input type="text" name="nomclubautre" id="nomclubautre" class="form-control" />
						 	</div>
					 
					    </div> 
					<div id="sect2" style="display:none">    
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="niveau">Les horaires d'activités de club : </label>
					   </div>   
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					    <div class="form-check">
						  <input class="form-check-input" type="checkbox" value="1" id="heure_17h" name="heure_17h">
						  <label class="form-check-label" for="heure_17h">
						    17h15-18h30
						  </label>
						</div>
						</div>
					</div>

					<div class="row" style="margin-top: 10px">
						<div class="col">
					    <div class="form-check">
						  <input class="form-check-input" type="checkbox" value="1" id="heure_12h" name="heure_12h">
						  <label class="form-check-label" for="heure_12h">
						    12h30-13h45
						  </label>
						</div>
						</div>
					</div>

					<div class="row" style="margin-top: 10px">
						<div class="col">
					    <div class="form-check">
						  <input class="form-check-input" type="checkbox" value="1" id="vendredi" name="vendredi">
						  <label class="form-check-label" for="vendredi">
						    Vendredi après-midi
						  </label>
						</div>
						</div>
					</div>

					<div class="row" style="margin-top: 10px">
						<div class="col">
					    <div class="form-check">
						  <input class="form-check-input" type="checkbox" value="1" id="samedi" name="samedi">
						  <label class="form-check-label" for="samedi">
						    Samedi après-midi
						  </label>
						</div>
						</div>
					</div>

					<div class="row" style="margin-top: 10px">
						<div class="col">
					    <div class="form-check">
						  <input class="form-check-input" type="checkbox" value="1" id="dimanche" name="dimanche">
						  <label class="form-check-label" for="dimanche">
						    Dimanche matin
						  </label>
						</div>
						</div>
					</div>
					</div>
					<div class="row" style="margin-top: 10px">
						 <div class="col">
       <label  for="bulletin1">Les deux derniers Bulletins de notes de la dernière année d'études: </label>
        <label id="alert2" style="display:none; color:red;">La taille de fichier 1 dépasse la taille maximale</label>
       <input  required  accept="image/png, image/jpeg,image/jpg,.pdf" type="file" name="bulletin1" id="bulletin1" class="form-control" onchange="checktaillebull1()"/>
               <label id="alert3" style="display:none; color:red;">La taille de fichier 2 dépasse la taille maximale</label>
       <input  required  type="file"  accept="image/png, image/jpeg,image/jpg,.pdf"  name="bulletin2" id="bulletin2" class="form-control" onchange="checktaillebull2()" />
 
  
       </div>
					</div>



					</fieldset>
					<fieldset>
					<div class="row sectionform">Le représentant légal</div>	
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="civilite">Civilité : </label>
					       <input required class="form-control" type="text" name="civilite" id="civilite" placeholder="Veuillez entrer votre civilité" />
					 	</div>
					 	<div class="col">
					       <label for="nom_rep">Nom : </label>
					       <input required class="form-control" type="text" name="nom_rep" id="nom_rep" placeholder="Veuillez entrer votre nom" />
					 	</div>
					 	<div class="col">
					       <label for="prenom_rep">Prénom : </label>
					       <input required class="form-control" type="text" name="prenom_rep" id="prenom_rep" placeholder="Veuillez entrer votre prénom" />
					 	</div>
					</div>

					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="ville">Ville : </label>
					       <input required class="form-control" type="text" name="ville" id="ville" placeholder="Veuillez entrer votre ville" />
					 	</div>
					    <div class="col"></div>
					    
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="tel">Téléphone Portable : </label>
					       <input required  class="form-control" type="number" name="tel" id="tel" placeholder="Votre numéro de téléphone portable" />
					 	</div>
					 	<div class="col">
					       <label for="tel2">Téléphone fixe : </label>
					       <input required class="form-control" type="text" name="tel2" id="tel2" placeholder="Votre numéro de téléphone fixe" />
					 	</div>
					    
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="email_rep">E-mail : </label>
					        <label id="alert9" style="display:none; color:red;">L'adresse E-mail est invalide</label>
					       <input required class="form-control" type="text" name="email_rep" id="email_rep" placeholder="Veuillez entrer votre adresse email" onchange="validation1()" />
					 	</div>
					    
					</div>
					<div class="row" style="margin-top: 20px">
						<span class="badge badge-warning">Une fois la pré-inscription est validée, vous recevrez un email de confirmation de la validation de la demande,<br>
						et promettant que vous serez tenu au courant de l'issue de votre demande dans les plus brefs délais.</span>
					</div>
					   </fieldset>
					    <div class="row form-group" style="margin-top:20px;margin-bottom:20px">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-preinscrit">
                                   Je valide la demande de pré-inscription
                                </button>
                            </div>
                        </div>


             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
    </div>
    <div class="telechargeform partie" style="margin-top: 20px">
    	<p>1- Veuillez télécharger ce formulaire en pdf (<a href="{{  URL::asset('public/site/Demande_Pre-inscription.pdf') }}" download>lien de téléchargement</a>)</p>
		<p>2- le remplir et le signer</p>
		<p>3- le déposer, avec une copie des deux derniers bulletins de notes, au secrétariat du lycée.</p>
    </div>
	</div>
    <div class="ancien box">
		<p>1- Veuillez télécharger ce formulaire en pdf (<a href="{{  URL::asset('public/site/Demande_inscription.pdf') }}" download>lien de téléchargement</a>)</p>
		<p>2- le remplir et le signer</p>
		<p>3- le déposer, avec le dossier complet de demande d'inscription, au secrétariat du lycée.</p>
    </div>
</div> 
</div>



 <script type="text/javascript">
 	function clubverif()
{
  
 if(document.getElementById("clubs1").checked==true)
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
  
  document.getElementById('sect1').style.display = 'none'; 
document.getElementById('sect2').style.display = 'none'; 
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

 </script>
@endsection

@section('footer_scripts')
<!----- Datepicker ------->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 
 <script>

  $(function () {
     $('#datenaissance').datepicker({
                    locale: 'fr'
                });
});

 </script>
@endsection
