@extends('layouts.front')

@section('content')

 <?php 
$cont =  App\Contenu::where('zone', 'inscription')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'inscription2')->first();$contenu2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'inscription3')->first();$contenu3=$cont3->contenu ;
 
?>
<div class="row">  
<section>
<?php echo $contenu; ?>
</section>
</div>

<div class="row">  
 <section>
<?php echo $contenu2; ?>
</section> 
</div>
  
<div class="row">  
 <section>
<?php echo $contenu3; ?>
</section> 
</div>
 
@endsection