<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');

            $table->unsignedBigInteger('id_user')->unique();

            $table->string('nisn')->unique();
            $table->string('nama_lengkap');
            $table->string('kelas');
            $table->string('no_hp')->nullable();

            $table->timestamps();

            $table->foreign('id_user')
                  ->references('id_users')
                  ->on('users')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
