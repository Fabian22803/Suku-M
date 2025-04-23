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
        Schema::create('_plant_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('users_id')->unique();
            $table->unsignedBigInteger('plant_id')->unique();

             //relacion muchos a muchos con la tabla userms
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade') //elimina la planta si se elimina el usuario
            ->onUpdate('cascade'); //actualiza la planta si se actualiza el usuario

            $table->foreign('plant_id')
            ->references('id')
            ->on('plants')
            ->onDelete('cascade') //elimina el usuario si se elimina la planta
            ->onUpdate('cascade'); //actualiza el usuario si se actualiza la planta


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_plant_user');
    }
};
