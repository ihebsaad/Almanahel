@extends('layouts.back')

@section('content')
    <link href="{{ asset('public/css/summernote.css') }}" rel="stylesheet" media="screen" />

<h1>Gestion du contenu: Page d'Accueil </h1>
<div class="form-group">
     {{ csrf_field() }}

<div class="modal-body">
    <form id="updateform">

    <div class="row">
       <div class="form-group ">
                    <label for="contenu">Contenu:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;width:100%" id="home" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ></textarea>
                    </div>
                </div>

    </div>
	
	
	
	
	
     </form>
 </div>	 

  </div>

@endsection

 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 

<script>

    function changing(elm) {
        var champ=elm.id;

        var val =document.getElementById(champ).value;
        //  var type = $('#type').val();
        var citie = $('#id').val();
         //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('actualites.updating') }}",
            method: "POST",
            data: {citie: citie , champ:champ ,val:val, _token: _token},
            success: function (data) {
                $('#'+champ).animate({
                    opacity: '0.3',
                });
                $('#'+champ).animate({
                    opacity: '1',
                });

            }
        });
        // } else {

        // }
    }

    function disabling(elm) {
        var champ=elm;

        var val =1;
         var citie = $('#id').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('actualites.updating') }}",
            method: "POST",
            data: {actualite: actualite , champ:champ ,val:val, _token: _token},
            success: function (data) {
                if (elm=='annule'){
                $('#nonactif').animate({
                    opacity: '0.3',
                });
                $('#nonactif').animate({
                    opacity: '1',
                });
                }


            }
        });
        // } else {

        // }
    }

</script>
