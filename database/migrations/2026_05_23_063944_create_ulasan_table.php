<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Membuat tabel ulasan yang berelasi dengan tabel kedai_kopi
     */
    public function up(): void
    {
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kedai_kopi_id')
                  ->constrained('kedai_kopi')
                  ->onDelete('cascade'); // jika kedai dihapus, ulasan ikut terhapus
            $table->string('nama_pengulas');
            $table->text('komentar');
            $table->decimal('rating_ulasan', 2, 1); // skala 1.0 - 5.0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};