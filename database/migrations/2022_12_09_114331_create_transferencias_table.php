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
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('conta_origem_id')->unsigned();
            $table->bigInteger('conta_destino_id')->unsigned();
            $table->dateTime('data_hora');
            $table->float('valor', 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('conta_origem_id')->references('id')->on('contas')->onDelete('cascade');
            $table->foreign('conta_destino_id')->references('id')->on('contas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transferencias');
    }
};
