<?php

namespace App;

 use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'statut','lastname','observation','user_type' ,'username','remarques','tel','adresse','niveau'
		,'naissance','paiements','totalepaiements','absences','retards' 
		,'admin','finances','conseil','suivi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

 
 
 
   
   

    public function isOnline()
    {
        return Cache::has('user-online-'.$this->id);
    }
}
