<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->enum('kondisi_setelah', ['baru', 'baik', 'rusak'])->nullable()->after('tanggal_kembali');
        });
    }

    public function down(): void {
        Schema::table('pengembalians', function (Blueprint $table) {
            $table->dropColumn('kondisi_setelah');
        });
    }
};
