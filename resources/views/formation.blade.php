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
  
  
@endsection