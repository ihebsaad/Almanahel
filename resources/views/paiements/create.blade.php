
@extends('layouts.back')

 
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <label>Ajouter</label>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('paiements.store') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
			  
						<?php	  //ANNEE
		$year=date('Y');$month=date('m');
		$mois=intval($month);
		$annee=intval($year);
		if($mois > 9 ){$annee=$annee-1;}
		?>
			   <input id="annee" type="hidden" class="form-control" name="annee"  value="<?php echo $annee;?>"/>

                <div class="form-group">
                    <label for="eleve">Elève:</label>
                    <select id="eleve" type="number" class="form-control  " name="eleve"  style="height:38px;padding:" >
					<option></option>
					<?php $eleves= \App\User::where('user_type','eleve')->get(); 
						foreach($eleves as $el)
						{
 						echo ' <option   value="'.$el->id.'">'.$el->name. ' '.$el->lastname.'</option>';
	
						}
					?>
					</select>
                </div>		
                <div class="form-group">
                    <label for="libelle">Libellé:</label>
                    <input id="libelle" type="text" class="form-control" name="libelle"/>
                </div>						
                <div class="form-group">
                    <label for="montant">Montant:</label>
                    <input id="montant" type="number" min="0" step="0.1" class="form-control" name="montant"/>
                </div>		
		 
				 <div class="form-group">
                    <label for="montant">Détails:</label>
                    <input id="details" type="text" class="form-control" name="details"/>
                </div>
				
				 
			  
          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Ajouter</button>
  			 </div>

             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
        </div>
    </div>
@endsection
 

@section('footer_scripts')
 
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
 

$(function () {
	
 		
$('.select2').select2({
filter: true,
language: {
noResults: function () {
return 'Pas de résultats';
}
}

});
  
});

</script>

 
@endsection
