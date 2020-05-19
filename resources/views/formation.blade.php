@extends('layouts.front')

@section('content')

 
 
<?php
$cont =  App\Contenu::where('zone', 'formation')->first();$contenu=$cont->contenu ;
//$cont2 =  App\Contenu::where('zone', 'formation2')->first();$contenu2=$cont2->contenu ;

 ?>
 
<div class="row">  
<section>

<center><h4>Dernières Annonces<h4></center>
<?php // echo $contenu; 
 
@include('annonces')
 
?>

</section>
</div>

 <div class="row">  
<section>
<?php  echo $contenu ; ?>
</section>
</div>
  
  
@endsection