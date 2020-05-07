<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageChat extends Model
{
	protected $table="messagechats" ;
     protected $fillable = [
        'to_user', 'from_user','message','status'
    ];
}
