<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    //create new relationship
    public function users()
    {
        //role belongstomany users
        return $this->belongsToMany('App\Models\User');
    }
}
