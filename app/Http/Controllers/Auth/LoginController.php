<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->username = $this->findUsername();

    }

    public function findUsername()
    {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }
	
	  protected function authenticated(Request $request, $user)
    {
        /*if ( $user->isAdmin() ) {
            return redirect()->route('dashboard');
        }*/
    
	 
		$user = auth()->user();
        $iduser = $user->id;
        $type = $user->user_type;

		if ($type == 'prof') {
            return redirect('/espaceprofs');
		}
		if ($type == 'parent') {
            return redirect('/espaceparents');
		}		
		if ($type == 'eleve') {
            return redirect('/espaceeleves');
		}
		
		if ($type == 'financier') {
            return redirect('/admin');
		}
		
 		if ($type == 'conseil'  ) {
            return redirect('/admin');
		}
		
			if ($type == 'conseil'  ) {
            return redirect('/admin');
		}
		
			if ($type == 'suivi'  ) {
            return redirect('/admin');
		}
		
		 if ($type == 'membre'  ) {
            return redirect('/admin');
		}
		
			if ($type == 'admin'  ) {
            return redirect('/admin');
		}
 

	}


}
