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
        // First drop the existing status column if it exists
        if (Schema::hasColumn('supirs', 'status')) {
            Schema::table('supirs', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
        
        // Then add the new status column with enum type
        Schema::table('supirs', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active')->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Only drop if the column exists
        if (Schema::hasColumn('supirs', 'status')) {
            Schema::table('supirs', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};
