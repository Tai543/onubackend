<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReaccionMensaje extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PerId','RecId','MsjId',
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
