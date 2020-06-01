@extends('layouts.back')
 
@section('content')

    <h3 style="margin-left:50px">Ajouter un document </h3><br><br>

     <form class="form-horizontal" method="POST" action="{{ route('excels.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
		<?php	  //ANNEE
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
                                <input  autocomplete="off"  id="chemin" type="file" class="form-control" name="chemin"  required accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >

                                
                            </div>
                        </div>
						
						   <div class="form-group " style="margin-bottom:30px;margin-left:10px">
                         <label for="name" class="col-md-4 control-label">Mois</label>
 					<select     class="form-control input"   name="mois" id="mois"    style="width:150px">
                        <option value="0"></option>
                        <option  value="1"  > Janvier  </option>
                        <option  value="2" > Février  </option>
                        <option  value="3"  > Mars  </option>
                        <option  value="4"  > Avril  </option>
                        <option  value="5"  > Mai  </option>
                        <option  value="6"  > Juin  </option>
                        <option  value="7" > Juillet  </option>
                        <option  value="8"  > Août  </option>
                        <option  value="9"  > Septembre  </option>
                        <option  value="10"  > Octobre  </option>
                        <option  value="11" > Novembre  </option>
                        <option  value="12"  > Décembre  </option>
                    </select>
                        </div>
                     
                         <div class="form-group " style="margin-bottom:30px">
                         <label for="name" class="col-md-4 control-label">Cible</label>
                          <div class="col-md-6">
                               <select name="type" id="type" class="form-control" onBlur="verif()" >
                              <option value="">--Sélectionnez--</option>
                             <option value="comptable">Comptable</option>
                          <option value="caisse">Caisse</option>
                         <option value="profs">Paie Enseignants</option>
                          <option value="eleves">Paie Elèves</option>
                            <option value="personnels">Paie Personnels</option>
							</select>
                            </div>
                           
                        </div>
                    

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


 

</script>

 @endsection