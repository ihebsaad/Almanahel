<?php

namespace App\Http\Controllers;

 
use App\User;
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
         return view('contenus.home' );
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
	  
	  
		public function updatecontent(Request $request)
    {

        $zone= strval($request->get('zone'));
        $val= $request->get('val');
        Contenu::where('zone', $zone)->update(array('contenu' => $val));


 
    }
	  
}
