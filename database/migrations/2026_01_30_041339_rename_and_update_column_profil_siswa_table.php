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
        Schema::rename('profil_siswa', 'profil');
        Schema::table('profil', function (Blueprint $table) {
            if (Schema::hasColumn('profil', 'siswa_id')) {
                $table->renameColumn('siswa_id', 'user_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('profil', 'profil_siswa');
        Schema::table('profil_siswa', function (Blueprint $table) {
            if (Schema::hasColumn('profil_siswa', 'user_id')) {
                $table->renameColumn('user_id', 'siswa_id');
            }
        });
    }
};
