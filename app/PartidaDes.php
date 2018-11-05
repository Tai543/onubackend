<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartidaDes extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'PartidaId', 'DescId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Id',
    ];

}
