<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_utente');
            $table->string('nome')->nullable();
            $table->string('apelido')->nullable();
            $table->string('idade')->nullable();
            $table->string('genero')->nullable();
            $table->boolean('anonimo')->default(0);
            $table->string('idioma')->nullable();
            $table->string('cell1')->nullable();
            $table->string('cell2')->nullable();
//            $table->string('cell3')->nullable();
            $table->string('conhecer_linha')->nullable();
            $table->string('descricao_local')->nullable();
//            $table->string('bi')->nullable();
//            $table->string('descricao_utente')->nullable();
            $table->string('situacao_educacional')->nullable();
            $table->string('vive_com')->nullable();
            $table->string('relacao_vitima')->nullable();
//            $table->string('descricao_extendida')->nullable();
            $table->integer('provincia_id')->unsigned()->nullable();
            $table->foreign('provincia_id')->references('id')->on('provincias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('distrito_id')->unsigned()->nullable();
            $table->foreign('distrito_id')->references('id')->on('distritos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('localidade_id')->unsigned()->nullable();
            $table->foreign('localidade_id')->references('id')->on('localidades')
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
        Schema::dropIfExists('utentes');
    }
}
