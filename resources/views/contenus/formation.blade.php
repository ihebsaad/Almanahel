@extends('layouts.back')

@section('content')
    <link href="{{ asset('public/css/summernote.css') }}" rel="stylesheet" media="screen" />

<h1>Gestion du contenu: Page Formation </h1>
<div class="form-group">
     {{ csrf_field() }}
<?php 
$contenu =  App\Contenu::where('zone', 'formation')->pluck('contenu');

?>
<div class="modal-body">
 
    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="formation" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu; ?></textarea>
                    </div>
         </div>

    </div>
	
	
	 <div class="row">
	   <button id="save" class="btn btn-md btn-success"    onclick="changing('formation');" ><b><i class="fas fa-save"></i> Enregistrer</b></button>
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
