
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaturan_sistems', function (Blueprint $table) {
            $table->id('id_pengaturan');
            $table->string('nama_kelas');
            $table->unsignedBigInteger('id_wali_kelas')->nullable();
            $table->unsignedBigInteger('nominal_kas')->default(10000);
            $table->timestamps();

            $table->foreign('id_wali_kelas')
                ->references('id_users')
                ->on('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturan_sistems');
    }
};
