@extends('layouts.back')
 
@section('content')

    <h3 style="margin-left:50px">Ajouter un document </h3><br><br>

                    <form class="form-horizontal" method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
        <?php   //ANNEE
    $year=date('Y');$month=date('m');
    $mois=intval($month);
    $annee=intval($year);
    if($mois > 9 ){$annee=$annee-1;}
    ?>
         <input id="annee" type="hidden" class="form-control" name="annee"  value="<?php echo $annee;?>"/>

                        <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                            <label for="titre" class="col-md-4 control-label">Titre</label>

                            <div class="col-md-6">
                                <input  autocomplete="off"  id="titre" type="text" class="form-control" name="titre" value="{{ old('titre') }}" required autofocus>

                                @if ($errors->has('titre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                             <div class="form-group " style="margin-bottom:30px">
                         <label for="name" class="col-md-4 control-label">Fichier</label>

                            <div class="col-md-6">
                                <input  autocomplete="off"  id="chemin" type="file" class="form-control" name="chemin"  required  >

                                
                            </div>
                        </div>
                           <div class="form-group " style="margin-bottom:30px">
                         <label for="name" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input  autocomplete="off"  id="description" type="text" class="form-control" name="description"  required  >

                                
                            </div>
                        </div>
                         <div class="form-group " style="margin-bottom:30px">
                         <label for="name" class="col-md-4 control-label">Cible</label>
                          <div class="col-md-6">
                               <select name="type" id="type" class="form-control" onBlur="verif()" >
                              <option value="">--Sélectionnez--</option>
                             <option value="eleve">Élève</option>
                          <option value="parent">Parent</option>
                         <option value="prof">Enseignant</option>
                          <option value="classe">Classe</option>
                            <option value="moimeme">Moi-même</option>
                             <?php if((\Gate::allows('isAdmin'))|| (\Gate::allows('isConseil') ) || (\Gate::allows('isSuivi') ) ) { ?>
               <option value="tousleseleves">Tous les élèves</option>
                <option value="touslesutilisateurs">Tous les utilisateurs</option>
               <?php }  ?>
                </select>   
                            </div>
                           
                        </div>
                        <div  id="secteleve" class="form-group " style="margin-bottom:30px ;display:none"   > 

     <label for="name" class="col-md-4 control-label">Destinataire</label>
                          <div class="col-md-6">
                            <select  id="destinataire2" name="destinataire2" class="form-control"  >
                                                                <option value="0">Sélectionner..... </option>

                                                                @foreach($eleves as $eleve  )
                                                                    <option
                                                                            value="{{$eleve->id}}">{{$eleve->name.' '.$eleve->lastname}}</option>
                                                                @endforeach

                                                            </select>
      
 </div>
    </div> 
        <div  id="sectparent" class="form-group " style="margin-bottom:30px ;display:none"   > 

     <label for="name" class="col-md-4 control-label">Destinataire</label>
                          <div class="col-md-6">
                            <select  id="destinataire1" name="destinataire1" class="form-control"  >
                                                                <option value="0">Sélectionner..... </option>

                                                                @foreach($parents as $parent  )
                                                                    <option
                                                                            value="{{$parent->id}}">{{$parent->name.' '.$parent->lastname}}</option>
                                                                @endforeach

                                                            </select>
      
 </div>
    </div>
       <div  id="sectprof" class="form-group " style="margin-bottom:30px ;display:none"   > 

     <label for="name" class="col-md-4 control-label">Destinataire</label>
                          <div class="col-md-6">
                            <select  id="destinataire3" name="destinataire3" class="form-control"  >
                                                                <option value="0">Sélectionner..... </option>

                                                                @foreach($enseignants as $enseignant  )
                                                                    <option
                                                                            value="{{$enseignant->id}}">{{$enseignant->name.' '.$enseignant->lastname}}</option>
                                                                @endforeach

                                                            </select>
      
 </div>
    </div>
       <div  id="sectclasse" class="form-group " style="margin-bottom:30px ;display:none"   > 

     <label for="name" class="col-md-4 control-label">Destinataire</label>
                          <div class="col-md-6">
                            <select  id="destinataire4" name="destinataire4" class="form-control"  >
                                                                <option value="0">Sélectionner..... </option>

                                                                @foreach($classes as $classe  )
                                                                    <option
                                                                            value="{{$classe->id}}">{{$classe->titre}}</option>
                                                                @endforeach

                                                            </select>
      
 </div>
    </div>
    <div  id="secttousleseleves" class="form-group " style="margin-bottom:30px ;display:none"   > 

        <input  autocomplete="off"  id="destinataire5" type="hidden" class="form-control" name="destinataire5"   >
      
 </div>
    <div  id="secttouslesutilisateurs" class="form-group " style="margin-bottom:30px ;display:none"   > 

        <input  autocomplete="off"  id="destinataire6" type="hidden" class="form-control" name="destinataire6"   >
      
 </div>
  
 
      

                      <!--  <div class="form-group">
                            <label for="Role" class="col-md-4 control-label">Rôle</label>
                            <div class="col-md-6">
                                <select  name="user_type">
                                    <option value="user">Agent Simple</option>
                                    <option  value="disp">Dispatcheur</option>
                                    <option  value="superviseur">Superviseur</option>
                                </select>
                             </div>
                        </div>-->


                        <div class="form-group" style="margin-bottom:30px">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                               Ajouter
                                </button>
                            </div>
                        </div>
                    </form>




<style>
</style>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
function verif()
{
  var type = document.getElementById("type").value;
 if(type=="eleve")
{
document.getElementById('secteleve').style.display = 'block'; 
}
else
{
document.getElementById('secteleve').style.display = 'none'; 
}
 if(type=="parent")
{
document.getElementById('sectparent').style.display = 'block'; 
}
else
{
document.getElementById('sectparent').style.display = 'none'; 
}
if(type=="prof")
{
document.getElementById('sectprof').style.display = 'block'; 
}
else
{
document.getElementById('sectprof').style.display = 'none'; 
}
 if(type=="classe")
{
document.getElementById('sectclasse').style.display = 'block'; 
}
else
{
document.getElementById('sectclasse').style.display = 'none'; 
}
 if(type=="tousleseleves")
{
document.getElementById('secttousleseleves').style.display = 'block'; 
document.getElementById("destinataire5").value=1;


}
else
{
document.getElementById('secttousleseleves').style.display = 'none'; 
}
 if(type=="touslesutilisateurs")
{
document.getElementById('secttouslesutilisateurs').style.display = 'block'; 
document.getElementById("destinataire6").value=1;


}
else
{
document.getElementById('secttouslesutilisateurs').style.display = 'none'; 
}
}
</script>

 @endsection