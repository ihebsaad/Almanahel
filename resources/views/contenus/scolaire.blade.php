@extends('layouts.back')

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

@section('content')

<h1>Gestion du contenu: Page Vie Scolaire </h1>
<div class="form-group">
     {{ csrf_field() }}
<?php 
$cont =  App\Contenu::where('zone', 'scolaire')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'scolaire2')->first();$contenu2=$cont2->contenu ;
 
?>
<div class="modal-body">
 
    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu 1:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick="changing('scolaire');;location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
	 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu 2:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu2; ?></textarea>
                    </div>
         </div>

    </div>
	
	<div class="row">
	   <button id="save" class="btn btn-md btn-success"  onclick=" changing('scolaire2');location.reload();"  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
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
