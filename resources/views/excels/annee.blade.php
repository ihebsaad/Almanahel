@extends('layouts.back')

<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/buttons.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/scroller.bootstrap.css') }}" />

 <?php
  use App\User ;
  ?>
   <?php
if (Auth::check()) {

$cuser = auth()->user();
 $iduser=$cuser->id;
$user_type=$cuser->user_type;
} 
?>

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
     <div class="portlet box grey">
            <div class="row">
                <div class="col-lg-6"><h2>Liste des excels finances - Année <?php echo $annee; ?></h2></div>
            <div class="col-lg-3">
             <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-archive"></i> Archive  
                </button>
                <ul class="dropdown-menu pull-right">
                    <li style="text-align:center;width:120px">
                        <a href="{{route('excels.annee',['annee'=>'2020' ])}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                            2020 </a>
                    </li>
                    <li style="text-align:center;width:120px">
                        <a href="{{route('excels.annee',['annee'=>2021 ])}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                            2021 </a>
                    </li>
                    <li style="text-align:center;;width:120px">
                        <a href="{{route('excels.annee',['annee'=>2022 ])}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                            2022 </a>
                    </li>

                </ul>
            </div>
                
                </div>
        <?php if ($user_type =='admin' || $user_type =='financier' || $cuser->finances==1 ){  ?>
				
                <div class="col-lg-3">
                    <a   class="btn btn-md btn-success" href="{{action('ExcelsController@create')}}" ><b><i class="fas fa-plus"></i> Ajouter un excel</b></a>
                </div>
				
					 <?php } ?>
            </div>
        </div>
  <table class="table table-striped" id="mytable" style="width:100%">
        <thead>
        <tr id="headtable">
            <th>ID</th>
            <th>Date</th>
            <th>Type</th>
            <th>Mois</th>
            <th>Titre</th>
             <th>Emetteur</th>
            <th>Actions</th>
        </tr>
            
            </thead>
            <tbody>
             <?php foreach($excels as $excel)
             { $type=$excel['type']; $Type="";
                if($type=='comptable'){$Type='Paie Comptable';}
                if($type=='caisse'){$Type='Paie de Caisse';}
                if($type=='profs'){$Type='Paie des enseignants';}
                if($type=='eleves'){$Type='Paie des élèves';}
                if($type=='personnels'){$Type='Paie de personnels';}
                $date=  date('d/m/Y H:i', strtotime($excel['created_at'] ));
                
                $mois=$excel['mois'];$Mois='';
                if($mois==1){$Mois="Janvier";} if($mois==7){$Mois="Juillet";}
                if($mois==2){$Mois="Février";} if($mois==8){$Mois="Août";}
                if($mois==3){$Mois="Mars";} if($mois==9){$Mois="Septembre";}
                if($mois==4){$Mois="Avril";} if($mois==10){$Mois="Octobre";}
                if($mois==5){$Mois="Mai";} if($mois==11){$Mois="Novembre";}
                if($mois==6){$Mois="Juin";} if($mois==12){$Mois="Décembre";}
             ?>
                <tr>
                    <td>{{$excel->id}}</td>
                     <td><?php echo $date;?></td>
                      <td><?php echo $Type; ?></td>
                      <td><?php echo $Mois ; ?></td>

                     <td><a href="{{action('ExcelsController@view', $excel['id'])}}" >{{ $excel->titre }}</a></td>
                    <td><?php 
$user=User::where('id',$excel->emetteur)->first() ;
                    echo $user['name']." ".$user['lastname'];?></td>
                    

                    <td>
                     <?php if ($user_type =='admin' || $user_type =='financier' || $user->finances==1 ){  ?>
					
                        <a  onclick="return confirm('Êtes-vous sûrs ?')"  href="{{action('ExcelsController@destroy', $excel['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Supprimer" >
                            <span class="fa fa-fw fa-trash-alt"></span> Supprimer
                        </a>
					 <?php }  ?>	
                          <a  class="btn btn-md btn-success" role="button"  target="_blank"   class="form-control" href="//<?php echo $_SERVER['HTTP_HOST'];?>/storage/excels/<?php echo  $excel->chemin?>" > 
                            <span class="fa fa-fw fa-download"></span> Télécharger
                   </a>
                     <a   href="{{action('ExcelsController@view', $excel['id'])}}"  class="btn btn-md btn-success"  role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Valider" >
                            <span class="far fa-eye" ></span> Voir
                        </a>
                  
                  </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    @endsection



@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/dataTables.rowReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/dataTables.scroller.js') }}" ></script>

    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/dataTables.buttons.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/dataTables.responsive.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/buttons.colVis.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/buttons.html5.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/buttons.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/pdfmake.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('resources/assets/datatables/js/vfs_fonts.js') }}" ></script>

    <style>.searchfield{width:100px;}</style>


    <script type="text/javascript">
        $(docuement).ready(function() {
            $('#mytable thead tr:eq(1) th').each( function () {
                var title = $('#mytable thead tr:eq(0) th').eq( $(this).index() ).text();
                $(this).html( '<input class="searchfield" type="text"   />' );
            } );
            var table = $('#mytable').DataTable({
                orderCellsTop: true,
                dom : '<"top"flp<"clear">>rt<"bottom"ip<"clear">>',
                responsive:true,
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                "columnDefs": [ {
                    "targets": 'no-sort',
                    "orderable": false,
                } ]
                ,
                "language":
                    {
                        "decimal":        "",
                        "emptyTable":     "Pas de données",
                        "info":           "affichage de  _START_ à _END_ de _TOTAL_ entrées",
                        "infoEmpty":      "affichage 0 à 0 de 0 entrées",
                        "infoFiltered":   "(Filtrer de _MAX_ total d`entrées)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "affichage de _MENU_ entrées",
                        "loadingRecords": "chargement...",
                        "processing":     "chargement ...",
                        "search":         "Recherche:",
                        "zeroRecords":    "Pas de résultats",
                        "paginate": {
                            "first":      "Premier",
                            "last":       "Dernier",
                            "next":       "Suivant",
                            "previous":   "Précédent"
                        },
                        "aria": {
                            "sortAscending":  ": activer pour un tri ascendant",
                            "sortDescending": ": activer pour un tri descendant"
                        }
                    }
            });
            // Restore state
       /*     var state = table.state.loaded();
            if ( state ) {
                table.columns().eq( 0 ).each( function ( colIdx ) {
                    var colSearch = state.columns[colIdx].search;
                    if ( colSearch.search ) {
                        $( '#mytable thead tr:eq(1) th:eq(' + index + ') input', table.column( colIdx ).footer() ).val( colSearch.search );
                    }
                } );
                table.draw();
            }
*/
            function delay(callback, ms) {
                var timer = 0;
                return function() {
                    var context = this, args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                        callback.apply(context, args);
                    }, ms || 0);
                };
            }
// Apply the search
            table.columns().every(function (index) {
                $('#mytable thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
                    table.column($(this).parent().index() + ':visible')
                        .search(this.value)
                        .draw();
                });
                $('#mytable thead tr:eq(1) th:eq(' + index + ') input').keyup(delay(function (e) {
                    console.log('Time elapsed!', this.value);
                    $(this).blur();
                }, 2000));
            });
 
        });
    </script>


@stop
