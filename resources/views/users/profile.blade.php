@extends('layouts.back')

    <link href="{{ asset('public/js/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/js/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
<?php


  use App\Classe;
   use App\User ;
   
   if (Auth::check()) {

$cuser = auth()->user();
 $iduser=$cuser->id;
$user_type=$cuser->user_type;
} 
  ?>

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
     <div class="card uper">

        <div class="card-header">
            Profil
        </div>
        <div class="card-body">
   <form method="post" action="{{ route('users.edit') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}


        <?php use \App\Http\Controllers\UsersController;     ?>


        <input type="hidden" id="iduser" value="{{$id}}" name="id" />
        
        
             
               
               
               
                <div class="form-group">
                <label for="name">Prénom:</label>
                <input id="name"   type="text" class="form-control" name="name"  value="{{ $user->name }}" />
               </div>
           
                <div class="form-group">
                    <label for="eleve">Nom:</label>
                <input id="lastname"  type="text" class="form-control" name="lastname"  value="{{ $user->lastname }}" />
             
                 </div>
                <div class="form-group">
                    <label for="email">Adresse Email:</label>
               <input id="email" autocomplete="off"  type="text" class="form-control" name="email" id="email" value="{{ $user->email }}"/>                 
               </div>
     <?php if( $user_type=='admin' ){?>
     <div class="form-group">
                    <label for="email">Mot de passe :</label>
                <input autocomplete="off"    type="password" class="form-control" name="password"  id="password"   />  
               </div>
        <?php } ?>
                <div class="form-group">
                    <label for="eleve">Date de naissance:</label>
              <input id="naissance" autocomplete="off"  type="text" class="form-control datepicker"  name="naissance"  id="naissance" value="{{ $user->naissance }}" />
                 </div>

                <div class="form-group">
                    <label for="eleve">N° Tel:</label>

            <input id="tel"    type="text" class="form-control" name="tel"  id="tel" value="{{ $user->tel }}" />
             </div>
             
          
         
 

        
