<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartidaFinal extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Id', 'PartidaId', 'FinalId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
