<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stock extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'stock';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = true;


    protected  $fillable = [
        'kode_barang',
        'nama_barang',
        'jenis_barang',
        'jumlah_barang',
        'satuan',
    ];

    function jenisBarang(): HasMany
    {
        return $this->hasMany(JenisBarang::class);
    }

    function satuan(): HasMany
    {
        return $this->hasMany(Satuan::class);
    }

    function barangMasuk(): BelongsTo
    {
        return $this->belongsTo(BarangMasuk::class);
    }

    function barangKeluar(): BelongsTo
    {
        return $this->belongsTo(BarangKeluar::class);
    }
}
