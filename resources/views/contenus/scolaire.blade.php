@extends('layouts.back')

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

@section('content')

<h1>Gestion du contenu: Page Vie Scolaire </h1>
<div class="form-group">
     {{ csrf_field() }}
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
<div class="modal-body">
 
    <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Règlement intérieur:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu; ?></textarea>
                    </div>
         </div>

    </div>
	
	 <div class="row" style="margin-bottom:30px">
	   <button   class="btn btn-md btn-success"  onclick="changing('scolaire');;location.reload();"   ><b><i class="fas fa-save"></i> Enregistrer</b></button>
   </div>
   
   
	 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Calendrier des examens:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire2" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu2; ?></textarea>
                    </div>
         </div>

    </div>
	
	<div class="row">
	   <button   class="btn btn-md btn-success"  onclick=" changing('scolaire2');location.reload();"  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
    </div>

	 
	 
		 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Réunions Parents-Professeurs:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire3" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu3; ?></textarea>
                    </div>
         </div>

    </div>
	
	<div class="row">
	   <button   class="btn btn-md btn-success"  onclick=" changing('scolaire3');location.reload();"  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
    </div>



	 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Réunions Conseils détablissement:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire4" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu4; ?></textarea>
                    </div>
         </div>

    </div>
	
	<div class="row">
	   <button   class="btn btn-md btn-success"  onclick=" changing('scolaire4');location.reload();"  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
    </div>



	 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Réunions des délégués de classes:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire5" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu5; ?></textarea>
                    </div>
         </div>

    </div>
	
	<div class="row">
	   <button   class="btn btn-md btn-success"  onclick=" changing('scolaire5');location.reload();"  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
    </div>



	 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Cellule découte:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire6" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu6; ?></textarea>
                    </div>
         </div>

    </div>
	
	<div class="row">
	   <button   class="btn btn-md btn-success"  onclick=" changing('scolaire6');location.reload();"  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
    </div>



	 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Clubs </label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire7" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu7; ?></textarea>
                    </div>
         </div>

    </div>
	
	<div class="row">
	   <button   class="btn btn-md btn-success"  onclick=" changing('scolaire7');location.reload();"  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
    </div>



	 <div class="row">
	
       <div class="form-group ">
                    <label for="contenu">Manifestaions diverses:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="scolaire8" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="home" required  ><?php echo $contenu8; ?></textarea>
                    </div>
         </div>

    </div>
	
	<div class="row">
	   <button   class="btn btn-md btn-success"  onclick=" changing('scolaire8');location.reload();"  ><b><i class="fas fa-save"></i> Enregistrer</b></button>
    </div>	
	 
	 
	 
 </div>	 

  </div>




 <br>
 <div class="row">
 <div class="col-lg-12 col-md-12 mx-auto">
 <h3 style="color:black">Images de carrousel (slider) </h3> <br>
 <h4 style="color:black">Charger une nouvelle image depuis votre ordinateur </h4>
 </div>
 </div>

 <div class=" row w-100 shadow-sm p-4 mb-4 bg-white" style="color: white"> 
 <div class="col-lg-12 col-md-12 mx-auto">
  
  <form  id="formFileExterne" method="post"  enctype="multipart/form-data" >

    {{csrf_field()}}
  <div class="form-row">
    <div class="col-7">
      <br><br>
      <div class="form-group">
         <label for="imgInp" style="font-size:20px;font-weight:bold;color:black"> Ajout d'une image à partir de disque local:&nbsp;&nbsp;&nbsp; </label> 
      <input  type='file' id="imgInp" name="imgInp"  />
       </div>
    </div>
	      <input  type='hidden' id="home" name="home" value="0" />

   <div class="col">
     <div class="form-group">
       <img id="blah" height="" width="180" height="180" src="{{  URL::asset('public/img/no-image.png') }}" alt="your image" />
     </div>
   </div>
 </div>
 <br>
  <div class="form-group" >
  <label for="titrefileExterne" class="control-label " style="font-size:20px;font-weight:bold; color: black">Titre </label> <br>

