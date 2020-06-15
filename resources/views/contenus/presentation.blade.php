@extends('layouts.back')
 <head>
 <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />
  </head>
<?php

 header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache'); 


$link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<script>/*
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window. 
    }
}*/
</script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

@section('content')
 
<h1>Gestion du contenu: Page Présenation </h1>
<div class="form-group">
     {{ csrf_field() }}
<?php 
$cont =  App\Contenu::where('zone', 'mot')->first();$mot=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'mot2')->first();$mot2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'resultats')->first();$resultats=$cont3->contenu ;
$cont4 =  App\Contenu::where('zone', 'resultats2')->first();$resultats2=$cont4->contenu ;
$cont5 =  App\Contenu::where('zone', 'sections')->first();$sections=$cont5->contenu ;
$cont6 =  App\Contenu::where('zone', 'sections2')->first();$sections2=$cont6->contenu ;
$cont7 =  App\Contenu::where('zone', 'alumni')->first();$alumni=$cont7->contenu ;
$cont8 =  App\Contenu::where('zone', 'alumni2')->first();$alumni2=$cont8->contenu ;
 
?>
<div class="modal-body">
 
    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Mot de la Direction:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="mot" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $mot; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick=";changing('mot');"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   
 <div class="row">

     <div class="form-group ">
            <label for="contenu">Mot de la Direction:</label>
           <div class="editor" >
                        <textarea style="min-height: 380px;"  id="mot2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $mot2; ?></textarea>
         </div>
     </div>
     </div>
 
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick=";changing('mot2'); "   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
    
   <br><br>
   	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Nos résultats:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="resultats" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $resultats; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick="  changing('resultats'); "   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
    <br><br>
      	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Nos résultats: </label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="resultats2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $resultats2; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick="  changing('resultats2'); "   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   
   <br><br>
	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Sections d'études:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="sections" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $sections; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick="  changing('sections'); "   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   <br><br>
   	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Sections d'études: </label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="sections2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $sections2; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick="  changing('sections2'); "   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   <br><br>
   <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Alumni:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="alumni" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $alumni; ?></textarea>
                    </div>
         </div>

    </div>
	
 <div class="row">
	   <button  class="btn btn-md btn-success"  onclick=" ;changing('alumni'); "   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>

 <br><br>
  <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Alumni:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="alumni2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $alumni2; ?></textarea>
                    </div>
         </div>

    </div>
	
 <div class="row">
	   <button  class="btn btn-md btn-success"  onclick=" ;changing('alumni2'); "   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>


	
  </div>	 

  </div>

@endsection
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

   function changing(elm) {
        
        var val =document.getElementById(elm).value;
      
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('home.updatecontent') }}",
            method: "POST",
            data: {zone: elm   ,val:val, _token: _token},
            success: function (data) {
                $('#'+elm).animate({
                    opacity: '0.3',
                });
                $('#'+elm).animate({
                    opacity: '1',
                });
					swal({
                        type: 'success',
                        title: 'Modifié ...',
                        text: 'Contenu modifié avec succès'
 					//	icon: "success",
                    });
            }
			
			
        });
       
    }

</script>
