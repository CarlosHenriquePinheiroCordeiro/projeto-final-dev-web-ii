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
        Schema::create('sala_virtual_professors', function (Blueprint $table) {
            $table->unsignedBigInteger('pessoa_id');
            $table->foreign('pessoa_id')->references('pessoa_id')->on('professors');
            $table->unsignedBigInteger('sala_virtual_id');
            $table->foreign('sala_virtual_id')->references('id')->on('sala_virtuals');
            $table->primary(['pessoa_id', 'sala_virtual_id']);
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
        Schema::dropIfExists('sala_virtual_professors');
    }
};
