<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Depense extends Model

{
	
  protected $fillable = [
  'montant',
 'libelle',
  'details',
  'annee'
 ];
 
}
