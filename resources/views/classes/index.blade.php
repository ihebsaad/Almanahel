@extends('layouts.back')

<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/buttons.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/scroller.bootstrap.css') }}" />
 <?php


  use App\User ;
  ?>

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
     <div class="portlet box grey">
            <div class="row">
                <div class="col-lg-6"><h2>Liste des Classes</h2></div>
               <div class="col-lg-3">
             <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-archive"></i> Archive  
                </button>
                <ul class="dropdown-menu pull-right">
                    <li style="text-align:center;width:120px">
                        <a href="{{route('classes.annee',['annee'=>'2020' ])}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                            2020 </a>
                    </li>
                    <li style="text-align:center;width:120px">
                        <a href="{{route('classes.annee',['annee'=>2021 ])}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                            2021 </a>
                    </li>
                    <li style="text-align:center;;width:120px">
                        <a href="{{route('classes.annee',['annee'=>2022 ])}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                            2022 </a>
                    </li>

                </ul>
            </div>
				
 				</div>
				<div class="col-lg-3">
                    <a   class="btn btn-md btn-success"    href="{{action('ClassesController@create')}}" ><b><i class="fas fa-plus"></i> Ajouter une classe</b></a>
                </div>
            </div>
        </div>
    <table class="table table-striped" id="mytable" style="width:100%">
        <thead>
        <tr id="headtable">
            <th>ID</th>
            <th>Nom de la classe</th>
            <th>Année</th>
             <th>Élèves</th>
            <th>Enseignants</th>
            <th>Actions</th>
        </tr>
            
            </thead>
            <tbody>
            @foreach($classes as $classe)

                <tr>
                    <td>{{$classe->id}}</td>
                     <td><a href="{{action('ClassesController@view', $classe['id'])}}" >{{ $classe->titre }}</a></td>
                    <td><?php echo $classe->annee;?></td>
                     <td><?php

                            $idseleves = DB::table('eleves_classe')->where('classe','=',$classe->id)->pluck('eleve');
                          $users = User::orderBy('name', 'asc')
                          ->whereIn('id', $idseleves)
                        ->get() ;
                        

                       echo count($users) ; 

?>
                        </td>
                     <td><?php  


                       $idsenseignants = DB::table('profs_classe')->where('classe','=',$classe->id)->pluck('prof');
                          $users = User::orderBy('name', 'asc')
                          ->whereIn('id', $idsenseignants)
                        ->get() ;
                         foreach ($users as $user) {?>
 <a  href="{{action('UsersController@view', $user['id'])}}">
                             <?php   echo $user->name." ".$user->lastname ; ?> 
                        </a>

                   <br/>

                     

                          <?php }?>
                    

</td>
                  
                    <td>
                        <a  onclick="return confirm('Êtes-vous sûrs ?')"  href="{{action('ClassesController@destroy', $classe['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Supprimer" >
                            <span class="fa fa-fw fa-trash-alt"></span> Supprimer
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
				 aaSorting : [],               
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


