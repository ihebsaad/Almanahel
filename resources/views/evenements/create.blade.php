
@extends('layouts.back')


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Ajouter
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('evenements.store') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
        
                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input id="titre" type="text" class="form-control" name="titre"/>
                </div>		
			    <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" type="text" class="form-control" name="description" ></textarea>
                </div>					
	 		    <div class="form-group">
                    <label for="description">Date de Début:</label>
                    <input autocomplete="off" id="debut" type="text" class="form-control" name="debut" ></input>
                </div>	
				<div class="form-group">
                    <label for="fin">Date de Fin:</label>
                    <input autocomplete="off" id="fin" type="text" class="form-control" name="fin" ></input>
                </div>
				<div class="form-group">
                    <label for="type">Type:</label>
                    <select id="type" type="text" class="form-control" name="type" >
					<option value="simple">Simple</option>
					<option value="vacances">Vacances</option>
					<option value="examens">Examens</option>
					<!--<option value="event">Evenement</option>-->
					</select>
                </div>
				<!--
		 		 <div class="form-group">
                    <label for="debut">Heure de Début:</label>
                    <input id="debut" type="text" class="form-control" name="debut" ></input>
                </div>	
				<div class="form-group">
                    <label for="fin">Heure de Fin:</label>
                    <input id="fin" type="text" class="form-control" name="fin" ></input>
                </div>	
-->				
          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Ajouter</button>
  			 </div>

             </form>
        </div>
    </div>
@endsection

 
 @section('footer_scripts')

  
<script>
 
$(function () {
     $('#debut').datepicker({
                    locale: 'fr'
                });
    $('#fin').datepicker({
                    locale: 'fr'
                });
});

</script>
@endsection
				
