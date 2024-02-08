<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable;
            $table->date('due_at')->nullable;
            $table->boolean('status')->nullable;
            $table->unsignedBigInteger('user_id');//crio algo igual ao id
            $table->foreign('user_id')->references('id')->on('users'); //vai ser estrangeira e referencia o id nos users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_tasks');
    }
};