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
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn(['nama', 'profil', 'signature', 'diterima']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->string('nama')->after('recipient_id');
            $table->string('profil')->after('nama');
            $table->text('signature')->nullable()->after('siri_dongle');
            $table->boolean('diterima')->default(false)->after('signature');
        });
    }
};
