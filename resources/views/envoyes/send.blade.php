
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
            <label>Envoyer un email</label>
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
            <form method="post" action="{{ route('envoyes.sending') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
			 
			 <?php use \App\Http\Controllers\UsersController;
 
    $user = auth()->user();

    $iduser=$user->id;
	$user_type=$user->user_type;

     ?>
	 		  <input id="emetteur" type="hidden" value="<?php echo $iduser; ?>" name="emetteur"  />
 <?php  if (      $user_type!='eleve' && $user_type!='prof' && $user_type!='parent')    { ?>
                <div class="form-group">
                    <label for="destination">Destination:</label>
                    <select  class="form-control" name="destination"   id="destination"   onchange="verif()"/>
					<option value=""></option>
					<option value="personne">Une personne</option>
					<option value="parents">Tous les parents</option>
					<option value="eleves">Tous les élèves</option>
					<option value="profs">Tous les enseignants</option>
					</select>
                </div>	
				
                <div class="form-group"   id="dest"  style="display:none">
                    <label for="destinataire">Destinataire:</label>
                    <input id="destinataire" type="text" class="form-control" name="destinataire"/>
                </div>						
               <?php } else{   ?>
				   
		         <div class="form-group"     >
                    <input  class="form-control" name="destination"   id="destination"   value="personne" type="hidden" />
                    <label for="destinataire">Destinataire:</label>

                    <input id="destinataire" type="text" class="form-control" name="destinataire"/>
                </div>			   
				   
				   
				   
			<?php   }  ?>
			 <div class="form-group">
                    <label for="sujet">Sujet:</label>
                    <input id="sujet" type="text" class="form-control" name="sujet"/>
             </div>	
				<div class="form-group ">
                    <label for="contenu">Contenu:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="contenu" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="contenu" required  ></textarea>
                    </div>
				</div>
               <!--<div class="form-group">
                    <label for="contenu">Document:</label>
              
                        <input type="file"  id="document" type="text"    name="document"   ></input >
                 
                </div>-->
				 <div class="form-group form-group-default">
                    <label id="attachem">Documents</label>
                    <div class="row"  >
                        <div class="col-md-10">
                            <select id="attachs"  class="select2 form-control col-lg-12" style="" name="attachs[]"  multiple  value="$('#attachs').val()">
                                <option></option>
                                @foreach($attachements as $attach)
                                      <option value="<?php   echo $attach->id;?>"> <?php  echo $attach->chemin ;?> </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Envoyer</button>
  			 </div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
        </div>
    </div>
	
	<script>
function verif()
{
  var dest = document.getElementById("destination").value;
 if(dest=="personne")
{
document.getElementById('dest').style.display = 'block'; 
}
else
{
document.getElementById('dest').style.display = 'none'; 
}

}
</script>
@endsection
 

@section('footer_scripts')
     

 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
 

$(function () {
	 
 			
$('.select2').select2({
filter: true,
language: {
noResults: function () {
return 'Pas de résultats';
}
}

});
  
});

</script>


<style>
 
</style>

@endsection
