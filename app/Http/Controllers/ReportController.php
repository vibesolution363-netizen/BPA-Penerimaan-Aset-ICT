<?php

namespace App\Http\Controllers;

use App\Exports\AssetsExport;
use App\Models\Asset;
use App\Models\Recipient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $selectedYear = $request->input('year', date('Y'));
        
        $totalAssets = Asset::where('tahun', $selectedYear)->count();
        $receivedAssets = Recipient::where('tahun', $selectedYear)->whereNotNull('signature')->count();
        $pendingAssets = Recipient::where('tahun', $selectedYear)->whereNull('signature')->count();

        $assetsByType = Asset::where('tahun', $selectedYear)
            ->selectRaw('jenis, COUNT(*) as total')
            ->groupBy('jenis')
            ->get();
        
        $availableYears = Recipient::selectRaw('DISTINCT tahun')->orderBy('tahun', 'desc')->pluck('tahun');
        if ($availableYears->isEmpty()) {
            $availableYears = collect([date('Y')]);
        }

        return view('reports.index', compact('totalAssets', 'receivedAssets', 'pendingAssets', 'assetsByType', 'availableYears', 'selectedYear'));
    }

    public function exportExcel(Request $request)
    {
        $year = $request->input('year', date('Y'));
        return Excel::download(new AssetsExport($year), 'laporan-penerima-sewaan-' . $year . '-' . date('Y-m-d') . '.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $recipients = Recipient::with('assets')
            ->where('tahun', $year)
            ->orderBy('nama')
            ->get();

        $pdf = Pdf::loadView('reports.pdf', compact('recipients', 'year'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-penerima-sewaan-' . $year . '-' . date('Y-m-d') . '.pdf');
    }
}
