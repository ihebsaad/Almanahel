@extends('layouts.back')


  
    <link href="{{ asset('public/js/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/js/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
\
@section('content')
<div class=" " style="padding:8px 8px 8px 8px">
        <div class="portlet box grey">
            <h3>  Document</h3>
        </div>
    <form class="form-horizontal" method="POST"  action="{{action('DocumentsController@update3', $id)}} "  enctype="multipart/form-data" >
        {{ csrf_field() }}


        <?php use \App\Http\Controllers\ClassesController;     ?>


        <input type="hidden" id="iddocument" value="{{$id}}" ></input>
        <table class="table">

        <tbody>

        <tr>
            <td class="text-primary">Titre : </td>
            <td>
                <input id="titre" onchange="changing(this)" type="text" class="form-control" name="titre"  value="{{ $document->titre }}" />
                </td>
        </tr>
        <tr>
            <tr>
             <td class="text-primary">Fichier : </td>
            <td>
               <input id="chemin" type="file" class="form-control" name="chemin"    >
                <?php if($document->chemin !==''){?>


          <a class="form-control" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/manahellocal/storage/documents/<?php echo $document['chemin'];?>" > 
           <span class="fa fa-fw fa-trash-alt"></span> <?php echo $document['chemin'];?>
</a>
          <?php } ?>
            </td>
        </tr>
         <tr>
            <td class="text-primary">Date : </td>
            <td>
                <input id="created_at" onchange="changing(this)" readonly="" class="form-control" name="created_at"  value="{{ $document->created_at }}" />
            </td>
        </tr>
        <tr>
             <td class="text-primary">Description : </td>
            <td>
                <input id="description" onchange="changing(this)" type="text"  class="form-control" name="description"  value="{{ $document->description }}" />
            </td>
        </tr>
         <tr>

             <td class="text-primary">type : </td>
            <td>
              <select class="form-control"  name="type" id="type"  onchange="changing(this)"  value="{{ $document->type }}"  >
    <option value="">--Please choose an option--</option>
     <option  <?php if ($document['type'] =='eleve'){echo 'selected="selected"';}?>  value="eleve">Élève</option>
    <option   <?php if ($document['type'] =='parent'){echo 'selected="selected"';}?> value="parent">Parent</option>
   <option   <?php if ($document['type'] =='prof'){echo 'selected="selected"';}?> value="prof">Enseignant</option>
    <option   <?php if ($document['type'] =='classe'){echo 'selected="selected"';}?> value="classe">Classe</option>
    <option   <?php if ($document['type'] =='moimeme'){echo 'selected="selected"';}?> value="moimeme">Moi-même</option>
  </select>
            </td>
        </tr>
<?php if($document->type =='eleve'){  

    $eleve = DB::table('users')
    ->where('id',$document['destinataire'])
    ->first();?>
  <tr>


             <td class="text-primary">Destinataire : </td>
            <td>
                  <select  id="destinataire2" name="destinataire2" class="form-control" onchange="changing(this)"  value="{{$eleve->id}}" >
                                                                <option value="0">Sélectionner..... </option>


                                                                @foreach($eleves as $eleve  )
                                                                 <?php if ($document['destinataire'] ==$eleve->id){?>
                                                                <option   <?php echo 'selected="selected"';?>  value="{{$eleve->id}}">{{$eleve->name.' '.$eleve->lastname}}</option>
                                                                   <?php }else {?>
                                                                    <option
                                                                            value="{{$eleve->id}}">{{$eleve->name.' '.$eleve->lastname}}</option>
                                                                                 <?php }?>
                                                                @endforeach

                                                            </select>
            </td>
        </tr>
         <?php } ?>
         <?php if($document->type =='parent'){  

    $eleve = DB::table('users')
    ->where('id',$document['destinataire'])
    ->first();?>
  <tr>


             <td class="text-primary">Destinataire : </td>
            <td>
                  <select  id="destinataire1" name="destinataire1" class="form-control" onchange="changing(this)"    value="{{$eleve->id}}"  >
                                                                <option value="0">Sélectionner..... </option>


                                                                @foreach($parents as $parent  )
                                                                 <?php if ($document['destinataire'] ==$parent->id){?>
                                                                <option   <?php echo 'selected="selected"';?>  value="{{$parent->id}}">{{$parent->name.' '.$parent->lastname}}</option>
                                                                   <?php }else {?>
                                                                    <option
                                                                            value="{{$parent->id}}">{{$parent->name.' '.$parent->lastname}}</option>
                                                                                 <?php }?>
                                                                @endforeach

                                                            </select>
            </td>
        </tr>
         <?php } ?>
          <?php if($document->type =='prof'){  

    $eleve = DB::table('users')
    ->where('id',$document['destinataire'])
    ->first();?>
  <tr>


             <td class="text-primary">Destinataire: </td>
            <td>
                  <select  id="destinataire3" name="destinataire3" class="form-control" onchange="changing(this)"    value="{{$eleve->id}}"  >
                                                                <option value="0">Sélectionner..... </option>


                                                                @foreach($enseignants as $enseignant  )
                                                                 <?php if ($document['destinataire'] ==$enseignant->id){?>
                                                                <option   <?php echo 'selected="selected"';?>  value="{{$enseignant->id}}">{{$enseignant->name.' '.$enseignant->lastname}}</option>
                                                                   <?php }else {?>
                                                                    <option
                                                                            value="{{$enseignant->id}}">{{$enseignant->name.' '.$enseignant->lastname}}</option>
                                                                                 <?php }?>
                                                                @endforeach

                                                            </select>
            </td>
        </tr>
         <?php } ?>
           <?php if($document->type =='classe'){  

    $eleve = DB::table('classes')
    ->where('id',$document['destinataire'])
    ->first();?>
  <tr>


             <td class="text-primary">Destinataire: </td>
            <td>
                  <select  id="destinataire4" name="destinataire4" class="form-control" onchange="changing(this)"    value="{{$eleve->id}}"  >
                                                                <option value="0">Sélectionner..... </option>


                                                                @foreach($classes as $classe  )
                                                                 <?php if ($document['destinataire'] ==$classe->id){?>
                                                                <option   <?php echo 'selected="selected"';?>  value="{{$classe->id}}">{{$classe->titre}}</option>
                                                                   <?php }else {?>
                                                                    <option
                                                                            value="{{$classe->id}}">{{$classe->titre}}</option>
                                                                                 <?php }?>
                                                                @endforeach

                                                            </select>
            </td>
        </tr>
         <?php } ?>



       

        </tbody>
        </table>
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