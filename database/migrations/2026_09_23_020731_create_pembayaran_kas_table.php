<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran_kas', function (Blueprint $table) {
            $table->id('id_pembayaran');

            $table->unsignedBigInteger('id_siswa');

            $table->unsignedInteger('minggu_ke');
            $table->decimal('nominal', 12, 2);

            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Ditolak'
            ])->default('Menunggu');

            $table->enum('metode_pembayaran', [
                'Tunai',
                'Transfer'
            ])->default('Tunai');

            $table->string('bukti_transfer')->nullable();

            $table->date('tanggal');
            $table->text('keterangan')->nullable();

            $table->timestamps();

            $table->foreign('id_siswa')
                  ->references('id_siswa')
                  ->on('siswa')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_kas');
    }
};
