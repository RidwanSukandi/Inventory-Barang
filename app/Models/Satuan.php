<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Satuan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'satuan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';

    protected $fillable = [
        'satuan_barang'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }

    public function barangMAsuk(): BelongsTo
    {
        return $this->belongsTo(BarangMasuk::class);
    }

    public function barangKeluar(): BelongsTo
    {
        return $this->belongsTo(BarangKeluar::class);
    }
}
