@extends('layouts.front')

@section('content')

 
 
<?php
$cont =  App\Contenu::where('zone', 'formation')->first();$contenu=$cont->contenu ;
//$cont2 =  App\Contenu::where('zone', 'formation2')->first();$contenu2=$cont2->contenu ;

 ?>
 
<div class="row">  
 
<center><h4>Dernières Annonces<h4></center>
  
@include('annonces')
  
 </div>

 <div class="row">  
<section>
<?php  echo $contenu ; ?>
</section>
</div>
  
 
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Questions? n'hésitez pas à nous contacter</p>
		<!--<form method="post" action="{{ route('envoyes.sendnotif') }}"  enctype="multipart/form-data">-->
		<form method="post"  id="myform" >
			  {{ csrf_field() }}
		  <input type="hidden" class="form-control"  id="destinataire"  name="destinataire"  value="ihebsaad@gmail.com ">
		  <input type="hidden" class="form-control"  id="type"  name="type"  value="demande">
		  <input type="hidden" class="form-control"  id="sujet"  name="sujet"  value="Demande d'Emploi/Formation - Al Manahel">
 
			 <div class="control-group">
            <div class="form-group  ">
              <label>Type de demande</label>
              <select   class="form-control"   id="demande"  >
			  <option value="">sélectionnez</option>
			  <option value="emploi">Emploi</option>
			  <option value="formation">Formation</option>
			  </select>
             </div>
          </div>
			 <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Nom</label>
              <input type="text" class="form-control" placeholder="Nom Complet" id="nom" required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Adresse Email" id="email"  required data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Tel</label>
              <input type="tel" class="form-control" placeholder="N° Tel" id="tel" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Date de naissance</label>
              <input type="text" class="form-control" placeholder="jj/mm/aaaa" id="naissance" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Diplôme</label>
              <input type="text" class="form-control" placeholder="votre dernier diplôme" id="diplome" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
		 <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Qualification</label>
              <select   class="form-control"   id="qualification"  >
			  <option value="">sélectionnez</option>
			  <option value="technicien">Technicien</option>
			  <option value="preparateur">Préparateur</option>
			  <option value="enseignant">Enseignant</option>
			  <option value="administratif">Personnel Administratif</option>
			  <option value="surveillant">surveillant</option>
			  <option value="autre">Autre</option>
			  
			  </select>
             </div>
          </div>		  
		  <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Adresse</label>
              <textarea   class="form-control"  id="adresse"  ></textarea>
             </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" id="contenu" name="contenu" required data-validation-required-message=" "></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
  
        </form>
		    <div class="form-group">
            <button  class="btn btn-primary" id="send">Envoyer</button>
          </div>
      </div>
    </div>
  </div>
  <script    src="{{  URL::asset('public/site/vendor/jquery/jquery.min.js') }}"   ></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function(){

        $('#send').click(function(){
             var type = $('#type').val();
            var sujet = $('#sujet').val();
            var contenu = $('#contenu').val();
             var nom = $('#nom').val();
            var email = $('#email').val();
            var tel = $('#tel').val();
            var adresse = $('#adresse').val();
            var qualification = $('#qualification').val();
            var diplome = $('#diplome').val();
            var demande = $('#demande').val();
            var naisssance = $('#naisssance').val();
            var destinataire = $('#destinataire').val();
             if ((contenu != '') )
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('envoyes.sendmessagef') }}",
                    method:"POST",
                    data:{diplome:diplome,qualification:qualification,demande:demande,naisssance:naisssance,adresse:adresse,nom:nom,email:email,tel:tel,sujet:sujet,contenu:contenu,type:type,destinataire:destinataire, _token:_token},
                    success:function(data){
						swal.fire({
                        type: 'success',
                        title: 'Envoyé ...',
                        html: 'Votre demande a été envoyée avec succès'
                    }); 
					document.getElementById("myform").reset();

                    }
                });
            }else{
						swal.fire({
                        type: 'error',
                        title: 'Existe ...',
                        html: string
                    });              }
        });




    });
</script> 
@endsection