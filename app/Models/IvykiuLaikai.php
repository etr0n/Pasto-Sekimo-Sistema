<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IvykiuLaikai extends Model
{
    protected $table ='ivykiu_laikai';
    public $timestamps = false;

    protected $fillable = [
       'data_paimta',
       'data_siunciama',
       'data_ivykdyta',
       'data_atsiimta',
       'data_paimta',
    ];

       //create new relationship
       public function siuntos()
       {
           //ivykiulaikas belongstomany siuntos
           return $this->belongsToMany('App\Models\Siunta');
       }
}
