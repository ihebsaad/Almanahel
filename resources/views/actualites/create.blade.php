
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
            <form method="post" action="{{ route('actualites.store') }}">
                <div class="form-group">
                     {{ csrf_field() }}
                    <label for="titre">Titre:</label>
                    <input id="titre" type="text" class="form-control" name="titre"/>
                </div>
                <div class="form-group">
                    <label for="type">Contenu :</label>
                    <input id="contenu" type="text" class="form-control" name="contenu"/>
                </div>


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
