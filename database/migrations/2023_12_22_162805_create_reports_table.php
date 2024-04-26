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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->timestampTz('tgl_testing');
            $table->string('session_nama');
            $table->enum('aplikasi_sisi', ['customer', 'office'])->default('customer');
            $table->string('nama_filtur');
            $table->string('keterangan_masalah');
            // user edit berdasarkan status
            $table->string('status');
            $table->string('diproses_oleh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
