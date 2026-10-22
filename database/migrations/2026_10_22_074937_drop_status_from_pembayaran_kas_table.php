
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pembayaran_kas', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

    public function down(): void
    {
        Schema::table('pembayaran_kas', function (Blueprint $table) {
            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Ditolak',
            ])->default('Menunggu');
        });
    }
};
