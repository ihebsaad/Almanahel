<?php

namespace App\Http\Controllers;

 
use App\User;
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
	 

    public function presentaion()
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
	 
	  
}
