@extends('layouts.front')

@section('content')

 
 
<?php
$cont =  App\Contenu::where('zone', 'formation')->first();$contenu=$cont->contenu ;
//$cont2 =  App\Contenu::where('zone', 'formation2')->first();$contenu2=$cont2->contenu ;

 ?>
 
<div class="row">  
<section>
<?php // echo $contenu; 
/*
@include('evenements.annee')
*/
?>

</section>
</div>

 <div class="row">  
<section>
<?php //echo $contenu2; ?>
</section>
</div>
  
  
@endsection