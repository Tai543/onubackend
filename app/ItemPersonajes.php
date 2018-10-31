<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPersonajes extends Model
{
    //
    protected $fillable = [
        'PerId',
        'ItemId',
        'Cantidad',
    ];
}
