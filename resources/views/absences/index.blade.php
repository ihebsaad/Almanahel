@extends('layouts.back')
 
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/buttons.bootstrap.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/scroller.bootstrap.css') }}" />
 
 <?php use App\Classe;  ?>
@section('content')
 
    <style>
        .uper {
            margin-top: 10px;
        }
        .no-sort input{display:none;}
    </style>
    <div class="uper">
 <?php
            $year=date('Y');
             $annee=intval($year);
             $anneep=$annee-1;
             $annees=$annee+1;
             $anneess=$annee+2;
            ?>
        <div class="portlet box grey">
            <div class="row">
                <div class="col-lg-6"><h2>Liste des Absences</h2></div>
                <div class="col-lg-3">
             <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-archive"></i> Archive  
                </button>
                <ul class="dropdown-menu pull-right">
                    <li style="text-align:center;width:120px">
                        <a href="{{action('AbsencesController@annee', $anneep)}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                           <?php echo $anneep.'-'.$annee  ?> </a>
                    </li>
                    <li style="text-align:center;width:120px">
                        <a href="{{action('AbsencesController@annee', $annee)}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                      <?php echo $annee.'-'.$annees  ?></a>
                    </li>
                    <li style="text-align:center;;width:120px">
                        <a href="{{action('AbsencesController@annee', $annees)}}"  style="font-size:17px;height:25px;margin-bottom:3px;">
                             <?php echo $annees.'-'.$anneess  ?> </a>
                    </li>

                </ul>
            </div>
				
 				</div>
                                <?php 
$cuser = auth()->user();
 $iduser=$cuser->id;
$user_type=$cuser->user_type;


             if($user_type!='parent') {?>
                <div class="col-lg-3">
                    <a   class="btn btn-md btn-success"    href="{{action('AbsencesController@create')}}" ><b><i class="fas fa-plus"></i> Ajouter une absence</b></a>
                </div>
            <?php } ?>
            </div>
        </div>

        <table id="mytable" class="table table-striped" id="mytable" style="width:100%">
            <thead>
            <tr id="headtable">
                <th style="width:5%">N°</th>
                <th style="width:20%">Classe</th>
                <th style="width:20%">Elève</th>
                 <th style="width:20%">Date</th>
                <th style="width:10%">Début</th>
                <th style="width:10%">Fin</th>
                 <th style="width:10%">Actions</th>
              </tr>
         
            </thead>
            <tbody>
          <?php  foreach($absences as $absence )
		  {
				$userid=intval($absence['eleve']);
				$idcl=intval($absence['classe']);
				$user=	\App\User::where('id',$userid)->first();
				$classe=	 Classe::where('id',$idcl)->first();
 				  
    				
				?>
                <tr>
                    <td style="width:5%" ><a href="{{action('AbsencesController@view', $absence['id'])}}" >{{$absence->id}}</a></td>
                    <td style="width:20%" ><?php   echo $classe->titre ; ?> </td>
                    <td style="width:20%" ><?php if($userid>0){echo $user['name'] .' '.$user['lastname'];}?> </td>

                    <td style="width:10%" ><?php echo $absence['created_at']->format('d/m/y H:i:s') ;?> </td>
                    <td style="width:10%" ><?php echo $absence['debut'];?> </td>
                    <td style="width:10%" ><?php echo $absence['fin'];?> </td>
 
					<td style="width:10%"   >
                        <?php  if($user_type!='parent') {?>  
                             <a  onclick="return confirm('Êtes-vous sûrs ?')" href="{{action('AbsencesController@destroy', $absence['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Supprimer" >
                                <span class="fa fa-fw fa-trash-alt"></span> Supprimer
                            </a>
                        <?php } ?>
                              <a   href="{{action('AbsencesController@view', $absence['id'])}}"  class="btn btn-md btn-success"  role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Valider" >
                            <span class="far fa-eye" ></span> Voir
                        </a>
 
                    </td>
 
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>





    <?php use \App\Http\Controllers\UsersController;
 
    $CurrentUser = auth()->user();

    $iduser=$CurrentUser->id;

    ?>
    <!-- Modal -->
    <div class="modal fade" id="create"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une Actualité</h5>

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
                url: "{{ route('absences.updating') }}",
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
 	  