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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('content'); //el contenido que tiene el comentario
            $table->timestamp('creation_date')->userCurrent();  //la fecha de cunado se publica el comentario

            $table->unsignedBigInteger('users_id')->unique(); //el id del comentario que tiene el like
            $table->unsignedBigInteger('plants_id')->unique(); //el id del foro que tiene el comentario

            //relacion uno a muchos con la tabla userms
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade') //elimina el comentario si se elimina el usuario
            ->onUpdate('cascade'); //actualiza la planta si se actualiza el usuario

            //relacion uno a muchos con la tabla plants
            $table->foreign('plants_id')
            ->references('id')
            ->on('plants')
            ->onDelete('cascade') //elimina el comentario si se elimina la planta
            ->onUpdate('cascade'); //actualiza la planta si se actualiza el usuario

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
