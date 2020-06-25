<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFretadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fretados', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj')->unique();
            $table->string('nome_empresa');
            $table->string('nome_solicitante');
            $table->string('solicitante_cpf');
            $table->string('solicitante_email');
            $table->string('partida_endereco');
            $table->string('partida_cep');
            $table->string('destino_endereco');
            $table->string('destino_cep');
            $table->timestamp('data_partida');
            $table->timestamp('data_retorno');
            $table->integer('qtd_passageiros');
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
        Schema::dropIfExists('fretados');
    }
}
