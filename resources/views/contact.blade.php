@extends('layouts.front')

@section('content')
 
  <?php $link  =  "http://$_SERVER[HTTP_HOST]/public/site/img/contact-bg.jpg"; ?>

  <!-- Page Header -->
  <header class="masthead" style=" background-image:url('<?php  echo $link; ?>')"  >
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contactez Nous</h1>
            <!--<span class="subheading">Have questions? I have answers.</span>-->
          </div>
        </div>
      </div>
    </div>
  </header>

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
 <a href="https://www.google.com/maps/place/Lyc%C3%A9e+Priv%C3%A9+Al+Manahel+Monastir/@35.7642893,10.7952923,15z/data=!4m5!3m4!1s0x0:0xadfd0b46e4ab1658!8m2!3d35.7627223!4d10.8033175">
 <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/public/site/img/manahel.png"></a>
 </center>
 
 </div>

</div>


    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Questions? n'hésitez pas à nous contacter</p>
          <form name="sentMessage" id="contactForm" novalidate>
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
              <input type="email" class="form-control" placeholder="Adresse Email" id="email" required data-validation-required-message="Please enter your email address.">
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
              <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message=" "></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
  
  
  
  
  @endsection