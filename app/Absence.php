<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Actualite extends Model

{
	
  protected $fillable = [
 'eleve',
 'classe',
 'debut',
 'fin',
 'seance',
 'details',
 ];
 
}
