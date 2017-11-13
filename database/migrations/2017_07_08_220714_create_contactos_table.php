<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_contacto');
            $table->string('estado_contacto')->nullable();
//            $table->boolean('anonimo')->default(0);
            $table->string('desc_antecedentes')->nullable();
            $table->string('resumo_contacto');
            $table->string('impressao_atendente');
            $table->integer('motivo_id')->unsigned();
            $table->foreign('motivo_id')->references('id')->on('motivos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('tipo_motivo_id')->unsigned();
            $table->foreign('tipo_motivo_id')->references('id')->on('tipo_motivo')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('caso_id')->unsigned()->nullable();
            $table->foreign('caso_id')->references('id')->on('casos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('contactos');
    }
}
