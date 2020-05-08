@extends('layouts.front')

@section('content')

 <?php 
$cont =  App\Contenu::where('zone', 'scolaire')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'scolaire2')->first();$contenu2=$cont2->contenu ;
 
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
  
  
@endsection