<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Recipient;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(Request $request)
    {
        // Get current year or selected year
        $currentYear = $request->input('year', date('Y'));
        
        $query = Recipient::with('assets')
            ->where('tahun', $currentYear);

        // Filter by search term
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhereHas('assets', function ($q) use ($search) {
                      $q->where('jenis', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by asset type
        if ($request->has('type') && $request->type !== 'Semua') {
            $query->whereHas('assets', function ($q) use ($request) {
                $q->where('jenis', 'like', "%{$request->type}%");
            });
        }

        $recipients = $query->orderBy('nama')->paginate(10)->withQueryString();

        // Calculate statistics for current year
        $stats = [
            'total' => Asset::where('tahun', $currentYear)->count(),
            'recipients' => Recipient::where('tahun', $currentYear)->count(),
            'received' => Recipient::where('tahun', $currentYear)->whereNotNull('signature')->count(),
            'aio' => Asset::where('tahun', $currentYear)->where('jenis', 'like', '%AiO%')->count(),
            'laptop' => Asset::where('tahun', $currentYear)->where('jenis', 'like', '%Laptop%')->count(),
        ];

        $assetTypes = \App\Models\AssetType::orderBy('nama')->get();
        
        // Get available years
        $availableYears = Recipient::selectRaw('DISTINCT tahun')->orderBy('tahun', 'desc')->pluck('tahun');

        if ($request->ajax()) {
            return response()->json([
                'recipients' => $recipients,
                'stats' => $stats,
                'assetTypes' => $assetTypes,
            ]);
        }

        return view('assets.index', compact('recipients', 'stats', 'assetTypes', 'currentYear', 'availableYears'));
    }

    public function update(Request $request, Asset $asset)
    {
        $validated = $request->validate([
            'tarikh_penerimaan' => 'nullable|date',
            'siri_device' => 'nullable|string',
            'siri_adapter' => 'nullable|string',
            'siri_dvd_drive' => 'nullable|string',
            'siri_cord' => 'nullable|string',
            'siri_dongle' => 'nullable|string',
            'siri_mouse' => 'nullable|string',
            'siri_monitor' => 'nullable|string',
            'siri_keyboard' => 'nullable|string',
            'siri_ups' => 'nullable|string',
        ]);

        $asset->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berjaya dikemaskini',
            'asset' => $asset,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'assets' => 'required|array|min:1',
            'assets.*.jenis' => 'required|string|max:255',
            'assets.*.tarikh_penerimaan' => 'nullable|date',
            'assets.*.siri_device' => 'nullable|string',
            'assets.*.siri_adapter' => 'nullable|string',
            'assets.*.siri_dvd_drive' => 'nullable|string',
            'assets.*.siri_cord' => 'nullable|string',
            'assets.*.siri_dongle' => 'nullable|string',
            'assets.*.siri_mouse' => 'nullable|string',
            'assets.*.siri_monitor' => 'nullable|string',
            'assets.*.siri_keyboard' => 'nullable|string',
            'assets.*.siri_ups' => 'nullable|string',
        ]);

        // Create or get recipient
        $recipient = Recipient::firstOrCreate(
            [
                'nama' => $validated['nama'],
                'tahun' => date('Y'),
            ],
            [
                'profil' => $validated['nama'],
                'tahun' => date('Y'),
            ]
        );

        // Create multiple assets
        $createdAssets = [];
        foreach ($validated['assets'] as $assetData) {
            $asset = Asset::create([
                'recipient_id' => $recipient->id,
                'tahun' => date('Y'),
                'jenis' => $assetData['jenis'],
                'tarikh_penerimaan' => $assetData['tarikh_penerimaan'] ?? null,
                'siri_device' => $assetData['siri_device'] ?? null,
                'siri_adapter' => $assetData['siri_adapter'] ?? null,
                'siri_dvd_drive' => $assetData['siri_dvd_drive'] ?? null,
                'siri_cord' => $assetData['siri_cord'] ?? null,
                'siri_dongle' => $assetData['siri_dongle'] ?? null,
                'siri_mouse' => $assetData['siri_mouse'] ?? null,
                'siri_monitor' => $assetData['siri_monitor'] ?? null,
                'siri_keyboard' => $assetData['siri_keyboard'] ?? null,
                'siri_ups' => $assetData['siri_ups'] ?? null,
            ]);
            $createdAssets[] = $asset;
        }

        return response()->json([
            'success' => true,
            'message' => count($createdAssets) . ' aset berjaya ditambah',
            'assets' => $createdAssets,
            'recipient' => $recipient,
        ]);
    }

    public function storeType(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:asset_types,nama',
        ]);

        $assetType = \App\Models\AssetType::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Jenis aset berjaya ditambah',
            'assetType' => $assetType,
        ]);
    }
}