
@extends('layouts.back')
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"  >

@section('content')
<h3 style="margin-left:50px">Formulaire Pré-inscription </h3><br><br>    
          <form class="form-horizontal" method="POST" action="{{ route('inscriptions.inscriptionsadd') }}">
                 {{ csrf_field() }}
           
<div class="row" style="margin-left:10px">
  <div class="form-group " >
    <div class=" row">
                                    <label for="champ1">Ancien Élève</label>
                                    
                                        <input class="form-control" type="number"  id="champ1" name="champ1"  onchange="checkexiste(this,'eleve');checkexiste1(this)" />


                                    </div>
                                </div>
 </div>



    <div class="row form-group" style="margin-bottom:30px">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"  id="test" class="btn btn-primary">
                                   S'inscrire
                                </button>
                            </div>
                        </div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
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
    function checkexiste1( elm) {
        var id=elm.id;
        var val =document.getElementById(id).value;
        //  var type = $('#type').val();

        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptions.checkexiste1') }}",
            method: "POST",
            data: {   val:val, _token: _token},
            success: function (data) {

               parsed = JSON.parse(data);
    
                if(data>0){
                     
                    document.getElementById(id).style.background='white';
                    document.getElementById(id).style.color='black';
                    $('#test').prop('disabled', true);
                     string='Eleve deja inscrit ! ';
                    

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
                    data:{ champ:champ, _token:_token},
                    success:function(data){

                     alert('Added successfully');
                      //  window.location =data;

                    }
                });
            }
        }



</script>


@endsection






