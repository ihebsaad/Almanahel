@extends('layouts.back')

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
	   <button   class="btn btn-md btn-success"  onclick=";changing('mot');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   
   
          <div class="form-group ">
                    <label for="contenu">Mot de la Direction:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="mot2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $mot2; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick=";changing('mot2');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   
   <hr>
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
	   <button   class="btn btn-md btn-success"  onclick="  changing('resultats');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
    <br><br>
      	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu"> </label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="resultats2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $resultats2; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick="  changing('resultats2');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
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
	   <button   class="btn btn-md btn-success"  onclick="  changing('sections');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   <br><br>
   	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu"> </label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="sections2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $sections2; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick="  changing('sections2');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   <br><br>
   <hr>
  <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Alumni:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="alumni" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $alumni; ?></textarea>
                    </div>
         </div>

    </div>
	
 <div class="row">
	   <button  class="btn btn-md btn-success"  onclick=" ;changing('alumni');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>

 <br><br>
  <div class="row">
	
       <div class="form-group ">
                    <label for="contenu"></label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="alumni2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $alumni2; ?></textarea>
                    </div>
         </div>

    </div>
	
 <div class="row">
	   <button  class="btn btn-md btn-success"  onclick=" ;changing('alumni2');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>


	
  </div>	 

  </div>

@endsection

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

            }
        });
       
    }

</script>
