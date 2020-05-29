@extends('layouts.back')


  
    <link href="{{ asset('public/js/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/js/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
@section('content')
    <div class="card uper">
        <div class="card-header">
            Classe
        </div>
        <div class="card-body">
    <form class="form-horizontal" method="POST"  action="{{action('ClassesController@update', $id)}}" >
        {{ csrf_field() }}


        <?php use \App\Http\Controllers\ClassesController;     ?>


        <input type="hidden" id="idclasse" value="{{$id}}" ></input>
 
       

           <div class="form-group ">
                    <label for="titre">Titre:</label>
                <input id="titre" onchange="changing(this)" type="text" class="form-control" name="titre"  value="{{ $classe->titre }}" />
          </div>
        
             <div class="form-group ">
                    <label for="eleve">Elève:</label>
               <select class="itemName form-control col-lg-6" style="width:100%" name="eleve"  multiple  id="eleve" >
                          <?php if ( count($relations1) > 0 ) { ?>

                         @foreach($relations1 as $relation1)
                             @foreach($eleves1 as $eleve1)
                                 <option  <?php if($relation1->eleve==$eleve1->id){echo 'selected="selected"';}?>    onclick="createeleveclass('tpr<?php echo $eleve1->id; ?>')"  value="<?php echo $eleve1->id;?>"> <?php echo $eleve1->name.$eleve1->lastname ;?></option>
                             @endforeach
                         @endforeach

                         <?php
                         } else { ?>
                         @foreach($eleves1 as $eleve1)
                             <option    onclick="createeleveclass('tpr<?php echo $eleve1->id; ?>')"  value="<?php echo $eleve1->id;?>"> <?php echo $eleve1->name.$eleve1->lastname ; ?></option>
                         @endforeach

                         <?php }  ?>

                     </select>
          </div>

           <div class="form-group ">
                    <label for="enseignant">Enseignant:</label>
               <select class="form-control  col-lg-12 itemName" style="width:100%" name="enseignant"  multiple  id="enseignant" >
                          <?php 
                          $sel=0;
               if ( count($relations2) > 0 )
                            { ?>

                         @foreach($relations2 as $relation2)

                             @foreach($enseignants as $enseignant)
                                 <option  <?php if($relation2->prof== $enseignant->id){echo 'selected="selected"';$sel=$sel+1;}?>    onclick="createenseignantclass('tpr<?php echo $enseignant->id; ?>')"  value="<?php echo  $enseignant->id;?>"> <?php echo  $enseignant->name. $enseignant->lastname ;?></option>
                             @endforeach
                         @endforeach

                         <?php
                         } else { ?>
                        @foreach($enseignants as $enseignant)
                             <option    onclick="createenseignantclass('tpr<?php echo  $enseignant->id; ?>')"  value="<?php echo  $enseignant->id;?>"> <?php echo  $enseignant->name. $enseignant->lastname ; ?></option>
                         @endforeach

                         <?php }  ?>

                     </select>
          </div>

 
        
 


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

        var classe = $('#idclasse').val();
        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('classes.updating') }}",
            method: "POST",
            data: {classe: classe, champ: champ, val: val, _token: _token},
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


                    var classe = $('#idclasse').val();

                    var _token = $('input[name="_token"]').val();
      $.ajax({
                        url: "{{ route('classes.createeleveclass') }}",
                        method: "POST",
                        data: {classe: classe ,eleve: item , _token: _token},
                        success: function () {
                           /* $('.select2-selection').animate({
                                opacity: '0.3',
                            });
                            $('.select2-selection').animate({
                                opacity: '1',
                            });*/
                           // location.reload();

                        }
                    });

                }

                if (type=="removed"){
                    var classe = $('#idclasse').val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('classes.removeeleveclass') }}",
                        method: "POST",
                        data: {classe: classe , eleve:item ,  _token: _token},
                        success: function () {
                          /*  $( ".select2-selection--multiple" ).hide( "slow", function() {
                                // Animation complete.
                            });
                            $( ".select2-selection--multiple" ).show( "slow", function() {
                                // Animation complete.
                            });*/

                            //location.reload();

                        }
                    });

                }

            });
        } // updating
        $('#enseignant').select2({
            filter: true,
            language: {
                noResults: function () {
                    return 'Pas de résultats';
                }
            }

        });

       var $topo1 = $('#enseignant');

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


                    var classe = $('#idclasse').val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('classes.createenseignantclass') }}",
                        method: "POST",
                        data: {classe: classe , enseignant:item ,  _token: _token},
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
                    var classe = $('#idclasse').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('classes.removeenseignantclass') }}",
                        method: "POST",
                        data: {classe: classe , enseignant:item ,  _token: _token},
                        success: function () {
                          /*  $( ".select2-selection--multiple" ).hide( "slow", function() {
                                // Animation complete.
                            });
                            $( ".select2-selection--multiple" ).show( "slow", function() {
                                // Animation complete.
                            });*/
                        }
                    });

                }

            });
        } // updating
        
   
</script>
 @endsection