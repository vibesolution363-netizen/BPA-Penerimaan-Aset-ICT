<?php

namespace App\Http\Controllers;

use App\Models\AssetType;
use Illuminate\Http\Request;

class AssetTypeController extends Controller
{
    public function destroy(AssetType $assetType)
    {
        try {
            // Delete all assets with this type first
            $assetType->assets()->delete();
            
            // Delete the asset type
            $assetType->delete();
            
            return redirect()->back()->with('success', 'Jenis aset berjaya dipadam');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ralat memadam jenis aset: ' . $e->getMessage());
        }
    }
}
