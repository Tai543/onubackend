<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNickname extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('Personajes', function (Blueprint $table)
        {
            $table->dropColumn('NickPublico');
            $table->dropColumn('Nombre');
        });

        Schema::table('Mensajes', function (Blueprint $table)
        {
            $table->integer('UsrOrigId')->unsigned();
            $table->foreign('UsrOrigId')->references('Id')->on('users');
            $table->integer('UsrDesId')->unsigned();
            $table->foreign('UsrDesId')->references('Id')->on('users');
        });

        Schema::table('Mensajes', function (Blueprint $table)
        {

            $table->dropForeign('[PerOrigId]');
            $table->dropForeign('[PerDesId]');
            $table->dropColumn('PerOrigId');
            $table->dropColumn('PerDesId');
        });


        Schema::dropIfExists('PersonajeCloths');

        Schema::create('UsrCloths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('UsrId')->unsigned();
            $table->foreign('UsrId')->references('Id')->on('users');
            $table->integer('ClothId')->unsigned();
            $table->foreign('ClothId')->references('Id')->on('Cloths');
            $table->timestamps();
        });

        Schema::create('Desiciones', function (Blueprint $table) {
           $table->string('Color');
        });


        Schema::table('ReaccionMensajes', function (Blueprint $table) {

            $table->dropForeign('[PerId]');
            $table->dropColumn('PerId');


        });


        Schema::table('ReaccionMensajes', function (Blueprint $table) {
            $table->integer('UsrId')->unsigned();
            $table->foreign('UsrId')->references('Id')->on('users');
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
        Schema::table('Personajes', function (Blueprint $table)
        {
            $table->dropColumn('NickPublico');
            $table->dropColumn('Nombre');
        });
        Schema::table('Mensajes', function (Blueprint $table)
        {
            $table->dropColumn('PerOrigId');
            $table->dropColumn('PerDesId');
            $table->dropForeign('[PerOrigId]');
            $table->dropForeign('[PerDesId]');
        });
    }
}
