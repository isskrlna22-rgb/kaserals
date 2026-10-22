
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detail_pembayaran', function (Blueprint $table) {
            $table->integer('minggu_ke')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('detail_pembayaran', function (Blueprint $table) {
            $table->integer('minggu_ke')->nullable(false)->change();
        });
    }
};
