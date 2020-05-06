@extends('layouts.back')

@section('content')
    <link href="{{ asset('public/css/summernote.css') }}" rel="stylesheet" media="screen" />

<h1>Gestion du contenu: Page Contact </h1>
<div class="form-group">
     {{ csrf_field() }}

<div class="modal-body">
 
    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Contenu:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="contact" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ></textarea>
                    </div>
         </div>

    </div>
	
	
	 <div class="row">
	   <button id="save" class="btn btn-md btn-success"  onclick="changing('contact');"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
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
