@extends('layouts.front')

@section('content')
 

  

  <!-- Main Content -->
  <div class="container">
  
   <?php 
$cont =  App\Contenu::where('zone', 'contact')->first();$contenu=$cont->contenu ;
  
?>
<div class="row"  style="margin-bottom:20px">  

<div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">  
<section>
<?php echo $contenu; ?>
</section>
</div>

<div class="col-xs-12 col-sm-12  col-md-5 col-lg-5">  
 
 <center>
 <a href="https://g.page/almanahel-monastir" target="blank">
 <img src="{{  URL::asset('public/site/img/manahel.png') }}"></a>
 </center>
 
 </div>

</div>


    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Questions? n'hésitez pas à nous contacter</p>
		<!--<form method="post" action="{{ route('envoyes.sendnotif') }}"  enctype="multipart/form-data">-->
		<form method="post"   enctype="multipart/form-data">
			  {{ csrf_field() }}
		  <input type="hidden" class="form-control"  id="destinataire"  name="destinataire"  value="ihebsaad@gmail.com ">
		  <input type="hidden" class="form-control"  id="type"  name="type"  value="contact">
		  <input type="hidden" class="form-control"  id="sujet"  name="sujet"  value="Message de Contact - Al Manahel">
 
			 <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Nom</label>
              <input type="text" class="form-control" placeholder="Nom Complet" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Adresse Email" id="emetteur" name="emetteur" required data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Tel</label>
              <input type="tel" class="form-control" placeholder="N° Tel" id="phone" required data-validation-required-message="Please enter your phone number.">
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
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="send">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
  
<script>
    $(document).ready(function(){

        $('#send').click(function(){
            var sujet = $('#sujet').val();
            var contenu = $('#contenu').val();
            var type = $('#type').val();
            var destinataire = $('#destinataire').val();
             if ((contenu != '') )
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('envoyes.sendnotif') }}",
                    method:"POST",
                    data:{sujet:sujet,contenu:contenu,type:type,destinataire:destinataire, _token:_token},
                    success:function(data){
                        alert('ajouté !');

                    }
                });
            }else{
                alert('ERROR');
            }
        });




    });
</script>
  
  
  
  @endsection