<?php if($user->user_type=='eleve') {?>
 
                <div class="form-group">
                    <label for="eleve">Niveau:</label>
             <input id="niveau" autocomplete="off"    type="text" class="form-control" name="niveau" id="niveau" value="{{ $user->niveau }}" />                  
       
                 </div>

        
             

                <div class="form-group">
                    <label for="paiements">Paiements:</label>
                <select id="paiements"       class="form-control" name="paiements"    >
                <option value=""></option>
                <option <?php if(  $user->paiements =='termine'  ){echo 'selected="selected"';} ?> value="termine">Terminé</option>
                <option <?php if(  $user->paiements =='encours'  ){echo 'selected="selected"';} ?>value="encours">En cours</option>
                </select>
                 </div>
                <div class="form-group">
                    <label for="eleve">Total des paiements:</label>
          <input id="totalpaiement" autocomplete="off"    type="number" class="form-control" name="totalpaiement" id="totalpaiement" value="{{ $user->totalpaiement }}" />                  
                </div>
                <div class="form-group">
                    <label for="absences">Total des absences:</label>
                    <input id="absences" autocomplete="off"   type="number" class="form-control" name="absences" id="absences" value="{{ $user->absences }}" />                
                 </div>
                <div class="form-group">
                    <label for="retards">Total des retards:</label>
             <input id="retards" autocomplete="off"   type="number" class="form-control" name="retards" id="retards" value="{{ $user->retards }}" />                
                 </div>
                <div class="form-group">
                    <label for="eleve">Remarques:</label>
          <textarea id="remarques" autocomplete="off"     class="form-control" name="remarques"    > {{ $user->remarques }} </textarea>                
        
                </div>
              
                    
 <?php } ?> 
 <?php if($user->user_type=='parent') {?>
   
        
                <div class="form-group">
                    <label for="eleve">Enfant:</label>
               <select class="  form-control select2 " style="width:100%" name="itemName"  multiple  id="eleve" >
                          <?php if ( count($relations) > 0 ) { ?>

                         @foreach($relations as $relation)
                             @foreach($eleves as $eleve)
                                 <option  <?php if($relation->eleve==$eleve->id){echo 'selected="selected"';}?>    onclick="createeleve('tpr<?php echo $eleve->id; ?>')"  value="<?php echo $eleve->id;?>"> <?php echo $eleve->name.$eleve->lastname ;?></option>
                             @endforeach
                         @endforeach

                         <?php
                         } else { ?>
                         @foreach($eleves as $eleve)
                             <option    onclick="createeleve('tpr<?php echo $eleve->id; ?>')"  value="<?php echo $eleve->id;?>"> <?php echo $eleve->name.$eleve->lastname ; ?></option>
                         @endforeach

                         <?php }  ?>

                     </select>
       
</div>
 

    <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Enregistrer</button>
             </div>
       
 

       
    </form>
    


 </div>
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

/*$(function () {
$('.itemName').select2({
filter: true,
language: {
noResults: function () {
return 'Pas de résultats';
}
}

});




});*/


    function changing(elm) {
        var champ = elm.id;

        var val = document.getElementById(champ).value;

        var user = $('#iduser').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('users.updating') }}",
            method: "POST",
            data: {user: user, champ: champ, val: val, _token: _token},
            success: function (data) {
                $('#' + champ).animate({
                    opacity: '0.3',
                });
                $('#' + champ).animate({
                    opacity: '1',
                });

                if (champ == "user_type")
                {
                    location.reload();
                }
            }
        });
        

        // } else {

        // }
    }
    $('#eleve').select2({
            filter: true,
            language: {
                noResults: function () {
                    return 'Pas de résultats';
                }
            }

        });

        var $topo5 = $('#eleve');

        var valArray5 = ($topo5.val()) ? $topo5.val() : [];

        $topo5.change(function() {
            var val5 = $(this).val(),
                numVals5 = (val5) ? val5.length : 0,
                changes;
            if (numVals5 != valArray5.length) {
                var longerSet, shortSet;
                (numVals5 > valArray5.length) ? longerSet = val5 : longerSet = valArray5;
                (numVals5 > valArray5.length) ? shortSet = valArray5 : shortSet = val5;
                //create array of values that changed - either added or removed
                changes = $.grep(longerSet, function(n) {
                    return $.inArray(n, shortSet) == -1;
                });

                UpdatingT(changes, (numVals5 > valArray5.length) ? 'selected' : 'removed');

            }else{
                // if change event occurs and previous array length same as new value array : items are removed and added at same time
                UpdatingT( valArray5, 'removed');
                UpdatingT( val5, 'selected');
            }
            valArray5 = (val5) ? val5 : [];
        });
      function UpdatingT(array, type) {
            $.each(array, function(i, item) {

                if (type=="selected"){


                    var parent = $('#iduser').val();

                    var _token = $('input[name="_token"]').val();
      $.ajax({
                        url: "{{ route('users.createeleve') }}",
                        method: "POST",
                        data: {parent: parent ,eleve: item , _token: _token},
                        success: function () {
                           

                        }
                    });

                }

                if (type=="removed"){
                    var parent = $('#iduser').val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('users.removeeleve') }}",
                        method: "POST",
                        data: {parent: parent , eleve:item ,  _token: _token},
                        success: function () {
                            
                      

                        }
                    });

                }

            });
        } // updating
         $('#parent').select2({
            filter: true,
            language: {
                noResults: function () {
                    return 'Pas de résultats';
                }
            }

        });

       var $topo1 = $('#parent');

        var valArray0 = ($topo1.val()) ? $topo1.val() : [];

        $topo1.change(function() {
            var val0 = $(this).val(),
                numVals = (val0) ? val0.length : 0,
                changes;
            if (numVals != valArray0.length) {
                var longerSet, shortSet;
                (numVals > valArray0.length) ? longerSet = val0 : longerSet = valArray0;
                (numVals > valArray0.length) ? shortSet = valArray0 : shortSet = val0;
                //create array of values that changed - either added or removed
                changes = $.grep(longerSet, function(n) {
                    return $.inArray(n, shortSet) == -1;
                });

                UpdatingS(changes, (numVals > valArray0.length) ? 'selected' : 'removed');

            }else{
                // if change event occurs and previous array length same as new value array : items are removed and added at same time
                UpdatingS( valArray0, 'removed');
                UpdatingS( val0, 'selected');
            }
            valArray0 = (val0) ? val0 : [];
        });



        function UpdatingS(array, type) {
            $.each(array, function(i, item) {

                if (type=="selected"){


                    var eleve = $('#iduser').val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('users.createparent') }}",
                        method: "POST",
                        data: {eleve: eleve , parent:item ,  _token: _token},
                        success: function () {
                          /*  $('.select2-selection').animate({
                                opacity: '0.3',
                            });
                            $('.select2-selection').animate({
                                opacity: '1',
                            });*/

                        }
                    });

                }

                if (type=="removed"){
                    var eleve = $('#iduser').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('users.removeparent') }}",
                        method: "POST",
                        data: {eleve: eleve , parent:item ,  _token: _token},
                        success: function () {
                          
                        }
                    });

                }

            });
        } // updating
   
