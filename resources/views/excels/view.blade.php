@extends('layouts.back')
 
@section('content')

    <h3 style="margin-left:50px">Modifier le fichier excel </h3><br><br>

     <form class="form-horizontal" method="POST" action="{{ route('excels.edit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
		 			   <input id="id" type="hidden" class="form-control" name="id"  value="<?php  echo $excel['id'];?>"/>

                        <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                            <label for="titre" class="col-md-4 control-label">Titre</label>

                            <div class="col-md-6">
                                <input  autocomplete="off"  id="titre" type="text" class="form-control" name="titre" value=" <?php echo $excel['titre'] ;?>"   autofocus>

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
                                <input  autocomplete="off"  id="chemin" type="file" class="form-control" name="chemin"  required   accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >
 
                                         <a class="form-control" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/storage/excels/<?php echo $excel['chemin'];?>" > 
           <span class="fa fa-fw fa-download-alt"></span> <?php echo $excel['chemin'];?>
			</a>
                            </div>
                        </div>
						<?php $mois= $excel['mois']; ?>
						   <div class="form-group " style="margin-bottom:30px;margin-left:10px;">
                         <label for="name" class="col-md-4 control-label">Mois</label><br>
 				 
			<?php	$mois=$excel['mois'];$Mois='';
				if($mois==1){$Mois="Janvier";} if($mois==7){$Mois="Juillet";}
				if($mois==2){$Mois="Février";} if($mois==8){$Mois="Août";}
				if($mois==3){$Mois="Mars";} if($mois==9){$Mois="Septembre";}
				if($mois==4){$Mois="Avril";} if($mois==10){$Mois="Octobre";}
				if($mois==5){$Mois="Mai";} if($mois==11){$Mois="Novembre";}
				if($mois==6){$Mois="Juin";} if($mois==12){$Mois="Décembre";}   ?>
				 <label style="font-weight:blod"  class="col-md-4 control-label"><?php echo $Mois;?></label>

                        </div>
                    	<?php $type= $excel['type']; ?>

                         <div class="form-group " style="margin-bottom:30px">
                         <label for="name" class="col-md-4 control-label">Type</label>
                          <div class="col-md-6">
                               <select name="type" id="type" class="form-control"   >
                              <option value="">--Sélectionnez--</option>
                             <option  <?php if($type=='comptable'){echo 'selected="selected"';}?> value="comptable">Comptable</option>
                          <option <?php if($type=='caisse'){echo 'selected="selected"';}?> value="caisse">Caisse</option>
                         <option <?php if($type=='profs'){echo 'selected="selected"';}?> value="profs">Paie Enseignants</option>
                          <option <?php if($type=='eleves'){echo 'selected="selected"';}?> value="eleves">Paie Elèves</option>
                            <option <?php if($type=='personnels'){echo 'selected="selected"';}?> value="personnels">Paie Personnels</option>
							</select>
                            </div>
                           
                        </div>
                    

                        <div class="form-group" style="margin-bottom:30px">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                               Modifier
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