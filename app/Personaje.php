<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    //
        //
        protected $fillable=[
            'NickPublico'
            ,'Nombre'
            ,'Genero'
            ,'SkinMaterial'
            ,'BagMaterial'
            ,'HairCloth'
            ,'HairMaterial'
            ,'UpCloth'
            ,'UpMaterial'
            ,'LowCloth'
            ,'LowMaterial'
            ,'ShoeCloth'
            ,'ShoeMaterial'
            ,'UserId',
        ];
        protected $hidden=[


        ];
}