<input style="width:72% " type="text" name="titrefileExterne" class="from-control" id="titrefileExterne" />
  </div>
 <br>

 <div class="form-group">
    <label for="descripfileExterne" class=" control-label" style="font-size:20px;font-weight:bold ; color: black">Description </label>
 <textarea class="form-control" style="width:72%; height:70px;"  name="descripfileExterne" id="descripfileExterne" ></textarea>
 </div>

 <div class="form-group">
 <button type="submit" class="btn btn-md btn-success m-4 float-right"><span id="spinnerkbs"></span> Charger Image</button >
</div>
</form>
</div>
 </div>





   <div class="row">
    <div class="col-md-12  col-sm-12 col-xs-12 col-lg-12">
  

  <h4 style="color:black">Veuillez sélectioner des Images pour les insérer dans le carrousel  </h4>
   
  <br>
  <div id="tabImageSlider" style="overflow-x:auto;">         
  <table class="table table-bordered" style="background-color:white">
    <thead>
      <tr>
        <th>titre image</th>
        <th>description image</th>
        <th>Vue</th>
        <th>Visible</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      <?php $imagesslider=App\Image::where('categorie','slider')->where('home',0)->orderBy('created_at','DESC')->get(); ?>

      @foreach($imagesslider as $ims)
      <tr>
        <td id="t{{$ims->id}}">{{$ims->titre}}</td>
        <td id="d{{$ims->id}}">{{$ims->descrip}}</td>
        <td><img id=""  width="100" height="100" src="{{URL::to('/').'/storage/'.$ims->url}}" alt="your image" /></td>
        <td><input id="c{{$ims->id}}" type="checkbox" class="checkboxkbs" <?php if($ims->visible==1){echo 'checked' ;} ?> ></td>
        <td><i id="e{{$ims->id}}" class="fa fa-edit editkbs" style=" cursor:pointer;color:blue"></i> <i id="s{{$ims->id}}" class="fa fa-trash trashkbs" style=" cursor:pointer;color:red"></i></td>
      </tr>
      @endforeach
    
    </tbody>
  </table>
  <br>
  <button id="majslider" class="btn  btn-success float-right"> Mettre à jour le carrousel </button>
  <br>
 </div>
 </div>
</div>


<div id="modifierkbs" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Mettre à jour Titre et description de l'image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
       
            <div class="form-group ">
            <label class="control-label col-sm-2" for="nom">titre :</label>
           
            <div class="col-sm-10">
             
            <input type="text" class="form-control" id="titreModal" name="titreModal" value="">
            <input type="hidden" class="form-control" id="idModal" name="idModal" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="prénom">Description:</label>
            <div class="col-sm-10">
             
              <textarea  class="form-control" id="descModal" name="descModal" value=""
              ></textarea>
             
            </div>
          </div>
         
          <button type="Button"  id="modifierbuttonmodal" class="btn btn-success " style="margin-left: 200px ; margin-top: 20px;">Modifier</button>
       
      </div>
          <div class="modal-footer">
            
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Fermer
            </button>
          </div>
    </div>
  </div>

</div>


<div id="successOrfailedUpload" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Chargement de fichier vers le serveur</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
       <div style="align:center" id="successUloadExterneFile">
       </div>
      </div>
          <div class="modal-footer">
            
            <button id="okapreschargement" class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>OK
            </button>
          </div>
    </div>
  </div>

</div>







@endsection

<script>

   function changing(elm) {
        
        var val =document.getElementById(elm).value;
      
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('home.updatecontent') }}",
            method: "POST",
            data: {zone: elm   ,val:val, _token: _token},
            success: function (data) {
                $('#'+elm).animate({
                    opacity: '0.3',
                });
                $('#'+elm).animate({
                    opacity: '1',
                });

            }
        });
       
    }

 
