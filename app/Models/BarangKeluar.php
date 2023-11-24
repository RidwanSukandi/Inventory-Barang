<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory, HasUuids;

    protected $table = "barang_keluar";
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamp = true;


    protected $fillable = [
        'id_transaksi',
        'tanggal_keluar',
        'kode_barang',
        'nama_barang',
        'tujuan',
        'jumlah_keluar',
        'satuan'
    ];

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function satuan()
    {
        return $this->hasMany(Satuan::class);
    }
}
