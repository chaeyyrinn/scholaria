<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();

            // relasi ke buku
            $table->foreignId('buku_id')
                ->constrained('buku')
                ->cascadeOnDelete();

            // relasi ke user (siswa)
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // isi ulasan
            $table->text('ulasan');
            $table->tinyInteger('rating'); // 1–5

            // opsional tapi bagus untuk admin
            // $table->enum('status', ['pending', 'approved'])->default('approved');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};
