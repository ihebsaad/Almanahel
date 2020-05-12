<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Inscription extends Model

{
	
  protected $fillable = [
 'eleve',
 'nom',
 'prenom',
 'datenaissance',
 'etablissement',
 'type_etabliss',
 'niveau',
 'section',
 'frere',
 'moyenne_1',
 'moyenne_2',
 'moyenne_3',
 'moyenne_g',
 'clubs',
 'heure_12h',
 'heure_17h',
 'vendredi',
 'samedi',
 'dimanche',
 'civilite',
 'prenom_rep',
 'nom_rep',
 'ville',
 'tel',
 'tel2',
'email',
'valide'

 ];
 
}
