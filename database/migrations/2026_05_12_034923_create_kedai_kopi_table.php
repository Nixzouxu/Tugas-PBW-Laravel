<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kedai_kopi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kedai');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kopi_unggulan');
            $table->string('suasana'); // cozy, modern, vintage
            $table->integer('harga_mulai');
            $table->text('deskripsi');
            $table->string('jam_buka');
            $table->decimal('rating', 2, 1);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('kedai_kopi');
    }
};