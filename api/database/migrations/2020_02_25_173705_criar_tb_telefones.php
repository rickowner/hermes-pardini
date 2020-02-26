<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTbTelefones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_telefones', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cadastro_id')->unsigned();

            $table->integer('telefone_principal');
            $table->integer('telefone_comercial');
            $table->integer('telefone_celular');
            $table->integer('telefone_residencial');
            $table->integer('telefone_recado1');
            $table->integer('telefone_recado2');

            $table->foreign('cadastro_id')
                ->references('id')->on('tb_cadastro')
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
        Schema::dropIfExists('tb_telefones');
    }
}
