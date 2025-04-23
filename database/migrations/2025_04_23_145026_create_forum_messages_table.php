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
        Schema::create('forum_messages', function (Blueprint $table) {
            $table->id();
            
            $table->String('content'); //obligatorio, guarda el contenido del mensaje

            $table->unsignedBigInteger('forum_id')->unique();
            $table->unsignedBigInteger('users_id')->unique();

             //relacion uno a muchos con la tabla foros
            $table->foreign('forum_id')
            ->references('id')
            ->on('forums')
            ->onDelete('cascade'); //elimina el mensaje si se elimina el foro

            //relacion uno a muchos con la tabla userms
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade'); //elimina el mensaje si se elimina el usuario

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_messages');
    }
};
