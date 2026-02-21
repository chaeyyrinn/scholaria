<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Use DB::statement for complex ENUM modifications
        DB::statement("
        ALTER TABLE peminjaman 
        CHANGE status_pengembalian status 
        ENUM('dipinjam', 'dikembalikan', 'terlambat') 
        CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci 
        NOT NULL DEFAULT 'dipinjam'
    ");
    }

    public function down()
    {
        // Revert the change
        DB::statement("
        ALTER TABLE peminjaman 
        CHANGE status status_pengembalian 
        ENUM('dipinjam', 'dikembalikan', 'terlambat') 
        CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci 
        NOT NULL DEFAULT 'dipinjam'
    ");
    }
};
