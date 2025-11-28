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
            $table->string('siri_dvd_drive')->nullable()->after('siri_adapter');
            $table->string('siri_monitor')->nullable()->after('siri_mouse');
            $table->string('siri_webcam')->nullable()->after('siri_monitor');
            $table->string('siri_ups')->nullable()->after('siri_webcam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn(['siri_dvd_drive', 'siri_monitor', 'siri_webcam', 'siri_ups']);
        });
    }
};
