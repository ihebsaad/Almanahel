
@extends('layouts.back')

 
@section('content')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>


    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <label>Ajouter</label>
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
 
    $CurrentUser = auth()->user();

    $iduser=$CurrentUser->id;

    ?>
	 		  <input id="emetteur" type="hidden" value="<?php echo $iduser; ?>" name="emetteur"  />

                <div class="form-group">
                    <label for="destinataire">Destinataire:</label>
                    <input id="destinataire" type="text" class="form-control" name="destinataire"/>
                </div>						
               
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
          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Envoyer</button>
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
	
     $('#datetimepicker1').datetimepicker({
                    locale: 'fr'
                });
 	
     $('#datetimepicker2').datetimepicker({
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

.card-title{
	background-color:rgb(248, 249, 252);
border-bottom-color:rgb(227, 230, 240);
border-bottom-left-radius:0px;
border-bottom-right-radius:0px;
border-bottom-style:solid;
border-bottom-width:1px;
border-top-left-radius:4.6px;
border-top-right-radius:4.6px;
box-sizing:border-box;
color:rgb(133, 135, 150);
display:block;
font-family:Nunito, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-size:16px;
font-weight:400;
height:49px;
line-height:24px;
margin-bottom:0px;
overflow-wrap:break-word;
padding-bottom:12px;
padding-left:20px;
padding-right:20px;
padding-top:12px;
text-align:left;
text-size-adjust:100%;
}
.btn{
	align-items:flex-start;
background-color:rgb(38, 83, 212);
background-image:none;
border-bottom-color:rgb(36, 78, 201);
border-bottom-left-radius:5.6px;
border-bottom-right-radius:5.6px;
border-bottom-style:solid;
border-bottom-width:1px;
border-image-outset:0px;
border-image-repeat:stretch;
border-image-slice:100%;
border-image-source:none;
border-image-width:1;
border-left-color:rgb(36, 78, 201);
border-left-style:solid;
border-left-width:1px;
border-right-color:rgb(36, 78, 201);
border-right-style:solid;
border-right-width:1px;
border-top-color:rgb(36, 78, 201);
border-top-left-radius:5.6px;
border-top-right-radius:5.6px;
border-top-style:solid;
border-top-width:1px;
box-sizing:border-box;
color:rgb(255, 255, 255);
cursor:pointer;
display:inline-block;
font-family:Nunito, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-size:16px;
font-stretch:100%;
font-style:normal;
font-variant-caps:normal;
font-variant-east-asian:normal;
font-variant-ligatures:normal;
font-variant-numeric:normal;
font-weight:400;
height:38px;
letter-spacing:normal;
line-height:24px;
margin-bottom:0px;
margin-left:0px;
margin-right:0px;
margin-top:0px;
overflow-wrap:break-word;
overflow-x:visible;
overflow-y:visible;
padding-bottom:6px;
padding-left:12px;
padding-right:12px;
padding-top:6px;
text-align:center;
text-decoration-color:rgb(255, 255, 255);
text-decoration-line:none;
text-decoration-style:solid;
text-indent:0px;
text-rendering:auto;
text-shadow:none;
text-size-adjust:100%;
text-transform:none;
transition-delay:0s, 0s, 0s, 0s;
transition-duration:0.15s, 0.15s, 0.15s, 0.15s;
transition-property:color, background-color, border-color, box-shadow;
transition-timing-function:ease-in-out, ease-in-out, ease-in-out, ease-in-out;
user-select:none;
vertical-align:middle;
white-space:nowrap;
width:78.7344px;
word-spacing:0px;
writing-mode:horizontal-tb;
-webkit-appearance:none;
-webkit-box-direction:normal;
-webkit-tap-highlight-color:rgba(0, 0, 0, 0);
-webkit-border-image;
	
}
</style>

@endsection