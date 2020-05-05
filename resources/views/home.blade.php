@extends('layouts.front')

@section('content')
<?php $link  =  "http://$_SERVER[HTTP_HOST]/public/site/img/home-bg.jpg"; ?>
  <!-- Page Header -->
  <header class="masthead" style= "background-image:'<?php echo $link ;?>'" >
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Bienvenue</h1>
            <span class="subheading"> hello there</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  
  
  
  
  
  
  
  
  @endsection