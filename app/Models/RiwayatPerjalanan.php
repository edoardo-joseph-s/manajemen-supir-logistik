<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPerjalanan extends Model
{
    protected $fillable = [
        'supir_id',
        'kendaraan_id',
        'tujuan',
        'tanggal',
        'keterangan',
    ];

    public function supir()
    {
        return $this->belongsTo(Supir::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
