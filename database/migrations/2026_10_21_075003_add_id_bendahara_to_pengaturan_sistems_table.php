
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaturan_sistems', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bendahara')
                ->nullable()
                ->after('id_wali_kelas');

            $table->foreign('id_bendahara')
                ->references('id_users')
                ->on('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pengaturan_sistems', function (Blueprint $table) {
            $table->dropForeign(['id_bendahara']);
            $table->dropColumn('id_bendahara');
        });
    }
};
