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
        Schema::table('recipients', function (Blueprint $table) {
            $table->year('tahun')->default(date('Y'))->after('profil');
        });

        Schema::table('assets', function (Blueprint $table) {
            $table->year('tahun')->default(date('Y'))->after('recipient_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipients', function (Blueprint $table) {
            $table->dropColumn('tahun');
        });

        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn('tahun');
        });
    }
};
