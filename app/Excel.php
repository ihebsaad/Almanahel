<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Excel extends Model

{
	
  protected $fillable = [
 'titre',
  'chemin',
  'emetteur',
  'type',
  'mois',
  'annee',
 // 'taille',
 //'parent'
 ];
 
}
