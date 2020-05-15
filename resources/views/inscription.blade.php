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
    /*.nouveau{ background: #ff0000; }
    .ancien{ background: #228B22; }*/

    /* Accordion */


	.panel-default>.panel-heading {
	  color: #333;
	  background-color: #fff;
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
	  background-color: #eee;
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
	<section>
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
    	Veuillez remplir le formulaire ci dessous:
    	            <form class="form-horizontal" method="POST" action="{{ route('inscriptions.store') }}">
                        {{ csrf_field() }}
					             <fieldset>
					       <legend>Élève</legend> <!-- Titre du fieldset --> 
					<div class="row"  style="margin-left:10px">
					       <label for="eleve">Identifiant de l'élève : </label>
					       <input type="number" name="eleve" id="eleve" />
					       </div>
					<div class="row" style="margin-left:10px">
					       <label for="nom">Nom : </label>
					       <input type="text" name="nom" id="nom" />
					 
					       <label for="prenom">Prénom : </label>
					       <input type="text" name="prenom" id="prenom" />
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="datenaissance">Date de naissance : </label>
					       <input type="date" name="datenaissance" id="datenaissance" />
					 
					    
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="type_etabliss">Etablissement d'origine où votre enfant est actuellement scolarisé : </label>
					        Public <input type="radio" id="type_etabliss" name="type_etabliss" value="0">
					        Privé<input type="radio" id="type_etabliss" name="type_etabliss" value="1">
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="etablissement">Nom de l'établissement d'origine : </label>
					       <input type="text" name="etablissement" id="etablissement" />
					 
					    
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="niveau">Niveau d'études actuel : </label>
					       <input type="text" name="niveau" id="niveau" />
					 
					    
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="section">Section : </label>
					    <select name="section" id="section">
					    <option value="">--Please choose an option--</option>
					     <option value="Bac Français<">Bac Français</option>
					    <option value="Sciences expérimentales">Sciences expérimentales</option>
					    <option value="Mathématiques">Mathématiques</option>
					    <option value="Sciences techniques">Sciences techniques</option>
					    <option value="Autre">Autre</option>
					  </select>
					 
					    
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="niveau">la moyenne de notes obtenues durant la dernière année d'étude  : </label>
					       
					    
					</div>
					<div class="row" style="margin-left:15px">
					       <label for="moyenne_1">Le premier trimestre : </label>
					       <input type="number" step="any" name="moyenne_1" id="moyenne_1" />
					 
					    
					</div>
					<div class="row" style="margin-left:15px">
					       <label for="moyenne_2">Le deuxième trimestre : </label>
					       <input type="number" step="any" name="moyenne_2" id="moyenne_2" />
					 
					    
					</div>
					<div class="row" style="margin-left:15px">
					       <label for="moyenne_3">Le troisième trimestre : </label>
					       <input type="number" step="any" name="moyenne_3" id="moyenne_3" />
					 
					    
					</div>
					<div class="row" style="margin-left:15px">
					       <label for="moyenne_g">La moyenne générale : </label>
					       <input type="number" step="any" name="moyenne_g" id="moyenne_g" />
					 
					    
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="frere">Votre enfant a t'il un frère ou une soeur actuellement scolarisé(e) dans notre établissement ? </label>
					      Oui <input type="radio" id="frere" name="frere" value="1">
					      Non <input type="radio" id="frere" name="frere" value="0">
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="clubs">Votre enfant souhaite-t-il intégrer un Club ? </label>
					      Oui <input type="radio" id="clubs" name="clubs" value="1">
					      Non <input type="radio" id="clubs" name="clubs" value="0">
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="niveau">les horaires d'activités de club : </label>
					       
					    
					</div>
					<div class="row" style="margin-left:15px">
					       <label for="heure_17h">17h15-18h30: </label>
					     <input type="checkbox" id="heure_17h" name="heure_17h" value="1">
					     
					</div>
					<div class="row" style="margin-left:15px">
					       <label for="heure_12h">12h30-13h45 :  </label>
					   <input type="checkbox" id="heure_12h" name="heure_12h" value="1">
					     </div>
					<div class="row" style="margin-left:15px">
					       <label for="vendredi">Vendredi après-midi : </label>
					  <input type="checkbox" id="vendredi" name="vendredi" value="1">
					     
					</div><div class="row" style="margin-left:15px">
					       <label for="samedi">Samedi après-midi : </label>
					       <input type="checkbox" id="samedi" name="samedi" value="1">
					 
					</div>
					<div class="row" style="margin-left:15px">
					       <label for="dimanche">Dimanche matin : </label>
					       <input type="checkbox" id="dimanche" name="dimanche" value="1">
					 
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
					       <input type="number" name="civilite" id="civilite" />
					       </div>
					<div class="row" style="margin-left:10px">
					       <label for="nom_rep">Nom : </label>
					       <input type="text" name="nom_rep" id="nom_rep" />
					 
					       <label for="prenom_rep">Prénom : </label>
					       <input type="text" name="prenom_rep" id="prenom_rep" />
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="ville">Ville : </label>
					       <input type="text" name="ville" id="ville" />
					 
					    
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="tel">Téléphone Portable : </label>
					       <input type="number" name="tel" id="tel" />
					 
					    
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="tel2">Téléphone fixe : </label>
					       <input type="number" name="tel2" id="tel2" />
					 
					    
					</div>
					<div class="row" style="margin-left:10px">
					       <label for="email">E-mail: </label>
					       <input type="text" name="email" id="email" />
					 
					    
					</div>

					<div class="row" style="margin-left:10px">
					       
					 
					    
					</div>



					   </fieldset>
					    <div class="row form-group" style="margin-bottom:30px">
					                            <div class="col-md-6 col-md-offset-4">
					                                <button type="submit" class="btn btn-primary">
					                                   S'inscrire
					                                </button>
					                            </div>
					                        </div>


             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
    </div>
    <div class="ancien box">Vous etes <strong>ancien</strong> eleve</div>
</div> 
</div>

 
@endsection