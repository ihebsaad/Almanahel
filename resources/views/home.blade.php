@extends('layouts.front')

@section('content')
<?php $link  =  "http://$_SERVER[HTTP_HOST]/public/site/img/home-bg.jpg"; ?>
  <!-- Page Header -->
  <!-- <header class="masthead" style= "background-image:'<?php echo $link ;?>'" >
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
  </header> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>

  <header class="masthead" style= "background-image:'<?php echo $link ;?>'" >
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">

          <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
          <div class="carousel-inner">
    <div class="carousel-item active">
      <!-- <img src="http://test6.enterpriseesolutions.com/almanahel/wp-content/uploads/2016/08/slide01.jpg" alt="Los Angeles" width="1100" height="450"> -->
      <img src="http://test6.enterpriseesolutions.com/almanahel/wp-content/uploads/2016/08/slide01.jpg"  alt="" title="slide01"  width="1920" height="1065" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
      <div class="carousel-caption">
          <!-- <h3>Almanahel</h3>
          <p>LA is always so much fun!</p> -->
        </div>
    </div>
    <div class="carousel-item">
           <!--  <img src="http://test6.enterpriseesolutions.com/almanahel/wp-content/uploads/2016/08/slide02.jpg" alt="Chicago" width="1100" height="450"> -->
      <img src="http://test6.enterpriseesolutions.com/almanahel/wp-content/uploads/2016/08/slide02.jpg"  alt="" title="slide02"  width="1574" height="800" data-bgposition="right center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
      <div class="carousel-caption">
          <!-- <h3>Almanahel</h3>
          <p>LA is always so much fun!</p> -->
        </div>
    </div>
    <div class="carousel-item">
      <img src="http://test6.enterpriseesolutions.com/almanahel/wp-content/uploads/2016/08/slide01.jpg" alt="New York" width="1100" height="450">
      <div class="carousel-caption">
          <!-- <h3>Almanahel</h3>
          <p>LA is always so much fun!</p> -->
        </div>
    </div>
  </div>
  
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

        </div>
      </div>
    </div>
  </header>
  
    
 @include('actus')

  @endsection

 