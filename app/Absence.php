<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Absence extends Model

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
