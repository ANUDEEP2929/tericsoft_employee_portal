<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentUser extends Model
{
  	protected $hidden = [
        'created_at', 'updated_at','group_id',
    ];
     public function users()
    {
    return 	$this->belongsTo('App\User', 'user_id', 'id');
    }
}
