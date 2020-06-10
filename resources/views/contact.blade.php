@extends('layouts.front')

@section('content')
 

  

  <!-- Main Content -->
  <div class="container">
  
   <?php 
$cont =  App\Contenu::where('zone', 'contact')->first();$contenu=$cont->contenu ;
  
?>
<div class="jumbotron card card-image" style="background-image: url({{  URL::asset('public/site/img/gradient.jpg') }}); padding:0px!important;text-align:left!important;border:none!important;border-radius:0px!important;margin-top: -30px;">
  <div class="text-white text-center py-5 px-4" style="padding-top: 20px!important; padding-bottom: 40px!important;">
    <div>
      <h2 class="card-title h1-responsive pt-3 mb-5 font-bold" style="margin-bottom: 0px!important;"><strong>Contact</strong></h2>
    </div>
  </div>
</div>
<div class="row"  style="margin-bottom:20px">  

<div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">  
<section>
<?php echo $contenu; ?>
</section>
</div>

<div class="col-xs-12 col-sm-12  col-md-5 col-lg-5">  
 
 <center>
 <a href="https://g.page/almanahel-monastir" target="blank">
 <img src="{{  URL::asset('public/site/img/manahel.png') }}" width="420"></a>
 </center>
 
 </div>

</div>


    <div class="row" style="margin-left:60px">
      <div class="col-lg-8 col-md-10  ">
        <b>Questions? n'hésitez pas à nous contacter :</b><br>
		<!--<form method="post" action="{{ route('envoyes.sendnotif') }}"  enctype="multipart/form-data">-->
		<form method="post"  id="myform" >
			  {{ csrf_field() }}
			  <?php
			  $dest=array('ihebsaad@gmail.com','saadiheb@gmail.com' );
			  ?>
		  <input type="hidden" class="form-control"  id="destinataire"  name="destinataire[]"  value="<?php echo $dest;?>">
		  <input type="hidden" class="form-control"  id="type"  name="type"  value="contact">
		  <input type="hidden" class="form-control"  id="sujet"  name="sujet"  value="Message de Contact - Al Manahel">
 
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
              <input type="tel" class="form-control" placeholder="N° Tel" id="tel" required data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
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
            var destinataire = $('#destinataire').val();
             if ((contenu != '') )
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('envoyes.sendmessage') }}",
                    method:"POST",
                    data:{nom:nom,email:email,tel:tel,sujet:sujet,contenu:contenu,type:type,destinataire:destinataire, _token:_token},
                    success:function(data){
					swal({
                        type: 'success',
                        title: 'Envoyé ...',
                        text: 'Votre message a été envoyée avec succès'
 					//	icon: "success",
                    }); 
					document.getElementById("myform").reset();

                    }
                });
            }else{
					swal({
                        type: 'error',
                        title: 'Existe ...',
                        html: string
                    });            
					}
        });


    });
</script>
  
  
  
    @endsection
  