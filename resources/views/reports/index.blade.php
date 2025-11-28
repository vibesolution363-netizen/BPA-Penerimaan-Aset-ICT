@extends('layouts.app')

@section('title', 'Sistem Penerimaan Aset ICT LPB')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Laporan Penerima Sewaan Komputer Riba/Peribadi/AiO</h2>
    <p class="text-slate-600">Ringkasan dan analisis aset</p>
</div>

<!-- Stats Summary -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-slate-600 text-sm mb-1">Jumlah Aset</p>
                <h3 class="text-3xl font-bold text-slate-800">{{ $totalAssets }}</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                    <rect width="16" height="16" x="4" y="4" rx="2"></rect>
                    <rect width="6" height="6" x="9" y="9" rx="1"></rect>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-slate-600 text-sm mb-1">Telah Diserah</p>
                <h3 class="text-3xl font-bold text-green-600">{{ $receivedAssets }}</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <path d="m9 11 3 3L22 4"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-slate-600 text-sm mb-1">Belum Diserah</p>
                <h3 class="text-3xl font-bold text-orange-600">{{ $pendingAssets }}</h3>
            </div>
            <div class="bg-orange-100 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-600">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Assets by Type -->
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4">Aset Mengikut Jenis</h3>
    <div class="space-y-4">
        @foreach($assetsByType as $type)
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                <span class="font-medium text-slate-700">{{ $type->jenis }}</span>
            </div>
            <div class="flex items-center space-x-4">
                <div class="w-64 bg-slate-200 rounded-full h-2">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: {{ ($type->total / $totalAssets) * 100 }}%"></div>
                </div>
                <span class="font-bold text-slate-800 w-12 text-right">{{ $type->total }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Actions -->
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4">Eksport Laporan</h3>
    <p class="text-sm text-slate-600 mb-4">Muat turun laporan lengkap termasuk tandatangan penerima</p>
    
    <!-- Year Selector -->
    <div class="mb-4">
        <label for="exportYear" class="block text-sm font-medium text-slate-700 mb-2">Pilih Tahun:</label>
        <div class="relative inline-block">
            <svg class="absolute left-3 top-3 text-slate-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            <select id="exportYear" class="pl-9 pr-10 py-2 rounded-lg text-sm font-bold border-2 border-blue-600 text-blue-700 bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer">
                @foreach($availableYears as $year)
                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>Tahun {{ $year }}</option>
                @endforeach
            </select>
            <svg class="absolute right-3 top-3 text-blue-600 pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </div>
    
    <div class="flex gap-3">
        <a href="{{ route('reports.export.excel') }}?year={{ $selectedYear }}" id="excelExportBtn" class="flex items-center space-x-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <path d="M12 18v-6"></path>
                <path d="m9 15 3 3 3-3"></path>
            </svg>
            <span class="font-semibold">Eksport ke Excel</span>
        </a>
        <a href="{{ route('reports.export.pdf') }}?year={{ $selectedYear }}" id="pdfExportBtn" class="flex items-center space-x-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" x2="8" y1="13" y2="13"></line>
                <line x1="16" x2="8" y1="17" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
            <span class="font-semibold">Eksport ke PDF</span>
        </a>
    </div>
    <p class="text-xs text-slate-500 mt-3">💡 PDF termasuk imej tandatangan penerima di dalam kolom</p>
</div>

<script>
document.getElementById('exportYear').addEventListener('change', function() {
    const year = this.value;
    const excelBtn = document.getElementById('excelExportBtn');
    const pdfBtn = document.getElementById('pdfExportBtn');
    
    excelBtn.href = "{{ route('reports.export.excel') }}?year=" + year;
    pdfBtn.href = "{{ route('reports.export.pdf') }}?year=" + year;
});
</script>
@endsection
