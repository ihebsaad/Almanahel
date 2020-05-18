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
<div class="container">
<div class="row" style="text-align: center;padding-bottom: 20px">
	<h3> Pré-inscription / Inscription 2020-2021 </h3>
</div> 

<div class="row" style="width:100%;padding-bottom: 20px">
  <div class="clearfix"></div>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="width:100%;padding-bottom: 20px">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Calendrier d'inscription
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
          Procédure d'admission de nouveaux élèves 
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
          Procédures d'inscription
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

<div class="row">
	<section style=" font-size: 18px; font-weight: 500; color: #545454;">
		Vous êtes : <select id="elevestat">
            <option>Selectionner</option>
            <option value="nouveau">Nouveau</option>
            <option value="ancien">Ancien</option>
        </select>
         élève.
	</section>
</div>
<div class="row">
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
    	            <form class="form-horizontal" method="POST" action="{{-- route('inscriptions.store') --}}">
                        {{ csrf_field() }}
					<fieldset>
					<div class="row sectionform">L'élève</div>
					<div class="row">
	    				<div class="col">
						       <label for="nom">Nom : </label>
						       <input class="form-control" type="text" name="nom" id="nom"  placeholder="Veuillez entrer votre nom" />
						</div> 
						<div class="col">
						       <label for="prenom">Prénom : </label>
						       <input class="form-control" type="text" name="prenom" id="prenom" placeholder="Veuillez entrer votre prenom" />
						</div>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="datenaissance">Date de naissance : </label>
					       <input class="form-control" type="date" name="datenaissance" id="datenaissance" />
					 	</div>
					 	<div class="col">
					 	</div>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="email">E-mail : </label>
					       <input class="form-control" type="text" name="email" id="email" />
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
							  <input class="form-check-input" type="radio" name="type_etabliss" id="type_etabliss1" value="0">
							  <label class="form-check-label" for="type_etabliss1">Public</label>
							</div>
							<div class="form-check form-check-inline" style=" top: -3px; margin-left: 10px;">
							  <input class="form-check-input" type="radio" name="type_etabliss" id="type_etabliss2" value="1">
							  <label class="form-check-label" for="type_etabliss2">Privé</label>
							</div>
						</div>
					</div>
					<div class="row" >
						<div class="col">
					       <label for="etablissement">Nom de l'établissement d'origine : </label>
					       <input class="form-control" type="text" name="etablissement" id="etablissement" placeholder="Veuillez entrer le nom de l'établissement" />
					 	</div>
					 	<div class="col"></div>
					    
					</div>
					<div class="row" style="margin-top: 10px">
					 	<div class="col">
					 		<label for="niveau">Niveau d'études actuel : </label>
					       <input class="form-control" type="text" name="niveau" id="niveau" placeholder="Veuillez entrer votre niveau d'études actuel" />
					 	</div>
						<div class="col">
						    <label for="section">Section : </label>
						    <select  class="custom-select" name="section" id="section">
						    <option value="">Veuillez choisir une option</option>
						     <option value="Bac Français<">Bac Français</option>
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
					       <input class="form-control" type="number" step="any" name="moyenne_1" id="moyenne_1" placeholder="Moyenne de Le premier trimestre" />
					 	</div>

						<div class="col">
					       <label for="moyenne_2">Le deuxième trimestre : </label>
					       <input class="form-control" type="number" step="any" name="moyenne_2" id="moyenne_2" placeholder="Moyenne de Le deuxième trimestre" />
						</div>
						<div class="col">
					       <label for="moyenne_3">Le troisième trimestre : </label>
					       <input class="form-control" type="number" step="any" name="moyenne_3" id="moyenne_3" placeholder="Moyenne de Le troisième trimestre" />
					    </div>
					    
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">							
					       <label for="moyenne_g">La moyenne générale : </label>
					       <input class="form-control" type="number" step="any" name="moyenne_g" id="moyenne_g" placeholder="Moyenne générale" />
						</div>
						<div class="col"></div>
						<div class="col"></div>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="frere">Votre enfant a t'il un frère ou une soeur actuellement scolarisé(e) dans notre établissement ? </label>
					      	<div class="form-check form-check-inline" style=" top: -3px; margin-left: 10px;">
							  <input class="form-check-input" type="radio" name="frere" id="frere1" value="1">
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
							  <input class="form-check-input" type="radio" name="clubs" id="clubs1" value="1">
							  <label class="form-check-label" for="clubs1">Oui</label>
							</div>
							<div class="form-check form-check-inline" style=" top: -3px; margin-left: 10px;">
							  <input class="form-check-input" type="radio" name="clubs" id="clubs2" value="0">
							  <label class="form-check-label" for="clubs2">Non</label>
							</div>
						</div>
					</div>
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

					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="bulletin1">Les deux derniers Bulletins de notes de la dernière année d'études: </label>
					       <input type="file" accept="image/png, image/jpeg,image/jpg,.pdf"  name="bulletin1" id="bulletin1" class="form-control" />
					       <input type="file"  accept="image/png, image/jpeg,image/jpg,.pdf" name="bulletin2" id="bulletin2" class="form-control" />
					    </div>
					</div>



					</fieldset>
					<fieldset>
					<div class="row sectionform">Le représentant légal</div>	
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="civilite">Civilité : </label>
					       <input class="form-control" type="text" name="civilite" id="civilite" placeholder="Veuillez entrer votre civilité" />
					 	</div>
					 	<div class="col">
					       <label for="nom_rep">Nom : </label>
					       <input class="form-control" type="text" name="nom_rep" id="nom_rep" placeholder="Veuillez entrer votre nom" />
					 	</div>
					 	<div class="col">
					       <label for="prenom_rep">Prénom : </label>
					       <input class="form-control" type="text" name="prenom_rep" id="prenom_rep" placeholder="Veuillez entrer votre prénom" />
					 	</div>
					</div>

					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="ville">Ville : </label>
					       <input class="form-control" type="text" name="ville" id="ville" placeholder="Veuillez entrer votre ville" />
					 	</div>
					    <div class="col"></div>
					    
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="tel">Téléphone Portable : </label>
					       <input class="form-control" type="number" name="tel" id="tel" placeholder="Votre numéro de téléphone portable" />
					 	</div>
					 	<div class="col">
					       <label for="tel2">Téléphone fixe : </label>
					       <input class="form-control" type="text" name="tel2" id="tel2" placeholder="Votre numéro de téléphone fixe" />
					 	</div>
					    
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col">
					       <label for="email_rep">E-mail : </label>
					       <input class="form-control" type="text" name="email_rep" id="email_rep" placeholder="Veuillez entrer votre adresse email" />
					 	</div>
					    
					</div>
					<div class="row" style="margin-top: 20px">
						<span class="badge badge-warning">Une fois la pré-inscription est validée, vous recevrez un email de confirmation de la validation de la  demande, et promettant qu'il sera tenu au courant de l'issue de sa demande dans les plus brefs délais.</span>
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
    <div class="telechargeform partie">
    	Télécharger le formulaire en pdf
    </div>
	</div>
    <div class="ancien box">Vous etes <strong>ancien</strong> eleve</div>
</div> 
</div>
 
@endsection