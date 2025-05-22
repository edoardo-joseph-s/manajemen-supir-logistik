<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalKerja extends Model
{
    protected $fillable = ['supir_id', 'tanggal', 'shift'];

    public function supir()
    {
        return $this->belongsTo(Supir::class);
    }
}