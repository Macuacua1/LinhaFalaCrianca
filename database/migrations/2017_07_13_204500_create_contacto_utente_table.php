<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoUtenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_utente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contacto_id')->unsigned()->nullable();
            $table->foreign('contacto_id')->references('id')->on('contactos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('utente_id')->unsigned()->nullable();
            $table->foreign('utente_id')->references('id')->on('utentes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('contacto_utente');
    }
}
