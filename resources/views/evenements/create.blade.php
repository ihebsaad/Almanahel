
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
                    <label for="debut">Début:</label>
                    <input id="debut" type="text" class="form-control" name="debut" ></input>
                </div>	
				<div class="form-group">
                    <label for="fin">Fin:</label>
                    <input id="fin" type="text" class="form-control" name="fin" ></input>
                </div>
				<div class="form-group">
                    <label for="type">Type:</label>
                    <select id="type" type="text" class="form-control" name="type" >
					<option value="simple">Simple</option>
					<option value="vacances">Vacances</option>
					<option value="examens">Examens</option>
					<option value="event">Evenement</option>
					</select>
                </div>
				
          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Ajouter</button>
  			 </div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
        </div>
    </div>
@endsection

 
 

@section('footer_scripts')
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
 
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>


    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>


 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>

function toggle(className, displayState){
            var elements = document.getElementsByClassName(className);

            for (var i = 0; i < elements.length; i++){
                elements[i].style.display = displayState;
            }
  }

$(function () {
	
     $('#debut').datetimepicker({
                    locale: 'fr'
                });
 	
     $('#fin').datetimepicker({
                    locale: 'fr'
                });
 			
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
label{box-sizing:border-box;
color:rgb(133, 135, 150);
cursor:default;
display:inline-block;
font-family:Nunito, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-size:16px;
font-weight:400;}
</style>