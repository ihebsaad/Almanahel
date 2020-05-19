@extends('layouts.front')

@section('content')

 <?php 
$cont =  App\Contenu::where('zone', 'scolaire')->first();$contenu=$cont->contenu ;
$cont2 =  App\Contenu::where('zone', 'scolaire2')->first();$contenu2=$cont2->contenu ;
 
?>
 
 <div class="row" style="width:100%;padding-bottom: 20px">

 <div class="col-lg-6 col-sm-12">
 <h3 style="text-align:center" >Galerie</h3>
 
 
 	</div>
 <h3 style="text-align:center" >Calendrier de l'école</h3>

  <div class="col-lg-6 col-sm-12">

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
          Calendrier De l'école
        </a>
      </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body" style="width:100%;">
           <div  style="min-height:300px">
		     <?php echo $contenu; ?>

		   </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          Réunions 
        </a>
      </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body"   >
		  <div  style="min-height:600px">

          <?php echo $contenu; ?>
		    </div  >

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          Clubs et Manifestations
        </a>
      </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
		 <div  style="min-height:300px">

          <?php echo $contenu2; ?>
		  </div>
        </div>
      </div>
    </div>
  </div>

 

</div>
  
  
  
  
<style>
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