@extends('layouts.front')

@section('content')

 

<section>
<?php
$cont =  App\Contenu::where('zone', 'formation')->first();$contenu=$cont->contenu ;

echo $contenu ;
?>

</section>
<div class="row">  
<section>
<?php echo $contenu; ?>
</section>
</div>

 
  
  
@endsection