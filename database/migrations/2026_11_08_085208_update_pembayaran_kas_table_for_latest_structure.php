
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pembayaran_kas', function (Blueprint $table) {
            if (Schema::hasColumn('pembayaran_kas', 'minggu_ke')) {
                $table->dropColumn('minggu_ke');
            }

            if (Schema::hasColumn('pembayaran_kas', 'nominal')) {
                $table->dropColumn('nominal');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pembayaran_kas', function (Blueprint $table) {
            if (!Schema::hasColumn('pembayaran_kas', 'minggu_ke')) {
                $table->unsignedInteger('minggu_ke')->nullable();
            }

            if (!Schema::hasColumn('pembayaran_kas', 'nominal')) {
                $table->decimal('nominal', 12, 2)->nullable();
            }
        });
    }
};
