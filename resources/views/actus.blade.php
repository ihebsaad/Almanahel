 
<style>
.card-body .btn-primary{color:white!important;}
.carousel-item .active {display:table-row;}
.link{text-decoration:none;}

/*
.controls-top	{
		box-sizing:border-box;
color:rgb(255, 255, 255);
cursor:pointer;
display:inline-block;
font-family:"Font Awesome 5 Free";
font-size:20px;
font-style:normal;
font-variant-caps:normal;
font-variant-east-asian:normal;
font-variant-ligatures:normal;
font-variant-numeric:normal;
font-weight:900;
height:47px;
line-height:47px;
text-align:center;
text-rendering:auto;
text-size-adjust:100%;
user-select:none;
width:47px;
-webkit-font-smoothing:antialiased;
	}
 .carousel-indicators{
background-clip:padding-box;
background-color:rgb(66, 133, 244);
border-bottom-color:rgba(0, 0, 0, 0);
border-bottom-left-radius:50%;
border-bottom-right-radius:50%;
border-bottom-style:solid;
border-bottom-width:10px;
border-top-color:rgba(0, 0, 0, 0);
border-top-left-radius:50%;
border-top-right-radius:50%;
border-top-style:solid;
border-top-width:10px;
box-sizing:content-box;
color:rgb(33, 37, 41);
cursor:pointer;
display:list-item;
flex-basis:auto;
flex-grow:0;
flex-shrink:1;
font-family:Roboto, sans-serif;
font-size:16px;
font-weight:300;
height:20px;
line-height:24px;
list-style-image:none;
list-style-position:outside;
list-style-type:none;
margin-bottom:-60px;
margin-left:3px;
margin-right:3px;
max-width:20px;
opacity:0.5;
text-align:center;
text-indent:-999px;
text-size-adjust:100%;
transition-delay:0s;
transition-duration:0.6s;
transition-property:opacity;
transition-timing-function:ease;
width:20px;}
*/
.carousel-item.active {
    display: inline-flex!important;
}
 
</style>

<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  <div class="controls-top">
    <a style="float:left; " class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a style="float:right; " class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
  </div>
  <!--/.Controls-->

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>
    <li data-target="#multi-item-example" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">
<?php  
 
              function custom_echo($x, $length)
              {
                  if(strlen($x)<=$length)
                  {
                      echo $x;
                  }
                  else
                  {
                      $y=substr($x,0,$length) . '..';
                      echo $y;
                  }
              }
			  
$actus= \App\Actualite::where('visible',1)->get();

$actualites=array();
 foreach ($actus as $actualite) {
                array_push($actualites,  $actualite);
            }

		// division de la liste par des listes de 3  
        $chunks = array_chunk($actualites, 3);
  		$i=0;
        // parcours  
        foreach ($chunks as $chunk)
        {$i++;		 		
?>		
    <!--First slide-->
    <div class="row  carousel-item <?php if($i==1){echo 'active';}?>"    style="margin-right: 0px;">
	<!--<table border=0  ><tr>-->

	<?php	
 		 $j=0;
			foreach( $chunk as $actu)
			{	 
				$titre=$actu ['titre'];
				$image=$actu ['image'];
				$extrait=$actu ['extrait'];
				$id=$actu ['id'];
			/*	$j++;	 
				 $titre=$actu[$j]['titre'];
				$image=$actu[$j]['image'];
				$contenu=$actu[$j]['contenu'];
				$id=$actu[$j]['id'];
				$j++;				*/
?>	
    <!-- <td> <div style="width:90%;margin-left:10%;margin-right:10%"  >-->
      <div  class="col-md-4  col-lg-4  col-sm-6  col-xs-12 "  >
        <div class="card mb-2" style="width:300px">
       	 <?php if($image==''){ ?> <img  class="card-img-top" src="{{  URL::asset('public/site/img/no-image.png') }}" style="width:300px!important;height:219px" /> <?php }else{  ?><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/storage/images/<?php echo $image;?>" style="width:300px;height:219px"/><?php } ?>

          <div class="card-body" style="height:330px;min-height:330px;max-height:330px;">
            <h4 class="card-title" style="font-size:18px"><?php custom_echo($titre, 80) ?></h4>
            <p class="card-text" style="white-space: nowrap; width: 270px;height:200px;  overflow: hidden;
  text-overflow: ellipsis;" > <?php custom_echo($extrait, 140)  ; ?> </p><br>
            <a class="link btn btn-primary"  href="{{action('ActualitesController@view', $id )}}" >Lire Plus</a>
          </div>
        </div>
      </div>
<!--</td>-->
		 <?php } //chunk ?>
<!-- </tr></table>-->
    </div>
  <?php } //chunks  


   ?>

<!--First slide- 
    <div class="row  carousel-item  ">
<table border=0  ><tr><td>
      <div style="width:90%;margin-left:10%"  >
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
            alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Lire Plus</a>
          </div>
        </div>
      </div>
</td><td>
      <div style="width:90%;margin-left:10%" >
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
            alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Lire Plus</a>
          </div>
        </div>
      </div>
</td><td>
      <div style="width:90%;margin-left:10%"	  >
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
            alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Lire Plus</a>
          </div>
        </div>
      </div>
</td></tr></table>
    </div>
    <!--/.First slide-->
	
    <!--Second slide -- 
    <div class="row carousel-item">
<table border=0  ><tr><td>
      <div style="width:90%;margin-left:10%"  >
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Lire Plus</a>
          </div>
        </div>
      </div>
</td><td>
      <div style="width:90%;margin-left:10%"  >
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Lire Plus</a>
          </div>
        </div>
      </div>
</td><td>
      <div style="width:90%;margin-left:10%"  >
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Lire Plus</a>
          </div>
        </div>
      </div></td></tt>
</table>
    </div>
    <!--/.Second slide-->

    
  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->

@section('footer-scripts')
 <script>
 /*
$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
      next=$(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});
*/
</script>

@endsection

