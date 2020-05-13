<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Document extends Model

{
	
  protected $fillable = [
 'titre',
  'description',
 'emetteur',
 'destinataire',
 'taille'
 ];
 
}
