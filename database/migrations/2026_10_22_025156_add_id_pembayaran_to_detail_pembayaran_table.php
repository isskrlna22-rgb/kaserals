
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detail_pembayaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pembayaran')
                ->nullable()
                ->unique();

            $table->foreign('id_pembayaran')
                ->references('id_pembayaran')
                ->on('pembayaran_kas')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('detail_pembayaran', function (Blueprint $table) {
            $table->dropForeign(['id_pembayaran']);
            $table->dropUnique(['id_pembayaran']);
            $table->dropColumn('id_pembayaran');
        });
    }
};
