
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
            Modifier l'article
        </div>
        <div class="card-body">
          
            <form method="post" action="{{ route('evenements.edit') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
			   <input id="evenement" type="hidden" class="form-control" name="id"  value="<?php  echo $evenement['id'];?>"/>

			  <div class="row">
               
				 
				
                </div>
                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input id="titre" type="text" class="form-control" name="titre"  value="<?php  echo $evenement['titre'];?>"/>
                </div>	
			    <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" type="text" class="form-control" name="description" ><?php  echo $evenement['description'];?></textarea>
                </div>		
				<div class="form-group ">
                    <label for="debut">Début:</label>
                   <input id="debut" autocomplete="off" type="text" class="form-control" name="debut"  value="<?php  echo $evenement['debut'];?>"/>
				</div>
			 
				<div class="form-group ">
                    <label for="fin">Fin:</label>
                   <input id="fin" type="text" autocomplete="off" class="form-control" name="fin"  value="<?php  echo $evenement['fin'];?>"/>
				</div>
				
					<div class="form-group ">
                    <label for="type">Type:</label>
                    <select id="type"   class="form-control" name="type" >
					<option  <?php if($evenement['type']=='simple'){echo 'selected="selected"'; }?> value="simple">Simple</option>
					<option <?php if($evenement['type']=='vacances'){echo 'selected="selected"'; }?> value="vacances">Vacances</option>
					<option <?php if($evenement['type']=='examens'){echo 'selected="selected"'; }?> value="examens">Examens</option>
					<option <?php if($evenement['type']=='event'){echo 'selected="selected"'; }?> value="event">Evenement</option>
					</select>				</div>
				
          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Enregistrer</button>
  			 </div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
        </div>
    </div>
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
				
