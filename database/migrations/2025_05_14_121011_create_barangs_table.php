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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('gambar');
            $table->unsignedBigInteger('kategori_id'); // Foreign key untuk kategori
            $table->integer('stok');
            $table->timestamps();

            $table->foreign('kategori_id') // Menambahkan constraint foreign key
                  ->references('id')->on('kategoris') // Mengarah ke tabel kategoris
                  ->onDelete('cascade'); // Jika kategori dihapus, barang terkait juga akan terhapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
