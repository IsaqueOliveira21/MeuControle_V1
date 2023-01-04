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
        Schema::create('parcelas_recorrencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('movimentacao_financeira_id')->unsigned();
            $table->float('valor', 10, 2);
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('movimentacao_financeira_id')->references('id')->on('movimentacoes_financeiras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelas_recorrencias');
    }
};
