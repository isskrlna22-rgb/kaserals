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
        Schema::create('detail_pembayaran', function (Blueprint $table) {
            $table->id('id_detail');

            $table->unsignedBigInteger('id_siswa');

            $table->integer('minggu_ke');

            $table->decimal('nominal', 15, 2);

            $table->timestamps();

            $table->foreign('id_siswa')
                ->references('id_siswa')
                ->on('siswa')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembayaran');
    }
};