</script>
 
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$( document ).ready(function() {

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

/*$("#imgInp").change(function() {
  readURL(this);
});*/

$(document).on('change', '#imgInp', function() {
   readURL(this);
});

var imageslider =[];

 $('input[type=checkbox]:checked').each(function(){
        var clsse=$(this).attr('class');
        var idcheck2=(this.id);
        idcheck2=idcheck2.substring(1) ;
        if(clsse=='checkboxkbs')
        {
            //alert(this.id);
            imageslider.push(idcheck2);
        }

        });

$(document).on('click', '.checkboxkbs', function() {
var idcheck=(this.id);
idcheck=idcheck.substring(1) ;
//alert('ok');
if($(this).prop("checked") == true){

 if(imageslider.includes(idcheck))
   {
    const index = imageslider.indexOf(idcheck);
     if (index > -1) {
      imageslider.splice(index, 1);
     }

   }
   else
   {
     imageslider.push(idcheck);
   }

}
else if($(this). prop("checked") == false){
  if(imageslider.includes(idcheck))
    {
     const index = imageslider.indexOf(idcheck);
     if (index > -1) {
      imageslider.splice(index, 1);
     }

   }
   else
   {
     //imageslider.push(idcheck);
   }
}

console.log(imageslider);
});

/*$(document).on('click', '.editkbs', function() {
alert(this.id);

});

$(document).on('click', '.trashkbs', function() {
alert(this.id);

});
*/

        //console.log(imageslider);
//});

console.log(imageslider);

$(document).on('click', '#majslider', function() {

 if(imageslider.length > 0)
    {
        var _token = $('input[name="_token"]').val();
       // alert("token : "+_token);
        var requestData = JSON.stringify(imageslider);
        //alert(requestData);
       var chaine="";
      // alert(imageslider[0]);
        for(var i= 0; i < imageslider.length; i++)
          {
           //chaine=+imageslider[i];
           chaine=chaine.concat(imageslider[i]);
           chaine=chaine.concat(' ');
           /*if(i!=imageslider.length-1)
           {
             chaine=+" ";
           }*/
           
          }

          //alert(chaine);

         $.ajax({
            url: "{{url('/')}}/mettreAjourSliderScolaire",
            type: 'get',            
            data: {data : chaine, _token:_token},
            success: function (data) {
               // $('#target').html(data.msg);
               alert(data);
            },
            error: function (data) {
            console.log('Error:', data);

             }            
        });


     /* $.ajax({
            url: "{{url('/')}}/mettreAjourSlider",
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            data: {data : requestData, _token:_token},
            success: function (data) {
               // $('#target').html(data.msg);
               alert(data);
            },
            error: function (data) {
            console.log('Error:', data);

             }            
        });*/

 
    }
    else
    {
       alert('Veuillez sélectionner des images pour le carrousel. Actualisez la page courante Si ce message s\'affiche plusieurs fois' );
    }
});

// upload image 



   $(document).on('click','#actualiserAtt',function(e){
    
     location.reload();

   });
 $(document).on("submit","#formFileExterne",function(e) {
 // $("#formFileExterne").submit(function(e) {
    e.preventDefault();
    var en=true;
     //alert('ok');
    if(!$('#imgInp').val())
     {
      alert('Vous devez sélectionner un fichier à envoyer');
      en=false;
     }

    if(en==true)
   {
    //var donnees = $('#formFileExterne').serialize();

    var dataString = new FormData(jQuery(document).find('#formFileExterne')[0]);
    
    $.ajax({
                    type:"post",
                    url:"{{ route('Upload.ExterneFile')}}",
                    data:dataString,                  
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() 
                    {
                      
                       //alert($(this).find('span'));
                      //$(this).html('<span></span>Loading ...');
                      //$(this).find('span').addClass('fa fa-spinner fa-spin');
                      $("#spinnerkbs").addClass('fa fa-spinner fa-spin');

      
   

                      /* $('#successOrfailedUpload').modal('show');
                        $("#successUloadExterneFile").html('<div align="left"><img src="{{ URL::asset('public/img/progress.gif')}}" width="100%" height="8%" align="absmiddle" title="Upload...."/></div>');
                         setTimeout(function() {
                            
                                                  },2000); 
                       $('#successOrfailedUpload').modal('hide');*/
                     
                       
                    },
                    success:function(response) 
                    {
                        //alert(response);
                         $("spinnerkbs").removeClass('fa fa-spinner fa-spin');
                         var str1 = String(response);
                         var n1 = str1.includes("Le fichier est envoyé");

                         if(n1)
                         {
                           /*$("#successUloadExterneFile").html('<span style="color:green">Le fichier est envoyé au serveur avec succès</span>');*/
                           alert("Le fichier est envoyé au serveur avec succès");
                           location.reload();
                         }
                         else
                         {
                           /*$("#successUloadExterneFile").html('<span style="color:green">Le titre ou le fichier est déja existant');*/
                           alert("Le titre ou le fichier est déjà existant");
                         }

                      
                       //$('#successOrfailedUpload').modal('show');
                      
                    },
                      error: function(jqXHR, textStatus, errorThrown) {
                         $("spinnerkbs").removeClass('fa fa-spinner fa-spin');
                         alert("Erreur lors de l\'envoi du fichier au serveur");
                       
                    /*$("#successUloadExterneFile").html('<span style="color:red">Erreur lors de l\'envoi du fichier au serveur</span>');
                     $('#successOrfailedUpload').modal('show');*/
                    


            }
                });
}
 });



// fin upload image

// edit image

  $(document).on('click','.editkbs', function() {
      var idwd=$(this).attr("id");
      idwd=idwd.substring(1) ;
     
      var t = $('#t'.concat(idwd)).text();
      var d = $('#d'.concat(idwd)).text();
      

      //alert(d);
      $('#titreModal').val(t);
      $('#descModal').val(d);
       $('#idModal').val(idwd);
     
      
   $('#modifierkbs').modal('show');


  
});

  $(document).on('click','#modifierbuttonmodal', function() {
    //alert("eee");
    var idwds=$(this).attr("id");
   idwds=idwds.substring(1) ;
   //alert($('input[name=idModal]').val());
    var _tok = $('input[name="_token"]').val();

    var v1=$('input[name=idModal]').val();
    var v2=$('input[name=titreModal]').val();
    var v3=$('textarea#descModal').val();

    //alert (v1+" "+v2+" "+v3);

    $.ajax({
      url: "{{url('/')}}/modifierimageslider",
      type: 'get',      
      data: {
         iden:v1,
         titre :v2,
         descrip: v3,
         _token:_tok
         
      },
      success: function (data) {
               // $('#target').html(data.msg);
               alert(data);
               location.reload();
            },
      error: function (data) {
        alert('Erreur:', data);

          }    
     

           
    });

});
 
// fin edit image


// delete image
$(document).on('click','.trashkbs', function() {

  var r = confirm("Voulez vous vraiment supprimer cette image ?");
if (r == true) {
  

   var idwd=$(this).attr("id");
   idwd=idwd.substring(1) ;
  
           $.ajax({

               url:"{{url('/')}}/supimageslider/"+idwd,
               type : 'get',
               
               success: function(data){
               // alert("la suppression a été effectuée avec succès");
                alert(data);
                location.reload();

               /* $('#tab').empty();
                $('#tab').html(data);*/
            }

             
           });
    }
  


  });

$(document).on('click','#okapreschargement', function() {

    
           $.ajax({

               url:"{{url('/')}}/ChargerTableImagesSliderScolaire/",
               type : 'get',
               contentType: "application/json;charset=utf-8",
               success: function(data){
               // alert(data);
               /* $('#tabImageSlider').empty();
                $('#tabImageSlider').html(data);*/
                location.reload();

            }

             
           });
    
  


  });



});// fin ready



</script>