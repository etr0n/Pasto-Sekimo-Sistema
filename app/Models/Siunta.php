<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siunta extends Model
{
    protected $table ='siuntos';
    public $timestamps = false;

    protected $fillable = [
        'sekimo_nr', 
        'siuntejo_adresas',
        'siuntejo_tel_nr', 
        'gavejo_vardas', 
        'gavejo_pavarde',
        'gavejo_adresas',
        'gavejo_tel_nr',
        'gavejo_epastas',
        'busena_id',
        'ivykiulaikas_id',
        'user_id'
    ];

    public function busena()
    {
        // siunta belongsto busena
        return $this->belongsTo('App\Models\Busenos');
    }
    public function ivykiuLaikas()
    {
        // siunta belongsto ivykiulaikas
        return $this->belongsTo('App\Models\IvykiuLaikai', 'ivykiulaikas_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
