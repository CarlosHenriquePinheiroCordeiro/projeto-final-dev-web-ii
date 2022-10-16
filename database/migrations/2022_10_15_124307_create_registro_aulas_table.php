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
        Schema::create('registro_aulas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 500);
            $table->date('data');
            $table->integer('qtd_aula');
            $table->unsignedBigInteger('sala_virtual_id');
            $table->foreign('sala_virtual_id')->references('id')->on('sala_virtuals');
            $table->unsignedBigInteger('pessoa_id')->nullable();
            $table->foreign('pessoa_id')->references('pessoa_id')->on('sala_virtual_professors');
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
        Schema::dropIfExists('registro_aulas');
    }
};
