
@extends('layouts.back')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Ajouter
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
            <form method="post" action="{{ route('actualites.store') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
                <div class="form-group">
                    <label for="titre">Image:</label>
                    <input id="image" type="file" class="form-control" name="image"/>
                </div>
                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input id="titre" type="text" class="form-control" name="titre"/>
                </div>				
				<div class="form-group ">
                    <label for="contenu">Contenu:</label>
                    <div class="editor" >
                        <textarea style="min-height: 380px;"  id="home" type="text"  class="textarea tex-com" placeholder="Contenu ici" name="contenu" required  ></textarea>
                    </div>
				</div>

    <label class="check "> <input type="checkbox" name="visible"  valuue="1" checked/> Visilble</label>
                <button  type="submit"  class="btn btn-primary">Ajouter</button>
             <!--   <button id="add"  class="btn btn-primary">Ajax Add</button>-->
            </form>
        </div>
    </div>
@endsection


 

<script>
    $(document).ready(function(){

        $('#add').click(function(){
            var nom = $('#nom').val();
            var typepres = $('#typepres').val();
             if ((titre != '') )
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('actualites.saving') }}",
                    method:"POST",
                    data:{nom:nom,type:type, _token:_token},
                    success:function(data){
                        alert('ajouté !');

                    }
                });
            }else{
                alert('ERROR');
            }
        });




    });
</script>
