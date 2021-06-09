<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

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
    Session::put('parent', 'false');
	 
		$user = auth()->user();
        $iduser = $user->id;
        $type = $user->user_type;
        $isparent=$user->isparent;

		if ($type == 'prof' && $isparent !== 1) {
            return redirect('/espaceprofs');
		}
		if ($type == 'parent' ) {
            return redirect('/espaceparents');
		}		
		if ($type == 'eleve') {
            return redirect('/espaceeleves');
		}
		
		if ($type == 'financier'  && $isparent !== 1) {
            return redirect('/admin');
		}
		
 		if ($type == 'conseil'  && $isparent !== 1 ) {
            return redirect('/admin');
		}
		
			if ($type == 'conseil'   && $isparent !== 1 ) {
            return redirect('/admin');
		}
		
			if ($type == 'suivi'  && $isparent !== 1 ) {
            return redirect('/admin');
		}
		
		 if ($type == 'membre'  && $isparent !== 1 ) {
            return redirect('/admin');
		}
		
			if ($type == 'admin'  && $isparent !== 1 ) {
            return redirect('/admin');
		}
 if ($type == 'prof' && $isparent === 1) {
            return redirect('/espacechoix');
        }
        
        
        if ($type == 'financier' && $isparent === 1) {
            return redirect('/espacechoix');
        }
        
        if ($type == 'conseil' && $isparent === 1  ) {
            return redirect('/espacechoix');
        }
        
            if ($type == 'conseil'  && $isparent === 1) {
            return redirect('/espacechoix');
        }
        
            if ($type == 'suivi'  && $isparent === 1) {
            return redirect('/espacechoix');
        }
        
         if ($type == 'membre' && $isparent === 1 ) {
            return redirect('/espacechoix');
        }
        
            if ($type == 'admin' && $isparent === 1  ) {
            return redirect('/espacechoix');
        }

	}


}
