@extends('layouts.back')

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

@section('content')
 
<h1>Gestion du contenu: Page Inscription </h1>
<div class="form-group">
     {{ csrf_field() }}
<?php 
$cont =  App\Contenu::where('zone', 'inscription')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'inscription2')->first();$contenu2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'inscription3')->first();$contenu3=$cont3->contenu ;

?>
<div class="modal-body">
 
    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Critères et calendrier d'admission:</label>
                    <div class="editor" >
                        <textarea style="min-height: 280px;"  id="inscription" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu; ?></textarea>
                    </div>
         </div>

    </div>
	 <div class="row" style="margin-bottom:30px">
	   <button  class="btn btn-md btn-success"  onclick="changing('inscription');  ; "  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
    </div><br><br>
	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Procédure de préinscription:</label>
                    <div class="editor" >
                        <textarea style="min-height: 280px;"  id="inscription2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu2; ?></textarea>
                    </div>
         </div>

    </div><br><br>
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick=" changing('inscription2'); ; "  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
    </div>
		 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Procédure d'inscription:</label>
                    <div class="editor" >
                        <textarea style="min-height: 280px;"  id="inscription3" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu3; ?></textarea>
                    </div>
         </div>

    </div>
	
	
	 <div class="row">
	   <button class="btn btn-md btn-success"  onclick=" changing('inscription3'); "  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
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
