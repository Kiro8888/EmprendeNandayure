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
        Schema::create('services', function (Blueprint $table) {
            $table->id('id_srv'); // Clave primaria
            $table->string('srv_name'); // Nombre del servicio
            $table->text('srv_description')->nullable(); // Descripción del servicio (opcional)
            $table->enum('srv_status', [1, 2])->default(1); 
            $table->string('srv_img')->nullable(); // Imagen del servicio (ruta de la imagen, opcional)
            $table->decimal('srv_price', 8, 2); // Precio del servicio
            $table->unsignedBigInteger('srv_id_ctg'); // Clave foránea de la categoría
            $table->unsignedBigInteger('srv_id_etp'); // Clave foránea del emprendedor
            $table->timestamps();

            // Definición de las claves foráneas
            $table->foreign('srv_id_ctg')->references('id_ctg')->on('categories')->onDelete('cascade');
            $table->foreign('srv_id_etp')->references('id_etp')->on('entrepreneurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
