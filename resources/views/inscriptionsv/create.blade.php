
@extends('layouts.back')


@section('content')

   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />



<style>
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .nouveau{ color: #000; margin-top: 10px;}
    .ancien{ color: #000; margin-top: 10px; }
    /* Accordion */
  .panel-default>.panel-heading {
    color: #333;
    background-color: #eee;
    border-color: #e4e5e7;
    padding: 0;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  .panel-default>.panel-heading a {
      display: block;
      padding: 10px 15px;
      font-size: 16px;
  }
  .panel-default>.panel-heading a:after {
    content: "";
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    float: right;
    transition: transform .25s linear;
    -webkit-transition: -webkit-transform .25s linear;
  }
  .panel-default>.panel-heading a[aria-expanded="true"] {
    background-color: #ccc;
  }
  .panel-default>.panel-heading a[aria-expanded="true"]:after {
    content: "\2212";
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
  }
  .panel-default>.panel-heading a[aria-expanded="false"]:after {
    content: "\002b";
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
  }
  .accordion-option {
    width: 100%;
    float: left;
    clear: both;
    margin: 15px 0;
  }
  .accordion-option .title {
    font-size: 20px;
    font-weight: bold;
    float: left;
    padding: 0;
    margin: 0;
  }
  .accordion-option .toggle-accordion {
    float: right;
    font-size: 16px;
    color: #6a6c6f;
  }
  .panel-body {
    
      padding: 10px 15px;
  }
  .sectionform {
    background-color:#ccc;
    color: black;
    font-weight:600;
    padding:5px 20px;
      margin-top: 20px;
    margin-bottom: 15px}
  .btn-preinscrit {
  }
  
  .select2-container--default .select2-selection--single{
  height:38px ;padding-top:5px; 
    
  }
</style>
 <div class="card uper">
        <div class="card-header">
            <label>Créer une inscription</label>
        </div>
   <div class="card-body">
   
   <div class="form-group"  style=" ">
 Inscription pour :<br>
 <select id="elevestat" onBlur="eleveverif()"  class="form-control">
            <option>Sélectionnez</option>
            <option value="nouveau">Nouveau élève (pré-inscription validée)</option>
            <option value="ancien">Ancien élève dans la plateforme  </option>
        </select>
 </div>
<div id="ancien_box" style="visibility:hidden">
   <form class="form-horizontal" method="POST" action="{{ route('inscriptionsv.inscriptionsadd') }}">
      {{ csrf_field() }}
    
    
 
   <div class="form-group " >
                                    
    Sélectionnez l'élève deja enregistré dans la palteforme<br>                                 
 <select style="width:100%;height:38px;padding-top: 5px;padding-left:5px;" class="form-control select2"  id="champ1" name="champ1"  onchange="checkexiste1(this)"   >      
@foreach($users as $user)
<option ></option>
  <option value="<?php  echo $user->id; ?>"><?php echo $user->lastname .' '.$user->name; ?></option>                          
   @endforeach
   </select>
    </div>
  
    <div class="row form-group" style="margin-bottom:20px;margin-top:20px">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"  id="test" class="btn btn-primary">
                                   S'inscrire
                                </button>
                            </div>
 </div>
</form>  

  </div>
                      

<div id="nouveau_box" style="visibility:hidden">
     <form class="form-horizontal" method="POST" action="{{ route('inscriptionsv.inscriptionsaddnov') }}">
         {{ csrf_field() }}
   <div class="form-group " >
    Sélectionnez l'élève pré-inscrit  <br>                                        
    <select  style="width:100%;height:38px;padding-top: 5px;padding-left:5px;" class="form-control select2"  id="champ2" name="champ2"  onchange="checkexiste2(this)"  >
 
@foreach($preins as $prein)
<option></option>
    <option value="<?php  echo $prein->id; ?>"><?php echo $prein->nom .' '.$prein->prenom; ?></option>                          
       @endforeach                    
    </select>
 </div>
  <div class="  form-group" style="margin-bottom:20px;margin-top:20px">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"  id="test1" class="btn btn-primary">
                                   S'inscrire
                                </button>
                            </div>
  </div>
                       
   </form>  
  </div>
  
 </div>
</div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
        
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
  $(champ1).select2();
$(champ2).select2();
function eleveverif()
{
  var eleve = document.getElementById("elevestat").value;
 if(eleve=="nouveau")
{
document.getElementById('nouveau_box').style.visibility = 'visible'; 
}
else
{
document.getElementById('nouveau_box').style.visibility = 'hidden'; 
}
if(eleve=="ancien")
{
document.getElementById('ancien_box').style.visibility = 'visible'; 
}
else
{
document.getElementById('ancien_box').style.visibility = 'hidden'; 
}
 
}
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
                     string='Élève déjà inscrit ! ';
                    
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
                     string='Élève déjà inscrit ! ';
                    
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