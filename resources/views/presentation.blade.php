@extends('layouts.front')

@section('content')

  <!-- Page Header -->
  
  <?php $link  =  "http://$_SERVER[HTTP_HOST]/public/site/img/about-bg.jpg"; ?>

 
<?php 
$cont =  App\Contenu::where('zone', 'presentation')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'presentation2')->first();$contenu2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'presentation3')->first();$contenu3=$cont3->contenu ;

?>


<div class="row">
<!-- Left -->
<div class="col-xs-12 col-sm-12   col-md-7 col-lg-7  ">

<section>
<?php echo $contenu; ?>
</section>

</div>
<!-- right -->
<div class="col-xs-12 col-sm-12   col-md-5 col-lg-5  ">
<div class="row">
<!-- contenu 2 -->
 <div class="col-xs-12 col-sm-12   col-md-12 col-lg-12  ">
<section>
<?php echo $contenu2; ?>
</section>

</div>
<!-- contenu 3 -->
 <div class="col-xs-12 col-sm-12   col-md-12 col-lg-12  ">
<section>
<?php echo $contenu3; ?>
</section>

</div>
</div>
 



</div>
</div>



  
  
  
  
  
  
  @endsection