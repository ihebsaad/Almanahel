@extends('layouts.back')

 @section('content')  
<?php
if (Auth::check()) {

$cuser = auth()->user();
 $iduser=$cuser->id;
$user_type=$cuser->user_type;
} 
?>
    <h3 style="margin-left:50px">Créer un nouveau utilisateur</h3><br><br>

                    <form class="form-horizontal" method="POST" action="{{ route('users.saving') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input  autocomplete="off"  id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Prénom</label>

                            <div class="col-md-6">
                                <input  autocomplete="off"  id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required  >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group row">
                            <label for="username" class="col-md-4 control-label">Identifiant</label>

                            <div class="col-md-6">

                                <input  autocomplete="off"  id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required  >


                            @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                         <strong>{{ $errors->first('username') }}</strong>
                               </span>
                                @endif
                            </div>
                        </div>



                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input  autocomplete="off"   id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="row form-group ">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input  autocomplete="off"   id="email" type="email" class="form-control" name="email"  >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="row form-group " style="margin-bottom:30px">
                            <label for="type" class="col-md-4 control-label">Qualification</label>

                            <div class="col-md-6">
                                <select  name="user_type"  id="type" class="form-control"  >
                                    <option value="eleve">Élève</option>
                                    <option value="prof"   >Enseignant</option>
                                    <option  value="parent"   >Parent</option>
                                    <option  value="financier"   >Direction Financière</option>
                                    <option  value="membre"    >Membre d'administration</option>
                                    <option  value="conseil"    >Conseil de pilotage</option>
                                    <option  value="suivi"    >Suivi pédagogique</option>
                        <?php if($user_type=='admin'){?> 
						<option  value="admin"    >Super Administrateur</option>
						<?php } ?>
                                  
                                </select>

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


                        <div class="row form-group" style="margin-bottom:30px">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>




<style>



</style>

@endsection 