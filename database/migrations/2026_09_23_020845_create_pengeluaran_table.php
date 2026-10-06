<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id('id_pengeluaran');

            $table->unsignedBigInteger('id_user');

            $table->decimal('nominal', 12, 2);
            $table->date('tanggal');
            $table->string('kategori');
            $table->text('keterangan')->nullable();

            $table->timestamps();

            $table->foreign('id_user')
                  ->references('id_users')
                  ->on('users')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
