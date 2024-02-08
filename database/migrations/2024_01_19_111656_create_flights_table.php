<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //corre quando faço migrate
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('aeroporto'); //varchar
            $table->text('descricao')->nullable; //não é obrigatório
            $table->integer('nr_voo');
            $table->timestamps(); //created at; updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //corre quando fazemos rollback
    {
        Schema::dropIfExists('flights');
    }
};
