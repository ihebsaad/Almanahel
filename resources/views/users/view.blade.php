@extends('layouts.back')
 
    <link href="{{ asset('public/js/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/js/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>


@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <div class=" " style="padding:8px 8px 8px 8px">
        <div class="portlet box grey">
            <h3>   Utilisateur</h3>
        </div>
    <form class="form-horizontal" method="POST"  action="{{action('UsersController@update', $id)}}" >
        {{ csrf_field() }}


        <?php use \App\Http\Controllers\UsersController;     ?>


        <input type="hidden" id="iduser" value="{{$id}}" ></input>
        <table class="table">

        <tbody>

        <tr>
            <td class="text-primary">Prénom </td>
            <td>
                <input id="name" onchange="changing(this)" type="text" class="form-control" name="name"  value="{{ $user->name }}" />
                </td>
        </tr>
        <tr>
            <td class="text-primary">Nom </td>
            <td>
                <input id="lastname" onchange="changing(this)" type="text" class="form-control" name="lastname"  value="{{ $user->lastname }}" />
            </td>
        </tr>
        <tr>
            <td class="text-primary">Identifiant</td>
            <td> <input   id="username" autocomplete="off"  onchange="changing(this)" type="text" class="form-control" name="username" value="{{ $user->username }}" />          </td>
        </tr>
        <tr>
            <td class="text-primary">Mot de passe</td>
            <td> <input autocomplete="off"   onchange="changing(this)"  type="password" class="form-control" name="password"  id="password"   />          </td>
        </tr>
        <tr>
            <td class="text-primary">Adresse E-mail</td>
            <td> <input id="email" autocomplete="off" onchange="changing(this)"  type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" />                  </td>
        </tr>
        <tr>
            <td class="text-primary">Date de naissance</td>
            <td> <input id="naissance" autocomplete="off" onchange="changing(this)"   type="datetime-local" class="form-control" name="naissance"  id="naissance" value="{{ $user->naissance }}" />
            </td>
        </tr>
            <tr>
                <td class="text-primary">Tel</td>
                <td>    <input id="tel" onchange="changing(this);"  type="text" class="form-control" name="tel"  id="tel" value="{{ $user->tel }}" />
                </td>
            </tr>
       
       <?php if($user->user_type!='admin') { ?>
        <tr>
            <td class="text-primary">Qualification</td>
            <td>
                <select  name="user_type"  id="user_type" onchange="changing(this);"  >
                    <option></option>
                     <option value="Élève"  <?php if($user->user_type=='Élève') {echo'selected="selected"';}?> >Élève</option>
                     <option value="Enseignant"  <?php if($user->user_type=='Enseignant') {echo'selected="selected"';}?> >Enseignant </option>
                    <option  value="Parent"  <?php if($user->user_type=='Parent') {echo'selected="selected"';}?>  >Parent</option>
                    <option  value="Membre Administration"  <?php if($user->user_type=='Membre Administration') {echo'selected="selected"';}?>  >Membre Administration</option>
                   
                </select>
            </td>
        </tr>
<?php } ?>
<?php if($user->user_type=='Élève') {?>
    <tr>

        <td class="text-primary">Niveau</td>
            <td> <input id="niveau" autocomplete="off" onchange="changing(this)"  type="text" class="form-control" name="niveau" id="niveau" value="{{ $user->niveau }}" />                  </td>
        </tr>
	<tr>
	    <td class="text-primary">Paiements</td>
            <td> <input id="paiements" autocomplete="off" onchange="changing(this)"  type="text" class="form-control" name="paiements" id="paiements" value="{{ $user->paiements }}" />                  </td>
        </tr>
        <tr>
        <td class="text-primary">Total Paiement</td>
            <td> <input id="totalpaiement" autocomplete="off" onchange="changing(this)"  type="number" class="form-control" name="totalpaiement" id="totalpaiement" value="{{ $user->totalpaiement }}" />                  </td>
        </tr>
        <tr>

        <td class="text-primary">Absences</td>
            <td> <input id="absences" autocomplete="off" onchange="changing(this)"  type="number" class="form-control" name="absences" id="absences" value="{{ $user->absences }}" />                  </td>
        </tr>
        <tr>

        <td class="text-primary">Retards</td>
            <td> <input id="retards" autocomplete="off" onchange="changing(this)"  type="number" class="form-control" name="retards" id="retards" value="{{ $user->retards }}" />                  </td>
        </tr>
        
        
 <?php } ?> 
 <?php if($user->user_type=='Parent') {?>
   
        <tr>

        <td class="text-primary">Élèves</td>
          <td>
               <select class="itemName form-control col-lg-6" style="width:100%" name="itemName"  multiple  id="eleve" >
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
          </td>


        </tr>

        
 <?php } ?> 


       

        </tbody>
        </table>

       
    </form>


</div>
	<style>
        #tabstats {font-size: 15px;padding:30px 30px 30px 30px;}
        #tabstats td{border-left:1px solid white;border-bottom:1px solid white;min-width:50px;min-height: 25px;;text-align: center;}
        #tabstats tr{margin-bottom:15px;text-align: center;height: 40px;}
        </style>



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
                            $('.select2-selection').animate({
                                opacity: '0.3',
                            });
                            $('.select2-selection').animate({
                                opacity: '1',
                            });
                            location.reload();

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
                            $( ".select2-selection--multiple" ).hide( "slow", function() {
                                // Animation complete.
                            });
                            $( ".select2-selection--multiple" ).show( "slow", function() {
                                // Animation complete.
                            });

                            location.reload();

                        }
                    });

                }

            });
        } // updating

</script>


@endsection 
