
@extends('layouts.back')
 
 @section('content')

 <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Direction et Scoalrité</div>
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

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Direction Financière</div>
                      <div class="  "></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Suivi Pédagogique</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> </div>
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

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Conseil de pilotage</div>
                      <div class="  "></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
 
 
 
 
@endsection
