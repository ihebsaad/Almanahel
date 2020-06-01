<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Evenement extends Model

{
	
  protected $fillable = [
 'titre',
 'description',
 'debut',
 'fin',
 'type',
 'visible',
 'heure_debut',
 'heure_fin',
 
 ];
 
}
