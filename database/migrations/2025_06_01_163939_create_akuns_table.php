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
    Schema::create('akuns', function (Blueprint $table) {
        $table->id();
        $table->string('username');
        $table->string('password');
        $table->string('email');
        $table->string('nama_lengkap');
        $table->foreignId('role_id')->constrained('roles');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akuns');
    }
};
