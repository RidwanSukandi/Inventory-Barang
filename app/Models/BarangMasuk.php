<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory, HasUuids;

    protected $table = "barang_masuk";
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamp = true;


    protected $fillable = [
        'id_transaksi',
        'tanggal_masuk',
        'kode_barang',
        'nama_barang',
        'pengirim',
        'jumlah_masuk',
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
