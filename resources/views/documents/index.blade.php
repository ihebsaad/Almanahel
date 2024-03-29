@extends('layouts.back')

<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/buttons.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/scroller.bootstrap.css') }}" />

 <?php
  use App\User ;
  ?>
  <?php
            $year=date('Y');
             $annee=intval($year);
             $anneep=$annee-1;
             $annees=$annee+1;
             $anneess=$annee+2;
            ?>

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
     <div class="portlet box grey">
            <div class="row">
                <div class="col-lg-6"><h2>Liste des documents</h2></div>
         <div class="col-lg-3">
             <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-archive"></i> Archive  
                </button>
                <ul class="dropdown-menu pull-right">
                    <li style="text-align:center;width:120px">
                        <a href="{{action('DocumentsController@annee', $anneep)}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                            <?php echo $anneep.'-'.$annee  ?></a>
                    </li>
                    <li style="text-align:center;width:120px">
                        <a href="{{action('DocumentsController@annee', $annee)}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                             <?php echo $annee.'-'.$annees  ?> </a>
                    </li>
                    <li style="text-align:center;;width:120px">
                        <a href="{{action('DocumentsController@annee', $annees)}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                             <?php echo $annees.'-'.$anneess  ?></a>
                    </li>

                </ul>
            </div>
                
                </div>
                <div class="col-lg-3">
                    <a   class="btn btn-md btn-success"    href="{{action('DocumentsController@create')}}" ><b><i class="fas fa-plus"></i> Ajouter un document</b></a>
                </div>
            </div>
        </div>
    <table class="table table-striped" id="mytable" style="width:100%">
        <thead>
        <tr id="headtable">
            <th>ID</th>
            <th>Date</th>
            <th>Titre</th>
             <th>Emetteur</th>
            <th>Actions</th>
        </tr>
            
            </thead>
            <tbody>
            @foreach($documents as $document)

                <tr>
                       <?php $date=  date('d/m/Y H:i', strtotime($document['created_at'] )); ?>
                    <td>{{$document->id}}</td>
                     <td><?php echo $date;?></td>
                     <td><a href="{{action('DocumentsController@view', $document['id'])}}" >{{ $document->titre }}</a></td>
                    <td><?php 
$user=User::where('id',$document->emetteur)->first() ;
                    echo $user['name']." ".$user['lastname'];?></td>
                    
                    <td>
                        <a  onclick="return confirm('Êtes-vous sûrs ?')"  href="{{action('DocumentsController@destroy', $document['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Supprimer" >
                            <span class="fa fa-fw fa-trash-alt"></span> Supprimer
                        </a>
                          <a  class="btn btn-md btn-success" role="button"  class="form-control"  target="_blank" href="//<?php echo $_SERVER['HTTP_HOST'];?>/storage/documents/<?php echo  $document->chemin?>" > 
                            <span class="fa fa-fw fa-download"></span> Télécharger
                   </a>
                    <a   href="{{action('DocumentsController@view', $document['id'])}}"  class="btn btn-md btn-success"  role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Valider" >
                            <span class="far fa-eye" ></span> Voir
                        </a>
                  
                  </td>
                </tr>
            @endforeach
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
        $(document).ready(function() {
            $('#mytable thead tr:eq(1) th').each( function () {
                var title = $('#mytable thead tr:eq(0) th').eq( $(this).index() ).text();
                $(this).html( '<input class="searchfield" type="text"   />' );
            } );
            var table = $('#mytable').DataTable({
                orderCellsTop: true,
                dom : '<"top"flp<"clear">>rt<"bottom"ip<"clear">>',
                responsive:true,
				aaSorting : [],               
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



