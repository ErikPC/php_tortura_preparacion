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
        Schema::create('deck', function (Blueprint $table) {
            $table->timestamps();
            $table->string('nombre');
            $table->string('tipo-deck');
            $table->integer('cantidad-cartas');
            $table->double('precio');
            $table->string('id-deck')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deck');
    }
};
