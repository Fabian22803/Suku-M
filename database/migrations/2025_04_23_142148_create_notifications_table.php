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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('message');//obligaotorio
            $table->string('read unread'); //si la notificacio  es leida o no leida
            $table->timestamp('upload_date')->useCurrent();//fecha subida



            $table->unsignedBigInteger('user_id')->unique();
             //relacion uno a muchos con la tabla userms
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');//elimina la notificacion si el usuario es
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
