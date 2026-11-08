<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id('id_pengumuman');

            $table->unsignedBigInteger('id_user')->nullable();

            $table->string('judul', 150);
            $table->text('isi');
            $table->string('nama_kelas', 255)->nullable();

            $table->timestamps();

            $table->foreign('id_user')
                ->references('id_users')
                ->on('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
