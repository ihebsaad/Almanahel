@extends('layouts.front')

@section('content')

  <!-- Page Header -->
  
 
 
<?php 
$cont =  App\Contenu::where('zone', 'presentation')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'presentation2')->first();$contenu2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'presentation3')->first();$contenu3=$cont3->contenu ;
$cont4 =  App\Contenu::where('zone', 'presentation4')->first();$contenu4=$cont4->contenu ;

?>


<div class="row">
<!-- Left -->
<div class="col-xs-12 col-sm-12     ">

<section>
<h2 class="heading-title" >Mot de la direction pédagogique du lycée Al-Manahel-Monastir</h2>
  <span class="heading-title-border"></span>
<?php echo $contenu; ?>
</section>

</div>
<!-- right -->
<div class="col-xs-12 col-sm-12     ">
<div class="row">
<!-- contenu 2 -->
 <div class="col-xs-12 col-sm-12   col-md-12 col-lg-12  ">
<h2 class="heading-title" >Nos résultats</h2>
  <span class="heading-title-border"></span>
<section>
<?php echo $contenu2; ?>
</section>

</div>
<!-- contenu 3 -->
 <div class="col-xs-12 col-sm-12   col-md-12 col-lg-12  ">
<h2 class="heading-title" >Alumni</h2>
  <span class="heading-title-border"></span>
<section>
<?php echo $contenu3; ?>
</section>

</div>
</div>
 



</div>
</div>



  
  
  
  
  
  
  @endsection