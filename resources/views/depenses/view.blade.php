
@extends('layouts.back')

 
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <label>Dépense</label>
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
            <form method="post" action="{{ route('depenses.store') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
			  
		  <input type="hidden" value="<?php echo $depense['id']; ?>" name="id"  >
	 		
                <div class="form-group">
                    <label for="libelle">Libellé:</label>
                    <input id="libelle" type="text" class="form-control" name="libelle"  value="<?php echo $depense['libelle']; ?>"/>
                </div>						
                <div class="form-group">
                    <label for="montant">Montant:</label>
                    <input id="montant" type="number" min="0" step="0.1" class="form-control" name="montant"   value="<?php echo $depense['montant']; ?>"/>
                </div>		
		 
				 <div class="form-group">
                    <label for="montant">Bénéficiaire:</label>
                    <input id="details" type="text" class="form-control" name="beneficiaire"   value="<?php echo $depense['beneficiaire']; ?>"/>
                </div>	
				
				 <div class="form-group">
                    <label for="montant">Détails:</label>
                    <input id="details" type="text" class="form-control" name="details"   value="<?php echo $depense['details']; ?>"/>
                </div>
				
				 <div class="form-group">
                    <label for="montant">Année:</label>
                    <input id="annee" type="number" min="2020"  class="form-control" name="annee"   value="<?php echo $depense['annee']; ?>"/>
                </div>	
			  
          <div class="form-group ">
      <button  type="submit"  class="btn btn-primary">Modifier</button>
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
