@extends('layouts.back')

@section('content')
    <link href="{{ asset('public/css/summernote.css') }}" rel="stylesheet" media="screen" />

<h1>Gestion du contenu: Page Inscription </h1>
<div class="form-group">
     {{ csrf_field() }}
<?php 
$cont =  App\Contenu::where('zone', 'inscription')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'inscription2')->first();$contenu2=$cont->contenu ;
$cont3 =  App\Contenu::where('zone', 'inscription3')->first();$contenu3=$cont->contenu ;

?>
<div class="modal-body">
 
    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu 1:</label>
                    <div class="editor" >
                        <textarea style="min-height: 280px;"  id="inscription" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu; ?></textarea>
                    </div>
         </div>

    </div>
	
	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu 2:</label>
                    <div class="editor" >
                        <textarea style="min-height: 280px;"  id="inscription2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu2; ?></textarea>
                    </div>
         </div>

    </div>
	
		 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu 3:</label>
                    <div class="editor" >
                        <textarea style="min-height: 280px;"  id="inscription3" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu3; ?></textarea>
                    </div>
         </div>

    </div>
	
	
	 <div class="row">
	   <button id="save" class="btn btn-md btn-success"  onclick="changing('inscription');changing('inscription2');changing('inscription3')"  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
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
