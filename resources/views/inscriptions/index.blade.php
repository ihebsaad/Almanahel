@extends('layouts.back')

<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/buttons.bootstrap.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/scroller.bootstrap.css') }}" />
 

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
         <div class="row">
            <div class="col-md-8"><H2> Liste des pré-inscriptions</H2></div><div class="col-md-3"><a data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom"  style="float:right;margin-right:20px;margin-bottom:25px;padding:3px 3px 3px 3px;border:1px solid #4fc1e9;" href="{{action('InscriptionsController@create')}}"><span role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Ajouter une inscription"  class="fa fa-fw fa-plus fa-2x"></span></a>

             <button style="float:left" id="add1" class="btn btn-md btn-default"   data-toggle="modal" data-target="#adding1"><b>  Ancien Élève </b></button>

                        </a><br></div>
        </div>
    <table class="table table-striped" id="mytable" style="width:100%">
        <thead>
        <tr id="headtable">
            <th>ID</th>
            <th>Nom de l'Élève</th>
            <th>Date de naissance</th>
             <th>Niveau</th>
             <th>Etablissement</th>
            <th>Parent</th>
            <th>Actions</th>
        
        </tr>
            
            </thead>
            <tbody>
            @foreach($inscriptions as $inscription)

                <tr>
              
                     <td> <a href="{{action('InscriptionsController@view', $inscription['id'])}}" >{{$inscription->id}}</a> </td>
                     <td>
                        <?php if ($inscription->valide==1){?>
                        <a href="{{action('UsersController@view', $inscription['ideleve'])}}" >{{  $inscription->nom." ".$inscription->prenom}}</a>
  <?php } else { 

 echo $inscription->nom." ".$inscription->prenom;}
    ?>

                    </td>
                    <td><?php echo $inscription->datenaissance;?></td>
                     <td><?php echo $inscription->niveau; ?></td>
                     <td><?php echo $inscription->etablissement;  ?></td>
 
                     <td>
                        <?php if ($inscription->valide==1){?>
                        <a href="{{action('UsersController@view', $inscription['idparent'])}}" >{{  $inscription->nom_rep." ".$inscription->prenom_rep}}</a>
  <?php } else { 

 echo $inscription->nom_rep." ".$inscription->prenom_rep;}
    ?>

                    </td>
                    
                          
                    


                  
                    <td>
                        <a  onclick="return confirm('Êtes-vous sûrs ?')"  href="{{action('InscriptionsController@destroy', $inscription['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Supprimer" >
                            <span class="fa fa-fw fa-trash-alt"></span> Supprimer
                        </a>
                        <?php if ($inscription->valide!==1){?>
                        <a  onclick="return confirm('Êtes-vous sûrs ?')"  href="{{action('InscriptionsController@valide', $inscription['id'])}}"  class="btn btn-md btn-success"  role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Valider" >
                            <span class="fa fa-fw fa-trash-alt"></span> Valider
                        </a>
                       
                         
                        <?php } ?>
                        <a   href="{{action('InscriptionsController@view', $inscription['id'])}}"  class="btn btn-md btn-success"  role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Valider" >
                            <span class="fa fa-fw fa-trash-alt"></span> Voir
                        </a>
                  
                  
                  </td>
                  
                  
                    
                </tr>
            @endforeach
            </tbody>
        </table>
<!-- Modal Tels -->
     <div class="modal fade" id="adding1"   role="dialog" aria-labelledby="exampleModal01" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1">Ancien Élève</h5>

                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">

                             <form class="form-horizontal" method="POST" action="{{ route('inscriptions.inscriptionsadd') }}">
                 {{ csrf_field() }}




                                <div class="form-group " >
                                    <label for="champ1">Ancien Élève</label>
                                    <div class=" row  ">
                                        <input class="form-control" type="number"  id="champ1" name="champ1"  onchange="checkexiste(this,'eleve')" />
                                      


                                    </div>
                                </div>

                                  <button type="submit"  id="test" class="btn btn-primary">
                                   S'inscrire
                                </button>



                            </form>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                 
                </div>
            </div>
        </div>
    </div>
	  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script>
	    function checkexiste( elm,type) {
        var id=elm.id;
        var val =document.getElementById(id).value;
        //  var type = $('#type').val();

        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptions.checkexiste') }}",
            method: "POST",
            data: {   val:val,type:type, _token: _token},
            success: function (data) {

           /*     if(data>0){
                    alert('  Existe deja !');
                    document.getElementById(id).style.background='#FD9883';
                    document.getElementById(id).style.color='white';
                } else{
                    document.getElementById(id).style.background='white';
                    document.getElementById(id).style.color='black';
                }
*/                    parsed = JSON.parse(data);
           
                if(data=="null"){
                     string='Erreur,faux id vérifiez ';
               
                    Swal.fire({
                        type: 'error',
                        title: 'Existe ...',
                        html: string
                    });  
                     

                    document.getElementById(id).style.background='#FD9883';
                    document.getElementById(id).style.color='white';
                   $('#test').prop('disabled', true);
                } else{
                     document.getElementById(id).style.background='white';
                    document.getElementById(id).style.color='black';
                    $('#test').prop('disabled', false);
                     string='Eleve existe: ! ';
                    if(parsed['name']!=null){string+='Nom : '+parsed['name']+ ' - '; }
                    if(parsed['lastname']!=null){string+='Prénom : '+parsed['lastname']+ ' - '; }

                   // alert(string);  
                    Swal.fire({
                        type: 'error',
                        title: 'Existe ...',
                        html: string
                    });                
                }




            }
        });
        // } else {

        // }
    }
     function adding(){

          
    var champ = $('#champ1').val();
           alert(champ);
            if ((champ != '') )
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('inscriptions.inscriptionsadd') }}",
                    method:"POST",
                    data:{champ:champ, _token:_token},
                    success:function(data){

                     alert('Added successfully');
                      //  window.location =data;

                    }
                });
            }else{
                // alert('ERROR');
            }
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
               // dom : '<"top"flp<"clear">>rt<"bottom"ip<"clear">>',
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


