<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    protected $fillable = [
        'PerOrigId',
        'PerDesId',
        'PosY',
        'PosX',
        'PosZ',
        'RotY',
        'Level',
        'FlgExterior',
        'FlgPrivado',
        'Contenido',

    ];
    protected $hidden=[

    ];
}
