<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
