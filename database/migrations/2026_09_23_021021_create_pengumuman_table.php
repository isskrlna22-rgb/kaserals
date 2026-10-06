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

            $table->unsignedBigInteger('id_user');

            $table->string('judul');
            $table->text('isi');

            $table->timestamps();

            $table->foreign('id_user')
                  ->references('id_users')
                  ->on('users')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
