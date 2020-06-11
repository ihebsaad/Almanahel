
@extends('layouts.back')
 
 @section('content')

<?php
$user_type='';
if (Auth::check()) {

$user = auth()->user();
 $iduser=$user->id;
$user_type=$user->user_type;
} 
 
 if ($user_type =='parent'  ){

 ?>
 <H2>Espace Enseignants</h2>
 <div class="row">
 
            <!-- Earnings (Monthly) Card Example  
            <div class="col-xl-6 col-md-6 mb-6"  style="margin-bottom:25px" >
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vie Scolaire</div>
                      <div class="  "><a  href="{{route('absences')}}">Absences</a> </div>
                      <div class="  "><a  href="{{route('retards')}}">Retards</a> </div>
                       
					 </div>
                    <div class="col-auto">
                      <i class="fas fa-school fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> --->
<?php   ?>

 
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:25px" >
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px"  class="text-xs font-weight-bold text-success text-uppercase mb-1">Communication</div>
                      <div class="  "><a  href="{{route('docsrecu')}}">Documents reçus</a> </div>
                      <div class="  "><a  href="{{route('docsenv')}}">Documents Envoyés</a> </div>
                       <div class="  "><a  href="{{route('message')}}">Chat</a> </div>
                     </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
   </div>
 
 
 	  
<?php }
 ?>
@endsection
