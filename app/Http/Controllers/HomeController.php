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
         return view('contenus.presentation' );
    } 

	public function contenu_scolaire()
    {
         return view('contenus.scolaire' );
    }

	public function contenu_formation()
    {
         return view('contenus.formation' );
    } 

	public function contenu_contact()
    {
         return view('contenus.contact' );
    } 

		public function contenu_inscription()
    {
         return view('contenus.inscription' );
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
