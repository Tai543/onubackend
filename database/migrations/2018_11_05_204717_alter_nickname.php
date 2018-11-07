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
        //
        $table->integer('UsrOrigId')->unsigned();
        $table->foreign('UsrOrigId')->references('Id')->on('Personajes');
        $table->integer('UsrDesId')->unsigned();
        $table->foreign('UsrDesId')->references('Id')->on('Personajes');
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
