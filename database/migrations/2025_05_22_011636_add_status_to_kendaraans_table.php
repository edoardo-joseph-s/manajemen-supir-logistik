<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->enum('status', ['aktif', 'tidak_aktif', 'servis', 'rusak'])->default('aktif')->after('nomor_polisi');
            $table->string('jenis')->default('mobil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('jenis');
        });
    }
};
