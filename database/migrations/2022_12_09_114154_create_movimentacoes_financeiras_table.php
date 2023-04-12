<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes_financeiras', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('conta_id')->unsigned();
            $table->bigInteger('amigo_id')->unsigned()->nullable();
            $table->date('data');
            $table->enum('tipo', ['ENTRADA', 'SAIDA']);
            $table->enum('forma_pagamento', ['A VISTA', 'DEBITO', 'CREDITO', 'PIX', 'TRANSFERENCIA']);
            $table->string('descricao');
            $table->boolean('parcelado')->default(1);
            $table->float('valor_total', 10, 2);
            $table->enum('recorrencia', ['NAO RECORRENTE', 'DIARIO', 'SEMANAL', 'MENSAL', 'ANUAL']);
            $table->text('observacao')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('conta_id')->references('id')->on('conta')->onDelete('cascade');
            $table->foreign('amigo_id')->references('id')->on('amigos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacoes_financeiras');
    }
};
