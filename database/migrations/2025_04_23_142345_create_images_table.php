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
        Schema::create('images', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // Nombre de la imagen
            $table->string('path'); // Ruta de la imagen
            $table->integer('size')->nullable(); // Tamaño del archivo en bytes
            $table->string('description'); // Descripción de la imagen
            $table->string('upload date')->nullable(); // Fecha de carga de la imagen
            $table->string('extension')->nullable(); // Extensión del archivo de imagen
            $table->string('mime_type')->nullable(); // Tipo MIME del archivo de imagen

            $table->unsignedBigInteger('plants_id')->unique();
            $table->foreign('plants_id')
            ->references('id')
            ->on('plants')
            ->onDelete('cascade') // Relación con la tabla de planes
            ->onUpdate('cascade'); //actualiza la planta si se actualiza el usuario
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
