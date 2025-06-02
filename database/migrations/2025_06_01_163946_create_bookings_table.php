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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_customer')->constrained('akuns');
        $table->timestamp('tanggal_booking');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->string('status');
        $table->integer('total_harga')->default(0);
        $table->integer('total_denda')->default(0);
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
