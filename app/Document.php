<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Document extends Model

{
	
  protected $fillable = [
 'titre',
  'chemin',
  'description',
 'emetteur',
  'type',
 'destinataire',
  'envoye',
 'taille',
 'parent',
 'annee'
 ];
 
}
