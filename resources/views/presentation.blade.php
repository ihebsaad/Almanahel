@extends('layouts.front')

@section('content')

  <!-- Page Header -->
  
 
 
<?php /*
$cont =  App\Contenu::where('zone', 'presentation')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'presentation2')->first();$contenu2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'presentation3')->first();$contenu3=$cont3->contenu ;
$cont4 =  App\Contenu::where('zone', 'presentation4')->first();$contenu4=$cont4->contenu ;
$cont5 =  App\Contenu::where('zone', 'presentation5')->first();$contenu5=$cont5->contenu ;
*/
?>
<style>
h3{font-size:25px!important;}

</style>
<div class="jumbotron card card-image" style="background-image: url({{  URL::asset('public/site/img/gradient.jpg') }}); padding:0px!important;text-align:left!important;border:none!important;border-radius:0px!important;margin-top: -30px;">
  <div class="text-white text-center py-5 px-4" style="padding-top: 20px!important; padding-bottom: 40px!important;">
    <div>
      <h2 class="card-title h1-responsive pt-3 mb-5 font-bold" style="margin-bottom: 0px!important;"><strong>Présentation</strong></h2>
    </div>
  </div>
</div>
<br><br>
<div class="row">
 <div class="col-xs-12 col-sm-12     ">

<section>
<a href="{{URL::to('/mot')}}" ><h3 class="heading-title" >Mot de la direction pédagogique du lycée Al-Manahel-Monastir</h3></a>
  <span class="heading-title-border"></span>
<?php // echo $contenu; ?>
</section>

</div>
<div class="row">
 <div class="col-xs-12 col-sm-12     ">

<section style="margin-left:15px" >
<a href="{{URL::to('/sections')}}" ><h3 class="heading-title" >Sections d'études</h3></a>
  <span class="heading-title-border"></span>
<?php // echo $contenu5; ?>
</section>

</div>
 <div class="col-xs-12 col-sm-12     ">
<div class="row">
<!-- contenu 2 -->
 <div class="col-xs-12 col-sm-12   col-md-12 col-lg-12  ">
<section  style="margin-left:15px" >

<a href="{{URL::to('/resultats')}}" ><h3 class="heading-title" >Nos résultats</h3></a>
  <span class="heading-title-border"></span>
<?php //echo $contenu2; ?>
</section>

</div>
<!-- contenu 3 -->
 <div class="col-xs-12 col-sm-12   col-md-12 col-lg-12  ">
<section  style="margin-left:15px" >
<a href="{{URL::to('/alumni')}}" ><h3 class="heading-title" >Alumni</h3></a>
  <span class="heading-title-border"></span>
 
<?php// echo $contenu3; ?>
</section>

</div>
</div>
 

<br>
<br><br>
<br>
<br>
</div>
</div>



  
  
  
  
  
  
  @endsection