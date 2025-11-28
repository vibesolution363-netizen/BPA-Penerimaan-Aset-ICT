<?php

namespace App\Http\Controllers;

use App\Models\Recipient;
use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    public function index(Request $request)
    {
        $query = Recipient::with('assets');

        // Search filter
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%");
        }

        $recipients = $query->orderBy('nama')->get();
        $assetTypes = AssetType::orderBy('nama')->get();

        // Calculate statistics
        $stats = [
            'total' => Recipient::count(),
            'received' => Recipient::whereNotNull('signature')->count(),
            'pending' => Recipient::whereNull('signature')->count(),
        ];

        return view('recipients.index', compact('recipients', 'assetTypes', 'stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Auto-generate profil from nama
        $validated['profil'] = $validated['nama'];

        $recipient = Recipient::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Penerima berjaya ditambah',
            'recipient' => $recipient,
        ]);
    }

    public function sign(Request $request, Recipient $recipient)
    {
        $validated = $request->validate([
            'signature' => 'required|string',
        ]);

        $recipient->update([
            'signature' => $validated['signature'],
        ]);

        // Auto-populate tarikh_penerimaan for all assets belonging to this recipient
        $recipient->assets()->whereNull('tarikh_penerimaan')->update([
            'tarikh_penerimaan' => now()->toDateString(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tandatangan berjaya disimpan',
            'recipient' => $recipient->fresh('assets'),
        ]);
    }

    public function reset(Recipient $recipient)
    {
        // Reset all asset data except jenis (type)
        $recipient->assets()->update([
            'tarikh_penerimaan' => null,
            'siri_device' => null,
            'siri_adapter' => null,
            'siri_dvd_drive' => null,
            'siri_cord' => null,
            'siri_dongle' => null,
            'siri_mouse' => null,
            'siri_monitor' => null,
            'siri_keyboard' => null,
            'siri_ups' => null,
        ]);

        // Reset signature
        $recipient->update([
            'signature' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data penerima berjaya direset',
            'recipient' => $recipient->fresh('assets'),
        ]);
    }

    public function destroy(Recipient $recipient)
    {
        // Delete all assets belonging to this recipient
        $recipient->assets()->delete();
        
        // Delete the recipient
        $recipient->delete();

        return response()->json([
            'success' => true,
            'message' => 'Penerima dan semua aset mereka berjaya dipadam',
        ]);
    }
}
