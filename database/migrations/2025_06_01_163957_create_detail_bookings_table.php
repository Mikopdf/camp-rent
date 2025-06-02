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
    Schema::create('detail_bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_booking')->constrained('bookings');
        $table->foreignId('id_produk')->constrained('produks');
        $table->integer('qty');
        $table->integer('harga_sewa');
        $table->date('tanggal_kembali_seharusnya');
        $table->date('tanggal_dikembalikan')->nullable();
        $table->integer('keterlambatan_hari')->default(0);
        $table->integer('denda_per_hari')->default(0);
        $table->integer('total_denda')->default(0);
        $table->text('catatan_pengembalian')->nullable();
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_bookings');
    }
};
