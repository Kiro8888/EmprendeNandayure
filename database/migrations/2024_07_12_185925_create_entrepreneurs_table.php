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
        Schema::create('entrepreneurs', function (Blueprint $table) {
            $table->id('id_etp'); 
            $table->string('etp_name'); 
            $table->string('etp_last_name'); 
            $table->decimal('etp_latitude', 10, 7); 
            $table->decimal('etp_longitude', 10, 7); 
            $table->enum('etp_status', [1, 2])->default(1); 
            $table->string('etp_num');
            $table->string('etp_email')->unique(); 
            $table->string('etp_img')->nullable(); 
            $table->unsignedBigInteger('etp_id_rol'); 
            $table->timestamps();

            // Actualiza la clave foránea para apuntar a la tabla 'roles'
            $table->foreign('etp_id_rol')->references('id_rol')->on('rols')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrepreneurs');
    }
};
