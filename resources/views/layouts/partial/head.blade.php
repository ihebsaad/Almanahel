<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" type="image/png" href="{{  URL::asset('public/site/img/favicon.png') }}">

  <title>Al Manahel Academy </title>
    <?php    setlocale(LC_ALL, "fr_FR.UTF-8");    ?>
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


</head>

<body class="bgpattern">

 <header class="header-area">
<div class="header-top bg-2">
<div class="container">
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-6">
<div class="header-top-left">
<p>LYCÉE Al-MANAHEL MONASTIR</p>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6">
<div class="header-top-right text-right">
<ul>
<li><a href="https://www.facebook.com/almanahel.monastir/" target="blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-youtube"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="header-middle bg-1">
<div class="container">
<div class="row">
<div class="col-md-3 d-none d-md-block">
<div class="logo">
<a href="{{ route('home') }}"><img src="{{  URL::asset('public/site/img/logo.png') }}" alt="AlManahel Academy" width="250"></a>
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
<a href="{{ route('login') }}">Espace Élèves</a>
<!--<span>Sunday colsed</span>-->
</div>
</li>
<li>
<!--<div class="contact-icon">
<i class="fa fa-envelope"></i>
</div>-->
<div class="contact-info">
<a href="{{ route('login') }}">Espace Enseignants</a>
</div>
</li>
<li>
<!--<div class="contact-icon">
<i class="fa fa-phone"></i>
</div>-->
<div class="contact-info">
<a href="{{ route('login') }}">Espace Parents</a>
<!--<span> (+1) 1144-1254</span>-->
</div>
</li>
<li>
<!--<div class="contact-icon">
<i class="fa fa-phone"></i>
</div>-->
<div class="contact-info">
<a href="{{ route('login') }}">Espace Administration</a>
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
<div class="row d-flex justify-content-between">
<div class="d-md-none d-lg-none d-xl-none col-sm-8 col-xs-6">
<div class="logo">
<a href="{{ route('home') }}"><img src="{{  URL::asset('public/site/img/logo.png') }}" alt="AlManahel Academy" width="150"></a>
</div>
</div>
<div class="col-md-11 d-none d-md-block">
<div class="mainmenu">
<ul id="navigation"><li>
  <a href="{{ route('home') }}">Accueil</a>
</li>
<li>
  <a href="{{ route('presentation') }}">Présentation</a>
</li>
<li>
  <a href="{{ route('inscription') }}">Inscription</a>
</li>
<li>
  <a href="{{ route('scolaire') }}">Vie Scolaire</a>
</li>
<li>
  <a href="{{ route('formation') }}">Formation & Emploi</a>
</li>
<li>
  <a href="{{ route('contact') }}">Contact</a>
</li>
</ul>
</div>
</div>

<div id="menumob" class="ml-auto" style="display: none"></div>

</div>
</div>
</div>
</header> 