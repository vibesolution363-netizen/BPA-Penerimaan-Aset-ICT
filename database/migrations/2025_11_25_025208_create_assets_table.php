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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('profil');
            $table->string('jenis');
            $table->string('siri_device')->nullable();
            $table->string('siri_adapter')->nullable();
            $table->string('siri_cord')->nullable();
            $table->string('siri_dongle')->nullable();
            $table->boolean('diterima')->default(false);
            $table->text('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
