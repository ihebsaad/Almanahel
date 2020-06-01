@extends('layouts.front')

@section('content')
 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

 

  <header class="masthead"    >
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto" style="padding:0px">

          <div id="demo" class="carousel slide" data-ride="carousel">


  <!-- Indicators -->
  <ul class="carousel-indicators">
     <?php $imagesslider=App\Image::where('categorie','slider')->where('visible',1)->where('home',1)->orderBy('created_at','ASC')->get();
     $nb= $imagesslider->count();$u=0;
      ?>

    @for($i=0; $i<$nb ;$i++)
    <li data-target="#demo" data-slide-to="{{$i}}" class="{{ ($i==0) ? 'checked' : '' }}"></li>
    <!--  <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li> -->
     @endfor
  </ul>
          <div class="carousel-inner">
                  @foreach($imagesslider as $ims)

    <div class="carousel-item <?php if($u==0){echo'active' ; $u++ ; }?>">
      <!-- <img src="http://test6.enterpriseesolutions.com/almanahel/wp-content/uploads/2016/08/slide01.jpg" alt="Los Angeles" width="1100" height="450"> -->
      <img src="{{URL::to('/').'/storage/'.$ims->url }}"  alt="" title="slide01"  width="1920" height="1065" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
      <div class="carousel-caption">
           <h3>{{$ims->titre}}</h3>
          <p>{{$ims->descrip}}</p> 
        </div>
    </div>

    @endforeach

    </div>
    <!-- <div class="carousel-item">
          
      <img src="http://test6.enterpriseesolutions.com/almanahel/wp-content/uploads/2016/08/slide02.jpg"  alt="" title="slide02"  width="1574" height="800" data-bgposition="right center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
      <div class="carousel-caption">
         
        </div>
    </div>
    <div class="carousel-item">
      <img src="http://test6.enterpriseesolutions.com/almanahel/wp-content/uploads/2016/08/slide01.jpg" alt="New York" width="1100" height="450">
      <div class="carousel-caption">
          <!-- <h3>Almanahel</h3>
          <p>LA is always so much fun!</p> 
        </div>
    </div> -->
  
  
  
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
   
<!----------------------- Section Home  -------->
<section>
  <h2 class="heading-title" >Al Manahel Academy: Le passeport pour la réussite</h2>
  <span class="heading-title-border"></span>
<?php
$cont =  App\Contenu::where('zone', 'home')->first();$contenu=$cont->contenu ;

echo $contenu ;
?>

</section>
<section>
  <h2 class="heading-title" >ACTUALITÉS</h2>
  <span class="heading-title-border"></span>
 @include('actus')
</section>

  @endsection

 