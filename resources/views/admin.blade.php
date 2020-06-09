
@extends('layouts.back')
 
 @section('content')

<?php
$user_type='';
if (Auth::check()) {

$user = auth()->user();
 $iduser=$user->id;
$user_type=$user->user_type;
} 
 
 if ($user_type!='eleve' && $user_type!='parent' && $user_type!='prof'){

 ?>
 <div class="row">
<?php  if ($user_type=='admin' ||   $user_type=='membre'   || $user->direction==1    ){ ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"  style="margin-bottom:15px" >
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:15px" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Direction et Scoalrité</div>
                      <div class=" "><a href="{{route('contenupresentation')}}">Contenu page Inscription</a> </div>
                      <div class=" "><a href="{{route('contenuscolaire')}}">Contenu page vie scolaire</a> </div>                     
					 <div class=" "><a   href="{{route('eleves')}}">Elèves</a> </div>
                      <div class=" "><a   href="{{route('profs')}}">Enseignants</a> </div>
                      <div class=""><a  href="{{route('parents')}}">Parents</a> </div>
                      <div class="  "><a  href="{{route('classes')}}">Classes</a> </div>
                      <div class="  "><a  href="{{route('inscriptionsv')}}">Inscriptions</a> </div>
                      <div class="  "><a  href="{{route('inscriptions')}}">Pré-inscriptions</a> </div>
                      <div class="  "><a  href="{{route('absences')}}">absences</a> </div>
                      <div class="  "><a  href="{{route('retards')}}">retards</a> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php } 
   if ($user_type=='admin' ||   $user_type=='financier'   || $user->finances==1    ){ ?>

 
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:15px" >
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:15px"  class="text-xs font-weight-bold text-success text-uppercase mb-1">Direction Financière</div>
                      <div class="  "><a  href="{{route('paiements')}}">Paiements</a> </div>
                      <div class="  "><a  href="{{route('depenses')}}">Dépenses</a> </div>
                      <div class="  "><a  href="{{route('excels')}}">Excels</a> </div>
                      <div class="  "><a  href="{{route('excels.create')}}">Ajouter un Excel</a> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
   <?php  }  
   if ($user_type=='admin' ||   $user_type=='suivi'   || $user->suivi==1    ){ ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:15px" >
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:15px"  class="text-xs font-weight-bold text-info text-uppercase mb-1">Suivi Pédagogique</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                      <div class="  "><a  href="{{route('contenuhome')}}">Contenu page Accueil</a> </div>
                      <div class="  "><a  href="{{route('contenupresentation')}}">Contenu page Présentation </a> </div>
                      <div class="  "><a  href="{{route('contenuformation')}}">Contenu page Formation</a> </div>
                      <div class="  "><a  href="{{route('contenucontact')}}">Contenu page contact</a> </div>
                      <div class="  "><a  href="{{route('evenements')}}">Evénements</a> </div>
                      <div class="  "><a  href="{{route('actualites')}}">Actualités</a> </div>
                      <div class="  "><a  href="{{route('annonces')}}">Annonces</a> </div>
                        </div>
                  
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
   <?php }
   if ($user_type=='admin' ||   $user_type=='conseil'   || $user->conseil==1    ){ ?>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:15px" >
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:15px"  class="text-xs font-weight-bold text-warning text-uppercase mb-1">Conseil de pilotage</div>
					  <div class="  "><a  href="{{route('paiements')}}">Paiements</a> </div>
                      <div class="  "><a  href="{{route('depenses')}}">Dépenses</a> </div>
                      <div class="  "><a  href="{{route('excels')}}">Excels</a> </div>
                      <div class="  "><a  href="{{route('excels.create')}}">Ajouter un Excel</a> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			
	   <?php }
		
		?>	
			
          </div>
 
 
 	  
<?php }
 ?>
@endsection
