<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	// pour les image slider ou n importe quel type d images
    protected $table="images";

    protected $fillable = [
       'numero','titre', 'descrip','url','type','visible','categorie','home'
    ];

    //
}
