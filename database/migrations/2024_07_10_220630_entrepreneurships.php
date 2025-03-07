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
        Schema::create('entrepreneurships', function (Blueprint $table) {
            $table->id('id'); 
            $table->string('etp_name'); 
            $table->decimal('etp_latitude', 10, 7); 
            $table->decimal('etp_longitude', 10, 7); 
            $table->enum('etp_status', [1, 2])->default(1); 
            $table->string('etp_num');
            $table->string('etp_email')->unique(); 
            $table->string('etp_img')->nullable(); 
            $table->unsignedBigInteger('etp_id_user'); 
            $table->timestamps();
       

            // Actualiza la clave foránea para apuntar a la tabla 'usuarios'
            $table->foreign('etp_id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrepreneurship');
    }
};
