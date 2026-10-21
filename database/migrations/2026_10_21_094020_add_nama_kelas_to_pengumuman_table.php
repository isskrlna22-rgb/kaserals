<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('pengumuman', 'nama_kelas')) {
            Schema::table('pengumuman', function (Blueprint $table) {
                $table->string('nama_kelas')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Sengaja tidak menghapus kolom agar data tetap aman.
    }
};
