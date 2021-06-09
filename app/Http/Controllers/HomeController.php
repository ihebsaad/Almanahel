<?php

namespace App\Http\Controllers;

 
use App\User;
use App\Annonce;
use App\Actualite;
use App\Contenu;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
  


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

 
    public function index()
    {
         return view('index' );
    }
	 

    public function home()
    {
         return view('home' );
    }
	 

    public function scolaire()
    {
         return view('scolaire' );
    }
	 

    public function inscription()
    {
         return view('inscription' );
    }
    
    public function bienvenue()
    {
         return view('bienvenue' );
    }
	
    public function presentation()
    {
         return view('presentation' );
    }
	 

    public function formation()
    {
         return view('formation' );
    }
	 	 
	public function contact()
    {
         return view('contact' );
    } 

	public function resultats()
    {
         return view('resultats' );
    } 

	public function alumni()
    {
         return view('alumni' );
    } 
	
		public function mot()
    {
         return view('mot' );
    } 
	
	
		public function sections()
    {
         return view('sections' );
    } 
	
	
		public function admin()
    {
			if (Auth::check()) {
		$user = auth()->user();
         $type = $user->user_type;
		}
		
		if (Auth::guest()) {
		return redirect('login');
		}else{
		 if( $type == 'eleve' || $type == 'parent' || $type == 'prof' )	
		 {
		 return view('home' );
		 }else{
		  return view('admin' );
		 }
		 
 		}
    }
	
	
	 public function parents()
    {
		
		if (Auth::check()) {
		$user = auth()->user();
         $type = $user->user_type;
         $isparent=$user->isparent;
		}
		if (Auth::guest()) {
		return redirect('login');
		}else{
			
		if( $type== 'parent' || $isparent==1)	
		{return view('parents' );}
			else{
			return view('home' );
			}
  
		}
    }
	 public function espacechoix()
    {
		
		if (Auth::check()) {
		$user = auth()->user();
         $type = $user->user_type;
		}
		if (Auth::guest()) {
		return redirect('login');
		}else{
			
		return view('auth.espacechoix' );}
			
  
		
    }
	
	
	 public function eleves()
    {
			if (Auth::check()) {
		$user = auth()->user();
         $type = $user->user_type;
		}
		if (Auth::guest()) {
		return redirect('login');
		}else{
			
		if( $type== 'eleve'  )	
		{return view('eleves' );}
			else{
			return view('home' );
			}
  
		}
    }	
	
		
	 public function profs()
    {
				if (Auth::check()) {
		$user = auth()->user();
         $type = $user->user_type;
         $isparent=$user->isparent;
		}
		
		if (Auth::guest()) {
		return redirect('login');
		}else{
			
		if( $type== 'prof')	
		{return view('profs' );}
			else{
			return view('home' );
			}
  
		}
    }
	
	
	public function contenu_home()
    {
		if (Auth::guest()) {
		return redirect('login');
		}else{
	  return view('contenus.home' );
		}
    } 

	public function contenu_presentation()
    {
	if (Auth::guest()) {
		return redirect('login');
		}else{
	  return view('contenus.presentation' );
		}		
     } 

	public function contenu_scolaire()
    {
	if (Auth::guest()) {
		return redirect('login');
		}else{
	  return view('contenus.scolaire' );
		}		
     } 		
        

	public function contenu_formation()
    {
	if (Auth::guest()) {
		return redirect('login');
		}else{
	  return view('contenus.formation' );
		}		
     }         

	public function contenu_contact()
    {
	if (Auth::guest()) {
		return redirect('login');
		}else{
	  return view('contenus.contact' );
		}		
     }  


	public function contenu_resultats()
    {
	if (Auth::guest()) {
		return redirect('login');
		}else{
	  return view('contenus.resultats' );
		}		
     }  

   	public function contenu_alumni()
    {
	if (Auth::guest()) {
		return redirect('login');
		}else{
	  return view('contenus.alumni' );
		}		
     }    

		public function contenu_inscription()
    {
 	if (Auth::guest()) {
		return redirect('login');
		}else{
	  return view('contenus.inscription' );
		}		
     }         

 	  
	  
	  
	 	public function show_actualite($id)
    { 	
		$actualite= Actualite::where('id',$id)->first();

		if(isset($actualite)){
        if($actualite->visible==1){  return view('actualites.show',['actualite'=>$actualite] );}else{return view('home' );;}
   		}else{return view('home' );   }

   }

		public function show_annonce($id)
    {
		 $annonce= Annonce::where('id',$id)->first();
         if(isset($annonce)){
			 if( $annonce->visible==1){return view('annonces.show',['annonce'=>$annonce] );}else{return view('home' );;}
		}else{return view('home' );   }
   }
		public function updatecontent(Request $request)
    {

        $zone= strval($request->get('zone'));
        $val= $request->get('val');
        Contenu::where('zone', $zone)->update(array('contenu' => $val));


 
    }
	  
}
