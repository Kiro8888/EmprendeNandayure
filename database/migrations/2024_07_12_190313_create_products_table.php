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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_pdt'); // Clave primaria
            $table->string('pdt_name'); // Nombre del producto
            $table->text('pdt_description')->nullable(); // Descripción del producto (opcional)
            $table->enum('pdt_status', [1, 2])->default(1); 
            $table->string('pdt_img')->nullable(); // Imagen del producto (ruta de la imagen, opcional)
            $table->decimal('pdt_price', 8, 2); // Precio del producto
            $table->unsignedBigInteger('pdt_id_ctg'); // Clave foránea de la categoría
            $table->unsignedBigInteger('pdt_id_etp'); // Clave foránea del emprendedor
            $table->timestamps();

            // Definición de las claves foráneas
            $table->foreign('pdt_id_etp')->references('id')->on('entrepreneurships')->onDelete('cascade');
            $table->foreign('pdt_id_ctg')->references('id_ctg')->on('categories')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
