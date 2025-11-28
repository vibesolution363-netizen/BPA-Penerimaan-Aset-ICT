<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get all unique recipients from existing assets
        $existingAssets = DB::table('assets')->get();
        $recipientsMap = [];

        foreach ($existingAssets as $asset) {
            $nama = $asset->nama;
            
            // If recipient doesn't exist yet, create one
            if (!isset($recipientsMap[$nama])) {
                $recipientId = DB::table('recipients')->insertGetId([
                    'nama' => $asset->nama,
                    'profil' => $asset->profil,
                    'signature' => $asset->signature,
                    'created_at' => $asset->created_at,
                    'updated_at' => $asset->updated_at,
                ]);
                $recipientsMap[$nama] = $recipientId;
            }
            
            // Update asset with recipient_id
            DB::table('assets')
                ->where('id', $asset->id)
                ->update(['recipient_id' => $recipientsMap[$nama]]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to reverse - data already moved
    }
};
