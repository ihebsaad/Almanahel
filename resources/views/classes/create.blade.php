@extends('layouts.back')
  
@section('content')

    <h3 style="margin-left:50px">Créer une classe </h3><br><br>

                    <form class="form-horizontal" method="POST" action="{{ route('classes.saving') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                            <label for="titre" class="col-md-4 control-label">Nom de la classe</label>

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
                         <label for="name" class="col-md-4 control-label">Année</label>

                            <div class="col-md-6">
                                <input  autocomplete="off"  id="annee" type="number" placeholder="YYYY" min="2020" max="2800" class="form-control" name="annee"  required  >

                                
                            </div>
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
                                  Créer
                                </button>
                            </div>
                        </div>
                    </form>




<style>



</style>
 @endsection