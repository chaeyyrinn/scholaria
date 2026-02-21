<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade'); // petugas atau siswa yang menerima
            $table->string('judul');
            $table->text('isi')->nullable();
            $table->enum('tipe', ['peminjaman_diajukan', 'peminjaman_disetujui', 'peminjaman_ditolak', 'umum']); // enum tipe notif
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
