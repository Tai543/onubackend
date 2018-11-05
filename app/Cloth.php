<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    protected $fillable = [
        'ClothId',
        'MaterialId',
    ];
    protected $hidden=[
        'Id',
    ];
}
