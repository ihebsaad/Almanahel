@extends('layouts.back')
 
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/buttons.bootstrap.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/scroller.bootstrap.css') }}" />
 

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"  >

@section('content')


    <style>
        .uper {
            margin-top: 10px;
        }
        .no-sort input{display:none;}
    </style>
    <div class="uper">

        <div class="portlet box grey">
            <div class="row">
                <div class="col-lg-6">Evénements</div>
                <div class="col-lg-6">
                    <a   class="btn btn-md btn-success"    href="{{action('EvenementsController@create')}}" ><b><i class="fas fa-plus"></i> Ajouter un événement</b></a>
                </div>
            </div>
        </div>

        <table id="mytable" class="table table-striped" id="mytable" style="width:100%">
            <thead>
            <tr id="headtable">
                <th style="width:5%">N°</th>
                 <th style="width:20%">Titre</th>
                <th style="width:25%">description</th>
                <th style="width:10%">Début</th>
                <th style="width:10%">Fin</th>
                <th style="width:10%">Visbilité</th>
                 <th style="width:10%">Actions</th>
              </tr>
         
            </thead>
            <tbody>
            @foreach($evenements as $evenement)
   

                <tr>
                    <td style="width:5%" >{{$evenement->id}}</td>
                    <td style="width:20%" ><a href="{{action('EvenementsController@view', $evenement['id'])}}" ><center><?php if($evenement->image==''){ ?> <img src="{{  URL::asset('public/site/img/no-image.png') }}" style="width:100px" /> <?php }else{  ?><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/storage/images/<?php echo $evenement->image;?>" style="max-width:150px"/> <?php } ?></center> </a></td>
                     <td style="width:25%" > {{$evenement->description}} </td>
                     <td style="width:10%" > {{$evenement->debut}} </td>
                     <td style="width:10%" > {{$evenement->fin}} </td>
                  
				  <td style="width:10%" >   <label><span class="checked">
                            <input  class="actus-<?php echo $evenement->id;?>"  type="checkbox"    id="actus-<?php echo $evenement->id;?>"    <?php if ($evenement->visible ==1){echo 'checked'; }  ?>  onclick="changing(this,'<?php echo $evenement->id; ?>' );"      >
                        </span> Visible</label> </td>
					<td style="width:10%"   >
                        @can('isAdmin')
                            <a  onclick="return confirm('Êtes-vous sûrs ?')" href="{{action('EvenementsController@destroy', $evenement['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Supprimer" >
                                <span class="fa fa-fw fa-trash-alt"></span> Supp 
                            </a>
                        @endcan
                    </td>
 
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>





    <?php use \App\Http\Controllers\UsersController;
    $users=UsersController::ListeUsers();

    $CurrentUser = auth()->user();

    $iduser=$CurrentUser->id;

    ?>
    <!-- Modal -->
    <div class="modal fade" id="create"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un Evenement</h5>

                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <form method="post" >
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="type">Titre :</label>
                                <input class="form-control" type="text" id="titre" />

                            </div>

                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" id="add" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

<script>
   function changing(elm,actus) {
            var champ=elm.id;

            var val =document.getElementById('actus-'+actus).checked==1;

            if (val==true){val=1;}
            else{val=0;}
            //if ( (val != '')) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('evenements.updating') }}",
                method: "POST",
                data: {actus:actus , champ:champ ,val:val, _token: _token},
                success: function (data) {
                    $('.actus-'+actus).animate({
                        opacity: '0.3',
                    });
                    $('.actus-'+actus).animate({
                        opacity: '1',
                    });

                }
            });
            // } else {

            // }
        }
</script>		

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
 	  