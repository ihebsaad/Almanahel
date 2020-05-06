<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Al Manahel Academy </title>
    <?php    setlocale(LC_ALL, "fr_FR.UTF-8");    ?>
  <!-- Bootstrap core CSS -->
  <link  href="{{  URL::asset('public/site/vendor/bootstrap/css/bootstrap.min.css') }}"   rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link   href="{{  URL::asset('public/site/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="{{  URL::asset('public/site/vendor/fontawesome-free/css/font-awesome.min.css') }}">

  <!-- Custom styles for this template -->
  <link  href="{{  URL::asset('public/site/css/clean-blog.min.css') }}"   rel="stylesheet">
  <link  href="{{  URL::asset('public/site/css/slicknav.min.css') }}"   rel="stylesheet">
  <link  href="{{  URL::asset('public/site/css/menu.css') }}"   rel="stylesheet">

  <style type="text/css">
  @media screen and (max-width: 40em) {
    

   #menumob {
        display:block!important;
    }
}
</style>

</head>

<body>

 <header class="header-area">
<div class="header-top bg-2">
<div class="container">
<div class="row">
<div class="col-md-6 col-sm-8 col-xs-12">
<div class="header-top-left">
<p>LYCÉE Al-MANAHEL MONASTIR</p>
</div>
</div>
<div class="col-md-6 col-sm-4 col-xs-12">
<div class="header-top-right text-right">
<ul>
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa fa-youtube"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="header-middle bg-2">
<div class="container">
<div class="row">
<div class="col-md-3 hidden-sm hidden-xs">
<div class="logo">
<h1><a href="{{ route('home') }}">AlManahel</a></h1>
</div>
</div>
<div class="col-md-9 col-xs-12">
<div class="header-middle-right">
<ul>
<li>
<!--<div class="contact-icon">
<i class="fa fa-clock-o"></i>
</div>-->
<div class="contact-info">
<a href="#">Espace Eleve</a>
<!--<span>Sunday colsed</span>-->
</div>
</li>
<li>
<!--<div class="contact-icon">
<i class="fa fa-envelope"></i>
</div>-->
<div class="contact-info">
<a href="#">Espace Enseignant</a>
</div>
</li>
<li>
<!--<div class="contact-icon">
<i class="fa fa-phone"></i>
</div>-->
<div class="contact-info">
<a href="#">Espace Administration</a>
<!--<span> (+1) 1144-1254</span>-->
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="header-bottom" id="sticky-header">
<div class="container">
<div class="row">
<div class="hidden-md hidden-lg col-sm-8 col-xs-6">
<div class="logo">
<h1><a href="{{ route('home') }}">AlManahel</a></h1>
</div>
</div>
<div class="col-md-11 hidden-sm hidden-xs">
<div class="mainmenu">
<ul id="navigation">
<li class="active"><a href="{{ route('home') }}">Accueil</a>
</li>
<li><a href="{{ route('presentation') }}">Presentation</a>
</li>
<li><a href="{{ route('scolaire') }}">Vie Scolaire</a>
</li>
<li><a href="{{ route('formation') }}">Formation & Emploi</a>
</li>
<li><a href="{{ route('contact') }}">Contact</a>
</li>
</ul>
</div>
</div>

<div class="row" >
  <div id="menumob" style="display: none"></div>
</div>

</div>
</div>
</div>
</header> 