<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastoSkyrius extends Model
{
    protected $table ='pasto_skyrius';
    public $timestamps = false;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pavadinimas', 'adresas','miestas', 'el_paštas',
    ];
}
