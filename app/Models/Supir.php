<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Supir extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'no_sim',
        'nama',
        'no_hp',
        'alamat',
        'status',
        'tanggal_lahir'
    ];

    public function jadwalKerjas()
    {
        return $this->hasMany(JadwalKerja::class);
    }

    public function getUmurAttribute()
    {
        return $this->tanggal_lahir ? Carbon::parse($this->tanggal_lahir)->age : null;
    }
}
