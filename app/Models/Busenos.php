<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Busenos extends Model
{
    protected $table ='busenos';
    public $timestamps = false;

    protected $fillable = [
        'pavadinimas', 
    ];

    //create new relationship
    public function siuntos()
    {
        //busena belongsto siuntos
        return $this->belongsToMany('App\Models\Siunta');
    }
}
