<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Caracteres', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Descripcion');
            $table->timestamps();
        });

        Schema::create('Personajes', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('NickPublico')->unique();
            $table->string('Nombre');
            $table->char('Genero');
            $table->integer('SkinMaterial')->unsigned();
            $table->integer('BagMaterial')->unsigned();
            $table->integer('HairCloth')->unsigned();
            $table->integer('HairMaterial')->unsigned();
            $table->integer('UpCloth')->unsigned();
            $table->integer('UpMaterial')->unsigned();
            $table->integer('LowCloth')->unsigned();
            $table->integer('LowMaterial')->unsigned();
            $table->integer('ShoeCloth')->unsigned();
            $table->integer('ShoeMaterial')->unsigned();
            $table->integer('UserId')->unsigned();
            $table->foreign('UserId')->references('id')->on('users');

            $table->timestamps();
        });

        Schema::create('Finales', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->timestamps();
        });

        Schema::create('Desiciones', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Descripcion');
            $table->timestamps();
        });

        Schema::create('Mensajes', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('PerOrigId')->unsigned();
            $table->foreign('PerOrigId')->references('Id')->on('Personajes');
            $table->integer('PerDesId')->unsigned();
            $table->foreign('PerDesId')->references('Id')->on('Personajes');
            $table->float('PosY');
            $table->float('PosX');
            $table->float('PosZ');
            $table->float('RotY');
            $table->string('Level');
            $table->boolean('FlgExterior');
            $table->boolean('FlgPrivado');
            $table->string('Contenido');
            $table->timestamps();
        });

        Schema::create('Items', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->boolean('FlgMon');
            $table->float('Precio');
            $table->timestamps();
        });

        Schema::create('ItemPersonajes', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('PerId')->unsigned();
            $table->foreign('PerId')->references('Id')->on('Personajes');
            $table->integer('ItemId')->unsigned();
            $table->foreign('ItemId')->references('Id')->on('Items');
            $table->integer('Cantidad')->unsigned();
            $table->timestamps();
        });

        Schema::create('AmigosPersonajes', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('PersOrigId')->unsigned();
            $table->foreign('PersOrigId')->references('Id')->on('Personajes');
            $table->integer('PersDesId')->unsigned();
            $table->foreign('PersDesId')->references('Id')->on('Personajes');
            $table->timestamps();
        });

        Schema::create('TipoReacciones', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Descripcion');
            $table->timestamps();
        });

        Schema::create('PersonaInfluyentes', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Descripcion');
            $table->timestamps();
        });
        Schema::create('ReaccionMensajes', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('PerId')->unsigned();
            $table->foreign('PerId')->references('Id')->on('Personajes');
            $table->integer('RecId')->unsigned();
            $table->foreign('RecId')->references('Id')->on('TipoReacciones');
            $table->integer('MsjId')->unsigned();
            $table->foreign('MsjId')->references('Id')->on('Mensajes');
            $table->timestamps();
        });
        Schema::create('Partidas', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('PerId')->unsigned();
            $table->foreign('PerId')->references('Id')->on('Personajes');
            $table->integer('InfluyenteId')->unsigned();
            $table->foreign('InfluyenteId')->references('Id')->on('PersonaInfluyentes');
            $table->integer('CartacterId')->unsigned();
            $table->foreign('CartacterId')->references('Id')->on('Caracteres');
            $table->boolean('FlgIni');
            $table->boolean('FlgFin');
            $table->string('Level');
            $table->timestamps();
        });

        Schema::create('PartidaDes', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('PartidaId')->unsigned();
            $table->foreign('PartidaId')->references('Id')->on('Partidas');
            $table->integer('DescId')->unsigned();
            $table->foreign('DescId')->references('Id')->on('Desiciones');
            $table->timestamps();
        });

        Schema::create('PartidaFinales', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('PartidaId')->unsigned();
            $table->foreign('PartidaId')->references('Id')->on('Partidas');
            $table->integer('FinalId')->unsigned();
            $table->foreign('FinalId')->references('Id')->on('Finales');
            $table->timestamps();
        });

        Schema::create('Cloths', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('ClothId')->unsigned();
            $table->integer('MaterialId')->unsigned();
            $table->timestamps();
        });

        Schema::create('PersonajeCloths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('PerId')->unsigned();
            $table->foreign('PerId')->references('Id')->on('Personajes');
            $table->integer('ClothId')->unsigned();
            $table->foreign('ClothId')->references('Id')->on('Cloths');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Caracters');
        Schema::dropIfExists('Personajes');
        Schema::dropIfExists('Finales');
        Schema::dropIfExists('Desiciones');
        Schema::dropIfExists('Mensajes');
        Schema::dropIfExists('Items');
        Schema::dropIfExists('ItemPersonajes');
        Schema::dropIfExists('AmigosPersonajes');
        Schema::dropIfExists('TipoReacciones');
        Schema::dropIfExists('PersonaInfluyentes');
        Schema::dropIfExists('ReaccionMensajes');
        Schema::dropIfExists('Partidas');
        Schema::dropIfExists('PartidaDes');
        Schema::dropIfExists('PartidaFinales');
        Schema::dropIfExists('Cloths');
        Schema::dropIfExists('PersonajeCloths');
    }

}
