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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');//obligatorio
            $table->string('scientific_name')->nullable(); //opcional
            $table->text('description'); //obligatorio
            $table->text('benefits');
            $table->string('image');
            


        
            //relacion uno a muchos con la tabla usuarios
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
            ->references('id')
            ->on('users') // La tabla de usuarios
            ->onDelete('cascade') //elimina la planta si se elimina el usuario
            ->onUpdate('cascade'); //actualiza la planta si se actualiza el usuario

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
