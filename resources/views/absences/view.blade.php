
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
            Modifier
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
            <form method="post" action="{{ route('absences.edit') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
			  	<div class="form-group">
                    <label for="classe">Classe:</label>
                    <textarea id="classe" type="text" class="form-control" name="classe" ><?php echo $absence['classe']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="eleve">Elève:</label>
                    <input id="eleve" type="text" class="form-control" name="eleve"   />
                </div>		
                <div class="form-group">
                    <label for="seance">Séance:</label>
                    <input id="seance" type="text" class="form-control" name="seance"   value="<?php echo $absence['seance']}}; ?>"/>
                </div>						
                <div class="form-group">
                    <label for="details">Détails:</label>
                    <textarea id="details" type="text" class="form-control" name="details"   ><?php echo $absence['details']}}; ?></textarea>
                </div>		
                <div class="form-group">
                    <label for="debut">Début:</label>
                    <input id="debut" type="text" class="form-control" name="debut"  value="<?php echo $absence['debut']}}; ?>"/>
                </div>	
			   <div class="form-group">
                    <label for="fin">Fin:</label>
                    <input id="fin" type="text" class="form-control" name="fin"  value="<?php echo $absence['debut']}}; ?>"/>
                </div>	
				
			 

          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Enregistrer</button>
  			 </div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
        </div>
    </div>
@endsection

 
