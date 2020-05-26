<?php
$user_type='';
if (Auth::check()) {

$user = auth()->user();
 $iduser=$user->id;
$user_type=$user->user_type;
}
?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <!--<div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>-->
        <div class="sidebar-brand-text mx-3"><sup><small>academy</small></sup>Al Manahel </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link"  href="{{route('home')}}">
          <i class="fas fa-fw fa-home"></i>
          <span>Acueil</span></a>
      </li>
<?php  if ($user_type=='admin' || $user_type=='membre' ){?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Contenu du site</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
             <a class="collapse-item" href="{{route('contenuhome')}}">Accueil</a>
            <a class="collapse-item" href="{{route('contenupresentation')}}">Presentation</a>
            <a class="collapse-item" href="{{route('contenuscolaire')}}">Vie Scolaire</a>
            <a class="collapse-item" href="{{route('contenuinscription')}}">Inscription</a>
            <a class="collapse-item" href="{{route('contenucontact')}}">Contact</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Nouveautés</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('evenements')}}">Evénements</a>
            <a class="collapse-item" href="{{route('actualites')}}">Actualités</a>
            <a class="collapse-item" href="{{route('annonces')}}">Annonces</a>
           </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Utilisateurs
      </div>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree"   aria-controls="collapsethree">
          <i class="fas fa-fw fa-users"></i>
          <span>Membres</span>
        </a>
        <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('personnels')}}">Administration</a>
			<a class="collapse-item" href="{{route('eleves')}}">Elèves</a>
            <a class="collapse-item" href="{{route('profs')}}">Enseignants</a>
            <a class="collapse-item" href="{{route('parents')}}">Parents</a>
            <a class="collapse-item" href="{{route('classes')}}">Classes</a>
          </div>
        </div>
      </li>
	  
<?php } ?>

	<?php  if ($user_type=='admin' || $user_type=='membre' || $user_type=='parent' ){ ?>
	  
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item ">
      <!--  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">-->
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" >
          <i class="fas fa-fw fa-wrench"></i>
          <span>Vie Scolaire</span>
        </a>
        <div id="collapsePages" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
<?php  if ( ! ($user_type=='parent') ) { ?> 
            <a class="collapse-item" href="{{route('inscriptions')}}">Inscriptions</a>
			<a class="collapse-item" href="{{route('paiements')}}">Paiements</a> 
<?php } ?> 
            <a class="collapse-item" href="{{route('absences')}}">Absences</a>
            <a class="collapse-item" href="{{route('retards')}}">Retards</a>
           </div>
        </div>
      </li>
	

	<?php } if ($user_type=='admin' || $user_type=='financier' ){?>

	  <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item ">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
          <i class="fas fa-fw fa-folder"></i>
          <span>Finances</span>
        </a>
        <div id="collapse3" class="collapse " aria-labelledby="collapse3" data-parent="#accordionSidebar"><!--collapse show-->
          <div class="bg-white py-2 collapse-inner rounded">
		   <a class="collapse-item" href="{{route('paiements')}}">Paiements</a>
            <a class="collapse-item" href="{{route('depenses')}}">Dépenses</a>
               
		  </div>
        </div>
      </li>

	<?php }  ?>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href=" ">
          <i class="fas fa-fw fa-folder-open"></i>
          <span>Documetnts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('envoyes')}}">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Emails</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->