@extends('layouts.front')

@section('content')

  <!-- Page Header -->
  
 
 
<?php 
$cont =  App\Contenu::where('zone', 'resultats')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'resultats2')->first();$contenu2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'resultats3')->first();$contenu3=$cont3->contenu ;
//$cont4 =  App\Contenu::where('zone', 'resultat4')->first();$contenu4=$cont4->contenu ;

?>

<div class="jumbotron card card-image" style="background-image: url({{  URL::asset('public/site/img/gradient.jpg') }}); padding:0px!important;text-align:left!important;border:none!important;border-radius:0px!important;margin-top: -30px;">
  <div class="text-white text-center py-5 px-4" style="padding-top: 20px!important; padding-bottom: 40px!important;">
    <div>
      <h2 class="card-title h1-responsive pt-3 mb-5 font-bold" style="margin-bottom: 0px!important;"><strong>Nos Résultats</strong></h2>
    </div>
  </div>
</div>
<div class="row">
<!-- Left -->
<div class="col-xs-12 col-sm-12     ">

<section>
<!--<h2 class="heading-title" >Alumni</h2>
  <span class="heading-title-border"></span>-->
<?php echo $contenu; ?>
</section>

</div>
<!-- right -->
<div class="col-xs-12 col-sm-12     ">
<div class="row">
<!-- contenu 2 -->
 <div class="col-xs-12 col-sm-12   col-md-12 col-lg-12  ">
<!--<h2 class="heading-title" >Nos résultats</h2>
  <span class="heading-title-border"></span>-->
<section>
<?php echo $contenu2; ?>
</section>

</div>
<!-- contenu 3 -->
 <div class="col-xs-12 col-sm-12   col-md-12 col-lg-12  ">
<!--<h2 class="heading-title" >Alumni</h2>
  <span class="heading-title-border"></span>-->
<section>
<?php echo $contenu3; ?>
</section>

</div>
</div>
 



</div>
</div>



  
  
  
  
  
  
  @endsection