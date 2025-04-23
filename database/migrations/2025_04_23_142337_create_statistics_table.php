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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();

            $table->string('action');//la acion que realiza el usuario en la pagina
            $table->string('description');//descripcion mas detallada de la accion que realizo
            $table->timestamp('action_date')->userCurrent();//registrar la fecha de la accion

            $table->unsignedBigInteger('users_id')->unique(); //relacion con el usuario
            //relacion uno a muchos con la tabla userms
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade'); //elimina la estadistica si se elimina el usuario

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
