@extends('layouts.back')

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

@section('content')
 
<h1>Gestion du contenu: Page Présenation </h1>
<div class="form-group">
     {{ csrf_field() }}
<?php 
$cont =  App\Contenu::where('zone', 'alumni')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'alumni2')->first();$contenu2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'alumni3')->first();$contenu3=$cont3->contenu ;
$cont4 =  App\Contenu::where('zone', 'alumni4')->first();$contenu4=$cont4->contenu ;

?>
<div class="modal-body">
 
    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Mot de la Direction:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="alumni" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick=";changing('alumni');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   <br><br>
	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu"></label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="alumni2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu2; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick="  changing('alumni2');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   <br><br>
  <div class="row">
	
       <div class="form-group ">
                    <label for="contenu"></label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="alumni3" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu3; ?></textarea>
                    </div>
         </div>

    </div>
	
 <div class="row">
	   <button  class="btn btn-md btn-success"  onclick=" ;changing('alumni3');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>

<!--
 <br><br>
  <div class="row">
	
       <div class="form-group ">
                    <label for="contenu"></label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="alumni4" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu4; ?></textarea>
                    </div>
         </div>

    </div>
	
 <div class="row">
	   <button  class="btn btn-md btn-success"  onclick=" ;changing('alumni4');location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>

-->
	
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
