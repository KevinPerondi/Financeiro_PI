<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensalidades', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_membro')->unsigned();
            $table->foreign('id_membro')->references('id')->on('users');
            //$table->string('nome_membro');
            $table->float('valor');
            $table->string('vencimento');
            $table->string('status');
            $table->timestamps();
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mensalidades');
    }
}
