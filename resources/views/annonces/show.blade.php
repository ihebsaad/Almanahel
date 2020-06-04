
@extends('layouts.front')

  
@section('content')
  

    <div class="row">

      <!-- Post Content Column was 8 -->
      <div class="col-lg-12">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $annonce['titre'] ; ?></h1>

  
		<?php $date=  date('d/m/Y H:i', strtotime($annonce['created_at'] )); ?>
         <!-- Date/Time -->
        <p>Publié le  <b><?php echo $date; ?></b></p>

        <hr>				
        <!-- Preview Image -->
		<?php if($annonce['image'] !=''){?> <img class="img-fluid rounded" src="//<?php echo $_SERVER['HTTP_HOST'];?>/storage/images/<?php echo $annonce['image'];?>" style="max-heigt:300px"/><?php } ?>

        <hr>

        <!-- Post Content -->
        <?php echo   ($annonce['contenu']);?>
        <hr>
 
      </div>
 

    </div>
    <!-- /.row -->



  
@endsection


 
 
