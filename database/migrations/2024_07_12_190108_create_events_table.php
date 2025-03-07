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
        Schema::create('events', function (Blueprint $table) {
            $table->id('id_evt'); // Clave primaria
            $table->string('evt_name'); // Nombre del evento
            $table->text('evt_description')->nullable(); // Descripción del evento (opcional)
            $table->date('evt_date'); // Fecha del evento
            $table->time('evt_hour'); // Hora del evento
            $table->string('evt_location'); // Ubicación del evento
            $table->string('evt_img')->nullable(); // Imagen del evento (ruta de la imagen, opcional)
            $table->timestamps();

     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
