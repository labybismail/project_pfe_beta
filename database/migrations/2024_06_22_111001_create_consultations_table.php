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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->date('dateRdv'); 
            $table->time('heureRdv');
            $table->unsignedBigInteger('patientId');
            $table->unsignedBigInteger('doctorId');
            $table->unsignedBigInteger('statusId');
            $table->foreign('patientId')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('statusId')->references('id')->on('statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
