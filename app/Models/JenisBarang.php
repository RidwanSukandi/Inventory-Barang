<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JenisBarang extends Model
{
    use HasFactory, HasUuids;

    protected $table = "jenis_barangs";
    protected $primaryKey = "id";
    public $incrementing = false;
    public $keyType = 'string';


    protected $fillable = [
        'jenis_barang'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }
}
