
@extends('layouts.back')
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"  >

@section('content')
<h3 style="margin-left:50px">Formulaire Pré-inscription </h3><br><br>    
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


@endsection






