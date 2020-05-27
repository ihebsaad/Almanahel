@extends('layouts.front')

@section('content')

 <?php 
$cont =  App\Contenu::where('zone', 'scolaire')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'scolaire2')->first();$contenu2=$cont2->contenu ;
$cont3 =  App\Contenu::where('zone', 'scolaire3')->first();$contenu3=$cont3->contenu ;
$cont4 =  App\Contenu::where('zone', 'scolaire4')->first();$contenu4=$cont4->contenu ;
$cont5 =  App\Contenu::where('zone', 'scolaire5')->first();$contenu5=$cont5->contenu ;
$cont6 =  App\Contenu::where('zone', 'scolaire6')->first();$contenu6=$cont6->contenu ;
$cont7 =  App\Contenu::where('zone', 'scolaire7')->first();$contenu7=$cont7->contenu ;
$cont8 =  App\Contenu::where('zone', 'scolaire8')->first();$contenu8=$cont8->contenu ;
 
?>
 
 <div class="row" style="width:100%;padding-bottom: 20px">

 <div class="col-lg-12 col-sm-12">
 <h4 style="text-align:center" >Galerie</h4>
  
          <div id="demo" class="carousel slide" data-ride="carousel">


  <!-- Indicators -->
  <ul class="carousel-indicators">
     <?php $imagesslider=App\Image::where('categorie','slider')->where('visible',1)->where('home',0)->get();
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
 
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


 
 
 
 	</div>

  <div class="col-lg-12 col-sm-12">
 <h4 style="text-align:center" >Calendrier de l'école</h4>

	@include('evenements.calendar')  
	</div>
	</div>
  
<div class="row" style="width:100%;padding-bottom: 20px">
  <div class="clearfix"></div>
  
	
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="width:100%;padding-bottom: 20px">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Règlement intérieur
        </a>
      </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body" style="width:100%;">
           <div  style="min-height:200px">
		     <?php echo $contenu; ?>
         <!--  <iframe src="{{ URL::asset('public/reglement.pdf') }}" frameborder="0" style="width:100%;min-height:640px;"></iframe>-->
		   </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          Calendrier des Examens 
        </a>
      </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body"   >
		  <div  style="min-height:600px">

          <?php echo $contenu2; ?>
		    </div  >

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          Réunions Parents-professeurs
        </a>
      </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
		 <div  style="min-height:300px">

          <?php echo $contenu3; ?>
		  </div>
        </div>
      </div>
    </div>
	
	
	    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading4">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapseThree">
          Réunions du conseil d'établissement
        </a>
      </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading4">
        <div class="panel-body">
		 <div  style="min-height:300px">

          <?php echo $contenu4; ?>
		  </div>
        </div>
      </div>
    </div>
	
	
	    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading5">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapseThree">
          Réunions des délégués de classes
        </a>
      </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading5">
        <div class="panel-body">
		 <div  style="min-height:300px">

          <?php echo $contenu5; ?>
		  </div>
        </div>
      </div>
    </div>
	
	
	    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading6">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapseThree">
          Cellule d'écoute
        </a>
      </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading6">
        <div class="panel-body">
		 <div  style="min-height:300px">

          <?php echo $contenu6; ?>
		  </div>
        </div>
      </div>
    </div>
	
	
	    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading7">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapseThree">
          CLubs
        </a>
      </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading7">
        <div class="panel-body">
		 <div  style="min-height:300px">

          <?php echo $contenu7; ?>
		  </div>
        </div>
      </div>
    </div>
	
	
		    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading8">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="true" aria-controls="collapseThree">
          Manifestations diverses
        </a>
      </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading8">
        <div class="panel-body">
		 <div  style="min-height:300px">

          <?php echo $contenu8; ?>
		  </div>
        </div>
      </div>
    </div>
	
	
  </div>

 

</div>
  
  
    <style>
	h4{color:#028dc8;margin-top:15px;margin-bottom:15px;}
	
	.fc-content{font-size:16px;height:40px;}
	
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
    div#demo > div.carousel-inner > div.carousel-item:after {
      content:"";
      position:absolute;
      top:0;
      bottom:0;
      left:0;
      right:0;
      background:rgba(0,0,0,0.3);
    }
	
	.carousel-caption h3 {
   font-family: Roboto;
   font-weight: 400; font-size: 24px;
text-transform: uppercase;   text-shadow: 0px 1px rgba(64, 64, 64, 0.8);
}
  
a [role="button"]{color:black;text-decoration:none;}
 
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .nouveau{ color: #000; margin-top: 10px;}
    .ancien{ color: #000; margin-top: 10px; }

    /* Accordion */


	.panel-default>.panel-heading {
	  color: #333;
	  background-color: #eee;
	  border-color: #e4e5e7;
	  padding: 0;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}

	.panel-default>.panel-heading a {
	    display: block;
	    padding: 10px 15px;
	    font-size: 16px;
	}

	.panel-default>.panel-heading a:after {
	  content: "";
	  position: relative;
	  top: 1px;
	  display: inline-block;
	  font-family: 'Glyphicons Halflings';
	  font-style: normal;
	  font-weight: 400;
	  line-height: 1;
	  -webkit-font-smoothing: antialiased;
	  -moz-osx-font-smoothing: grayscale;
	  float: right;
	  transition: transform .25s linear;
	  -webkit-transition: -webkit-transform .25s linear;
	}

	.panel-default>.panel-heading a[aria-expanded="true"] {
	  background-color: #ccc;
	}

	.panel-default>.panel-heading a[aria-expanded="true"]:after {
	  content: "\2212";
	  -webkit-transform: rotate(180deg);
	  transform: rotate(180deg);
	}

	.panel-default>.panel-heading a[aria-expanded="false"]:after {
	  content: "\002b";
	  -webkit-transform: rotate(90deg);
	  transform: rotate(90deg);
	}

	.accordion-option {
	  width: 100%;
	  float: left;
	  clear: both;
	  margin: 15px 0;
	}

	.accordion-option .title {
	  font-size: 20px;
	  font-weight: bold;
	  float: left;
	  padding: 0;
	  margin: 0;
	}

	.accordion-option .toggle-accordion {
	  float: right;
	  font-size: 16px;
	  color: #6a6c6f;
	}
	.panel-body {
		
	    padding: 10px 15px;
	}
	.sectionform {
		background-color:#ccc;
		color: black;
		font-weight:600;
		padding:5px 20px;
    	margin-top: 20px;
		margin-bottom: 15px}
	.btn-preinscrit {

	}
</style>
  
@endsection