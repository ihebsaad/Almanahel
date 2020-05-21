<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Paiement extends Model

{
	
  protected $fillable = [
 'eleve',
 'montant',
 'libelle',
  'details',
  'annee'
 ];
 
}