$('#classe').select2({
            filter: true,
            language: {
                noResults: function () {
                    return 'Pas de résultats';
                }
            }

        });
       

         var $gouv = $('#classe');

        var valArray = ($gouv.val()) ? $gouv.val() : [];

        $gouv.change(function() {
            var val = $(this).val(),
                numVals = (val) ? val.length : 0,
                changes;
            if (numVals != valArray.length) {
                var longerSet, shortSet;
                (numVals > valArray.length) ? longerSet = val : longerSet = valArray;
                (numVals > valArray.length) ? shortSet = valArray : shortSet = val;
                //create array of values that changed - either added or removed
                changes = $.grep(longerSet, function(n) {
                    return $.inArray(n, shortSet) == -1;
                });

                UpdatingG(changes, (numVals > valArray.length) ? 'selected' : 'removed');

            }else{
                // if change event occurs and previous array length same as new value array : items are removed and added at same time
                UpdatingG( valArray, 'removed');
                UpdatingG( val, 'selected');
            }
            valArray = (val) ? val : [];
        });


        function UpdatingG(array, type) {
            $.each(array, function(i, item) {

                if (type=="selected"){


                    var eleve = $('#iduser').val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('users.createclasse') }}",
                        method: "POST",
                        data: {eleve: eleve , classe:item ,  _token: _token},
                        success: function () {
                         /*   $('.select2-selection').animate({
                                opacity: '0.3',
                            });
                            $('.select2-selection').animate({
                                opacity: '1',
                            });*/
                      

                        }
                    });

                }

                if (type=="removed"){

                       var eleve = $('#iduser').val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('users.removeclasse') }}",
                        method: "POST",
                        data: {eleve: eleve , classe:item ,  _token: _token},
                        success: function () {
                           

                         
                        }
                    });

                }

            });
        } // 
        $('#classe1').select2({
            filter: true,
            language: {
                noResults: function () {
                    return 'Pas de résultats';
                }
            }

        });
       

         var $gouv1 = $('#classe1');

        var valArray1 = ($gouv1.val()) ? $gouv1.val() : [];

        $gouv1.change(function() {
            var val1 = $(this).val(),
                numVals1 = (val1) ? val1.length : 0,
                changes;
            if (numVals1 != valArray1.length) {
                var longerSet, shortSet;
                (numVals1 > valArray1.length) ? longerSet = val1 : longerSet = valArray1;
                (numVals1 > valArray1.length) ? shortSet = valArray1 : shortSet = val1;
                //create array of values that changed - either added or removed
                changes = $.grep(longerSet, function(n) {
                    return $.inArray(n, shortSet) == -1;
                });

                UpdatingG1(changes, (numVals1 > valArray1.length) ? 'selected' : 'removed');

            }else{
                // if change event occurs and previous array length same as new value array : items are removed and added at same time
                UpdatingG1( valArray1, 'removed');
                UpdatingG1( val1, 'selected');
            }
            valArray1 = (val1) ? val1 : [];
        });


        function UpdatingG1(array, type) {
            $.each(array, function(i, item) {

                if (type=="selected"){


                    var prof = $('#iduser').val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('users.createclasse1') }}",
                        method: "POST",
                        data: {prof: prof , classe1:item ,  _token: _token},
                        success: function () {
                           /* $('#classe1').animate({
                                opacity: '0.3',
                            });
                            $('#classe1').animate({
                                opacity: '1',
                            });*/
                      

                        }
                    });

                }

                if (type=="removed"){

                    var prof = $('#iduser').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('users.removeclasse1') }}",
                        method: "POST",
                        data: {prof: prof , classe1:item ,  _token: _token},
                        success: function () {
                           

                         
                        }
                    });

                }

            });
        } // 
        
    
       
        $(function () {
     $('#naissance').datepicker({

            closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            weekHeader: 'Sem.',
            buttonImage: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAATCAYAAAB2pebxAAABGUlEQVQ4jc2UP06EQBjFfyCN3ZR2yxHwBGBCYUIhN1hqGrWj03KsiM3Y7p7AI8CeQI/ATbBgiE+gMlvsS8jM+97jy5s/mQCFszFQAQN1c2AJZzMgA3rqpgcYx5FQDAb4Ah6AFmdfNxp0QAp0OJvMUii2BDDUzS3w7s2KOcGd5+UsRDhbAo+AWfyU4GwnPAYG4XucTYOPt1PkG2SsYTbq2iT2X3ZFkVeeTChyA9wDN5uNi/x62TzaMD5t1DTdy7rsbPfnJNan0i24ejOcHUPOgLM0CSTuyY+pzAH2wFG46jugupw9mZczSORl/BZ4Fq56ArTzPYn5vUA6h/XNVX03DZe0J59Maxsk7iCeBPgWrroB4sA/LiX/R/8DOHhi5y8Apx4AAAAASUVORK5CYII=",

            firstDay: 1,
            dateFormat: "dd/mm/yy"
                });
});

</script>


@endsection 
