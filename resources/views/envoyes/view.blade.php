
@extends('layouts.back')

 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

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
            <form method="post" action="{{ route('envoyes.sending') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
			 
			 <?php use \App\Http\Controllers\UsersController;
  

    ?>
           <div class="form-group">
                    <label for="destinataire">Emetteur:</label>
                    <input id="destinataire" type="text" class="form-control" name="destinataire"  <?php echo $envoye['emetteur'] ;?>/>
                </div>	
                <div class="form-group">
                    <label for="destinataire">Destinataire:</label>
                    <input id="destinataire" type="text" class="form-control" name="destinataire"  <?php echo $envoye['destinataire'] ;?>/>
                </div>						
               
			 <div class="form-group">
                    <label for="sujet">Sujet:</label>
                    <input id="sujet" type="text" class="form-control" name="sujet"  value="<?php echo $envoye['sujet'];?>"/>
             </div>	
				<div class="form-group ">
                    <label for="contenu">Contenu:</label>
                    <section>  
					<div style="padding:20px 20px 20px 20px; " clas="form-control">
					<?php echo nl2br($envoye['contenu'] ); ?>
					</div>
                    </section>
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


<style>
 
</style>

@endsection
