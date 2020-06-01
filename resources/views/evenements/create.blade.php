
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
                    <select id="type" type="text" class="form-control" name="type" onchange="verif();" required>
					<option value=""></option>
					<option value="simple">Simple</option>
					<option value="vacances">Vacances</option>
					<option value="examens">Examens</option>
					<!--<option value="event">Evenement</option>-->
					</select>
                </div>
				<div style="display:none" id="time"> 
		 		 <div class="form-group">
                    <label for="heure_debut">Heure de Début:</label>
                    <input id="heure_debut" type="text" class="form-control" name="heure_debut" ></input>
                </div>	
				<div class="form-group">
                    <label for="heure_fin">Heure de Fin:</label>
                    <input id="heure_fin" type="text" class="form-control" name="heure_fin" ></input>
                </div>	
                
				</div>	
 			
          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Ajouter</button>
  			 </div>

             </form>
        </div>
    </div>
	
	<script>
	function verif()
	{
		var type =document.getElementById('type');
		if(type=='simple')
		{ 
		document.getElementById('time').style.display = 'block'; 

		}
		else{
		document.getElementById('time').style.display = 'none'; 
	
		}
	}
	</script>
@endsection

 
 @section('footer_scripts')

  
<script>
 
$(function () {
     $('#debut').datepicker({
                    locale: 'fr',
					dateFormat:'dd/mm/yy'

                });
    $('#fin').datepicker({
                    locale: 'fr',
				    dateFormat:'dd/mm/yy'

                });
});

</script>
@endsection
				
