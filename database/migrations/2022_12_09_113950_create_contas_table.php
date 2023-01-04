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
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('tipo', ['POUPANÇA', 'CORRENTE', 'INVESTIMENTO']);
            $table->string('nome_conta');
            $table->decimal('saldo', 10, 2);
            $table->boolean('ativo')->default(1);
            $table->date('dia_fechamento');
            $table->date('dia_vencimento');
            $table->float('limite', 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas');
    }
};
