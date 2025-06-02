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
    Schema::create('produks', function (Blueprint $table) {
        $table->id();
        $table->string('nama_produk');
        $table->text('deskripsi')->nullable();
        $table->integer('harga_sewa_per_hari');
        $table->integer('stok');
        $table->string('gambar')->nullable();
        $table->foreignId('kategori_id')->constrained('kategoris');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
