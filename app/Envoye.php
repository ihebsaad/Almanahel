<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Envoye extends Model

{
	
  protected $fillable = [
 'emetteur',
 'destinataire',
 'sujet',
 'contenu',
  ];
 
}
