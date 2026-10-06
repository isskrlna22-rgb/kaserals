<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');

            $table->unsignedBigInteger('id_pembayaran');
            $table->unsignedBigInteger('id_siswa');

            $table->string('status', 25);

            $table->timestamp('created_at')->nullable();
            $table->timestamp('update_at')->nullable();

            $table->foreign('id_pembayaran')
                  ->references('id_pembayaran')
                  ->on('pembayaran_kas')
                  ->cascadeOnDelete();

            $table->foreign('id_siswa')
                  ->references('id_siswa')
                  ->on('siswa')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
