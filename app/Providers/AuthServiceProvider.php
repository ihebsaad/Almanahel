<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
		 
		 $gate->define('isAdmin', function ($user){
            return $user->user_type=='admin';
        });

        $gate->define('isParent', function ($user){
            return $user->user_type=='parent';
        });

        $gate->define('isEleve', function ($user){
            return $user->user_type=='eleve';
        });

		$gate->define('isProf', function ($user){
            return $user->user_type=='prof';
        });

        $gate->define('isFinancier', function ($user){
            return $user->user_type=='financier'   ;
        });
    }
}
