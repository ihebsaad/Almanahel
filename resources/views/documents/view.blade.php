@extends('layouts.back')


  
    <link href="{{ asset('public/js/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/js/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
@section('content')
<div class=" " style="padding:8px 8px 8px 8px">
        <div class="portlet box grey">
            <h3>  Document</h3>
        </div>
    <form class="form-horizontal" method="POST"  action="{{action('DocumentsController@update3', $id)}} "  enctype="multipart/form-data" >
        {{ csrf_field() }}


        <?php use \App\Http\Controllers\ClassesController;     ?>


        <input type="hidden" id="iddocument" value="{{$id}}" ></input>
        

     <div class="form-group ">
            <label class="text-primary">Titre : </label>
           
                <input id="titre" onchange="changing(this)" type="text" class="form-control" name="titre"  value="{{ $document->titre }}" />
             
        </div>
        <tr>
            <div class="form-group ">
             <label class="text-primary">Fichier : </label>
         
               <input id="chemin" type="file" class="form-control" name="chemin"    >
                <?php if($document->chemin !==''){?>


          <a target="_blank" class="form-control" href="//<?php echo $_SERVER['HTTP_HOST'];?>/storage/documents/<?php echo $document['chemin'];?>" > 
           <span class="fa fa-fw fa-download-alt"></span> <?php echo $document['chemin'];?>
      </a>
          <?php } ?>
           
        </div>
         <div class="form-group ">
            <label class="text-primary">Date : </label>
             <?php $date=  date('d/m/Y H:i', strtotime($document['created_at'] )); ?>
                <input id="created_at" onchange="changing(this)" readonly="" class="form-control" name="created_at"  value="<?php echo $date;?>" />
          
        </div>
        <div class="form-group ">
             <label class="text-primary">Description : </label>
        
                <input id="description" onchange="changing(this)" type="text"  class="form-control" name="description"  value="{{ $document->description }}" />
          
        </div>
   



       

       
<div class="form-group "  style="margin-left:30px">
       <button  type="submit"  class="btn btn-primary">Enregistrer</button>
   

         
     
         </div>
   
       
    </form>



</div>
  <style>
        #tabstats {font-size: 15px;padding:30px 30px 30px 30px;}
        #tabstats td{border-left:1px solid white;border-bottom:1px solid white;min-width:50px;min-height: 25px;;text-align: center;}
        #tabstats tr{margin-bottom:15px;text-align: center;height: 40px;}
        </style>



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
$(function () {
$('.itemName').select2({
filter: true,
language: {
noResults: function () {
return 'Pas de résultats';
}
}
});
});
    function changing(elm) {
        var champ = elm.id;
        var val = document.getElementById(champ).value;
   
        var doc = $('#iddocument').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('documents.updating') }}",
            method: "POST",
            data: {doc: doc, champ: champ, val: val, _token: _token},
            success: function (data) {
                $('#' + champ).animate({
                    opacity: '0.3',
                });
                $('#' + champ).animate({
                    opacity: '1',
                });
            }
        });
        // } else {
        // }
    }
        
   
</script>
 @endsection
