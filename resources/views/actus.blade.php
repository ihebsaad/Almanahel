 
<style>
.card-body .btn-primary{color:white!important;}
.carousel-item .active {display:table-row;}

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
</style>

<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  <div class="controls-top">
    <a style="float:left;padding-top:50px" class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a style="float:right;padding-top:50px" class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
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

    <!--First slide-->
    <div class="row  carousel-item active">
	 <section>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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

      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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

      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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
	 </section>

    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="row carousel-item">
	 <section>

      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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

      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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

      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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
      </div>
	 </section>

    </div>
    <!--/.Second slide-->

    <!--Third slide-->
    <div class="row carousel-item">
	 <section>

      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(53).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Lire Plus</a>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(45).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Lire Plus</a>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(51).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Lire Plus</a>
          </div>
        </div>
      </div>
	 </section>

    </div>
    <!--/.Third slide-->

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

