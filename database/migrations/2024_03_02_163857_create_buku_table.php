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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->string('penulis');
            $table->decimal('harga', 15, 2);
            $table->string('cover_buku');
            $table->integer('tahun_terbit');
            $table->string('penerbit');
            $table->text('deskripsi')->nullable();
            $table->enum('kategori', ['Fiksi', 'Non-Fiksi', 'Referensi', 'Bacaan Anak', 'Teknologi'])->default('Fiksi');
            $table->integer('stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
