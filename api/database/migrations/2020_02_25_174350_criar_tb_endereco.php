<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTbEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cadastro_id')->unsigned();

            $table->string('cep', 8);
            $table->string('endereco',80);
            $table->integer('numero');

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
        Schema::dropIfExists('tb_endereco');
    }
}
