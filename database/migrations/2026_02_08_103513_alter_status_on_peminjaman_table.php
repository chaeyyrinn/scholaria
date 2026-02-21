<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            // hapus kolom lama
            if (Schema::hasColumn('peminjaman', 'status_pengembalian')) {
                $table->dropColumn('status_pengembalian');
            }

            // tambah kolom baru
            if (!Schema::hasColumn('peminjaman', 'status')) {
                $table->enum('status', [
                    'menunggu_validasi',
                    'dipinjam',
                    'menunggu_pengembalian',
                    'dikembalikan',
                    'terlambat'
                ])->default('menunggu_validasi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropColumn('status');

            $table->enum('status_pengembalian', [
                'dipinjam',
                'dikembalikan',
                'terlambat'
            ])->default('dipinjam');
        });
    }
};
