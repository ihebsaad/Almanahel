@extends('layouts.front')

@section('content')

 

 <?php 
$cont =  App\Contenu::where('zone', 'fomration')->first();$contenu=$cont->contenu ;
  
?>
<div class="row">  
<section>
<?php echo $contenu; ?>
</section>
</div>

 
  
  
@endsection