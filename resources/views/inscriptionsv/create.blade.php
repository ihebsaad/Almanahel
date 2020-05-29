
@extends('layouts.back')


@section('content')

   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />





<h3 style="margin-left:50px">Inscription </h3><br><br>    
           <div class="row"  style="margin-left:20px">
  <section style=" font-size: 18px; font-weight: 500; color: #545454;">
Inscription pour : <select id="elevestat" onBlur="eleveverif()">
            <option>Selectionner</option>
            <option value="nouveau">Nouveau</option>
            <option value="ancien">Ancien</option>
        </select>
         élève.
  </section>
</div></br></br></br></br></br></br></br>
<div id="ancien_box" style="display:none">
   <form class="form-horizontal" method="POST" action="{{ route('inscriptionsv.inscriptionsadd') }}">
      {{ csrf_field() }}
	  
	  <?php	  //ANNEE
		$year=date('Y');$month=date('m');
		$mois=intval($month);
		$annee=intval($year);
		if($mois > 9 ){$annee=$annee-1;}
		?>
	  <input id="annee" type="hidden" class="form-control" name="annee"  value="<?php echo $annee;?>"/>
			   
			   
<div class="row" style="margin-left:20px">
  <div class="form-group " >
   
                                   
                Sélectionnez l'élève         </br>            
 <select  class="form-control select2" id="champ1" name="champ1"  onchange="checkexiste1(this)"   >
                       
                  
                       
@foreach($users as $user)
                            <option value="<?php  echo $user->id; ?>"><?php echo $user->lastname .$user->name; ?></option>                          
                             @endforeach
                       

                     </select>

                                    </div>
                                </div>




</br></br></br></br></br></br></br>
    <div class="row form-group" style="margin-bottom:60px">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"  id="test" class="btn btn-primary">
                                   S'inscrire
                                </button>
                            </div>
                        </div>
</form>  

                         </div>
                      

<div id="nouveau_box" style="display:none">
     <form class="form-horizontal" method="POST" action="{{ route('inscriptionsv.inscriptionsaddnov') }}">
         {{ csrf_field() }}
<div class="row" style="margin-left:20px">
  <div class="form-group " >
        
  
                   Sélectionnez l'élève    </br>   

                                    
           <select class="form-control select2" style="width:100%"  id="champ2" name="champ2"  onchange="checkexiste2(this)"  >
                       
                  
                       
@foreach($preins as $prein)
                            <option value="<?php  echo $prein->id; ?>"><?php echo $prein->nom .$prein->prenom; ?></option>                          
                             @endforeach
                       

                     </select>
 </div>
  </div>
  

</br></br></br></br></br></br></br>

    <div class="row form-group" style="margin-bottom:30px">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"  id="test1" class="btn btn-primary">
                                   S'inscrire
                                </button>
                            </div>
                        </div>
                       
                   </form>  
  </div>
</div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
        
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
function eleveverif()
{
  var eleve = document.getElementById("elevestat").value;

 if(eleve=="nouveau")
{
document.getElementById('nouveau_box').style.display = 'block'; 
}
else
{
document.getElementById('nouveau_box').style.display = 'none'; 
}
if(eleve=="ancien")
{
document.getElementById('ancien_box').style.display = 'block'; 
}
else
{
document.getElementById('ancien_box').style.display = 'none'; 
}
 
}
$(champ1).select2();
$(champ2).select2();





    function checkexiste1( elm) {
        var id=elm.id;
        var val =document.getElementById(id).value;
        //  var type = $('#type').val();

        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptionsv.checkexiste1') }}",
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
                else
                  {  $('#test').prop('disabled', false);}




            }
        });
        // } else {

        // }
    }
     function adding(){
          var champ = $('#champ1').val();
      
            if ((champ != '') )
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('inscriptionsv.inscriptionsadd') }}",
                    method:"POST",
                    data:{ champ:champ, _token:_token},
                    success:function(data){

                     alert('Added successfully');
                      //  window.location =data;

                    }
                });
            }
        }
         function adding2(){
          var champ = $('#champ2').val();
       
            if ((champ != '') )
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('inscriptionsv.inscriptionsaddnov') }}",
                    method:"POST",
                    data:{ champ:champ, _token:_token},
                    success:function(data){

                     alert('Added successfully');
                      //  window.location =data;

                    }
                });
            }
        }
         function checkexiste2( elm) {
        var id=elm.id;
        var val =document.getElementById(id).value;
        //  var type = $('#type').val();

        //if ( (val != '')) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('inscriptionsv.checkexiste2') }}",
            method: "POST",
            data: {   val:val, _token: _token},
            success: function (data) {

               parsed = JSON.parse(data);
    
                if(data>0){
                     
                    document.getElementById(id).style.background='white';
                    document.getElementById(id).style.color='black';
                    $('#test1').prop('disabled', true);
                     string='Eleve deja inscrit ! ';
                    

                   // alert(string);  
                    Swal.fire({
                        type: 'error',
                        title: 'Existe ...',
                        html: string
                    });                
                }
                 else
                  {  $('#test1').prop('disabled', false);}




            }
        });
        // } else {

        // }
    }
 


 

</script>
@endsection

