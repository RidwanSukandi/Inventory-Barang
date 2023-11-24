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
        Schema::create('stock', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang')->unique();
            $table->string('jenis_barang');
            $table->string('jumlah_barang');
            $table->string('satuan');
            $table->foreign('jenis_barang')->references('jenis_barang')->on('jenis_barangs');
            $table->foreign('satuan')->references('satuan_barang')->on('satuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
