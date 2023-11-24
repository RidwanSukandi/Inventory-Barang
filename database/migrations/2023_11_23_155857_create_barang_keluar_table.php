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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('id_transaksi')->unique()->nullable(false);
            $table->date('tanggal_keluar')->nullable(false);
            $table->string('kode_barang')->nullable(false);
            $table->string('nama_barang')->nullable(false);
            $table->integer('jumlah_keluar')->nullable(false);
            $table->string('satuan')->nullable(false);
            $table->string('tujuan')->nullable(false);
            $table->timestamps();

            $table->foreign('kode_barang')->references('kode_barang')->on('stock');
            $table->foreign('nama_barang')->references('nama_barang')->on('stock');
            $table->foreign('satuan')->references('satuan_barang')->on('satuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
