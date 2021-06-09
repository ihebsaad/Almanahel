
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" type="image/png" href="{{  URL::asset('public/site/img/favicon.png') }}">

  <title>Al Manahel Academy </title>
  
  <!-- Bootstrap core CSS -->
  <link  href="{{  URL::asset('public/site/vendor/bootstrap/css/bootstrap.min.css') }}"   rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link   href="{{  URL::asset('public/site/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

  <!-- Custom styles for this template -->
  <link  href="{{  URL::asset('public/site/css/clean-blog.min.css') }}"   rel="stylesheet">
  <link  href="{{  URL::asset('public/site/css/slicknav.min.css') }}"   rel="stylesheet">
  <link  href="{{  URL::asset('public/site/css/menu.css') }}"   rel="stylesheet">
  <link  href="{{  URL::asset('public/site/css/custom.css') }}"   rel="stylesheet">

<style>
.select2-container--default .select2-selection--single {    
    height: 38px!important;
    padding-top: 5px!important;
}
 li .active  {
 border-bottom:3px solid darkgrey;line-height:23px;color:#8f8f8f!important ;
}
</style>

</head>
<body>
<?php
$user_type='';
if (Auth::check()) {

$user = auth()->user();
 $iduser=$user->id;
$user_type=$user->user_type;
} 
 

 ?>
 <br>  <br>
 <H2 style="text-align:center;">Espace Choix</h2><br><br>
  <div class="container">
       {{ csrf_field() }}
 <div class="row">
 
<div class="row">
 
 
 
 	  <div>
<input type="hidden" name="role" id="role" value="<?php echo $user_type?>">
        <button onclick="confirmroletest()" class="btn btn-primary" type="button"  style="text-align:center;margin-top:50px;margin-left:200px; font-size: 20PX;letter-spacing: 1px;width:150px">Parent</button>
        <button onclick="confirmroletest1()" class="btn btn-primary" type="button"  style="text-align:center;margin-top:50px;font-size: 20PX;letter-spacing: 1px;">Role Principal</button>
    </div>
</div>
</body>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



<script>
     function confirmroletest() 
     {
var role='';
var isparent=1;

     var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('users.confirmrole') }}",
            method: "POST",
            data: {isparent:isparent,role: role,_token:_token},
            success: function (data) {
                  location.href = "./"+data;
            }
        }); }
         function confirmroletest1() 
     {
var role=document.getElementById('role').value;
var isparent=0;

     var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('users.confirmrole') }}",
            method: "POST",
            data: {isparent:isparent,role: role,_token:_token},
            success: function (data) {
                  location.href = "./"+data;
            }
        }); }

</script>

<style>

html {
  height:100%;
}

body {
  margin:0;
}

.bg {
  animation:slide 3s ease-in-out infinite alternate;
 /* background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);*/
  background-image: linear-gradient(-60deg, #f4a 50%, #09d 50%);
  bottom:0;
  left:-50%;
  opacity:.5;
  position:fixed;
  right:-50%;
  top:0;
  z-index:-1;
}

.bg2 {
  animation-direction:alternate-reverse;
  animation-duration:20s;
}

.bg3 {
  animation-duration:25s;
}

.content {
  background-color:rgba(255,255,255,.8);
  border-radius:.25em;
  box-shadow:0 0 .25em rgba(0,0,0,.25);
  box-sizing:border-box;
  left:50%;
  padding:10vmin;
  position:fixed;
  text-align:center;
  top:50%;
  transform:translate(-50%, -50%);
}

h1 {
  font-family:monospace;
}

@keyframes slide {
  0% {
    transform:translateX(-25%);
  }
  100% {
    transform:translateX(25%);
  }
}



 /*
body {
  width: 100wh;
  height: 90vh;
  color: #fff;
  background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
  background-size: 400% 400%;
  -webkit-animation: Gradient 15s ease infinite;
  -moz-animation: Gradient 15s ease infinite;
  animation: Gradient 15s ease infinite;
}

@-webkit-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@-moz-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

h1,
h6 {
  font-family: 'Open Sans';
  font-weight: 300;
  text-align: center;
  position: absolute;
  top: 45%;
  right: 0;
  left: 0;
}
 */
</style>