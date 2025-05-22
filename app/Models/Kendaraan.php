<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kendaraan extends Model
{
    protected $fillable = ['nomor_polisi', 'status', 'kondisi'];

    public function up()
    {
        Schema::create('jadwal_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supir_id')->constrained('supirs')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('shift');
            $table->timestamps();
        });
    }
}
