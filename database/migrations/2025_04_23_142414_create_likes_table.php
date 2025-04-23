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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('users_id')->unique(); //el id del like que tiene el comentario
            $table->unsignedBigInteger('comments_id')->unique(); //el id del comentario que tiene el like
            $table->unsignedBigInteger('images_id')->unique(); //el id del mensaje que tiene el like
            $table->unsignedBigInteger('forums_id')->unique(); //el id del foro que tiene el like


            //relacion uno a muchos con la tabla users
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade'); //la fk que hace referencia a la tabla userms

            //relacion uno a muchos con la tabla comments
            $table->foreign('comments_id')
            ->references('id')
            ->on('comments')
            ->onDelete('cascade'); //la fk que hace referencia a la tabla comments

            //relacion uno a muchos con la tabla imagenes
            $table->foreign('images_id')
            ->references('id')
            ->on('images')
            ->onDelete('cascade'); //la fk que hace referencia a la tabla imagenes

            //relacion uno a muchos con la tabla forums
            $table->foreign('forums_id')
            ->references('id')
            ->on('forums')
            ->onDelete('cascade'); //la fk que hace referencia a la tabla forums

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
