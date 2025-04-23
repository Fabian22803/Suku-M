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
            $table->string('description'); //obligatorio
            $table->string('benefits');
            $table->string('image');


            $table->unsignedBigInteger('category_plants_id')->unique();

            //relacion uno a muchos con la tabla categorias
            $table->foreign('category_plants_id')
            ->references('id')
            ->on('plant_categories') // La tabla de categorias
            ->onDelete('cascade')
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
