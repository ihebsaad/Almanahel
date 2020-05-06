@extends('layouts.back')

@section('content')
    <link href="{{ asset('public/css/summernote.css') }}" rel="stylesheet" media="screen" />

<h1>Gestion du contenu: Page Présenation </h1>
<div class="form-group">
     {{ csrf_field() }}

<div class="modal-body">
 
    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="presentation" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ></textarea>
                    </div>
         </div>

    </div>
	
	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu 2:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="presentation2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ></textarea>
                    </div>
         </div>

    </div>
	
	    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu 3:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="presentation3" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ></textarea>
                    </div>
         </div>

    </div>
	
 <div class="row">
	   <button id="save" class="btn btn-md btn-success"  onclick="changing('presentation');changing('presentation2');changing('presentation3');"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
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
                $('#'+champ).animate({
                    opacity: '0.3',
                });
                $('#'+champ).animate({
                    opacity: '1',
                });

            }
        });
       
    }

</script>