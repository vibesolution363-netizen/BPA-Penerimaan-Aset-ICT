<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Penerimaan Aset ICT LPB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-800">
    
    <!-- Header -->
    <header class="bg-blue-900 text-white shadow-lg sticky top-0 z-50">
        <div class="px-3 py-3 md:px-4 md:py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2 md:space-x-3">
                <button id="sidebarToggle" class="lg:hidden text-white hover:bg-blue-800 p-2 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6"></line>
                        <line x1="3" x2="21" y1="12" y2="12"></line>
                        <line x1="3" x2="21" y1="18" y2="18"></line>
                    </svg>
                </button>
                <div class="bg-white p-1.5 md:p-2 rounded-lg">
                    <img src="{{ asset('images/BPA Logo Transperants.svg') }}" alt="BPA Logo" class="w-5 h-5 md:w-7 md:h-7 object-contain">
                </div>
                <div>
                    <h1 class="text-base md:text-xl font-bold leading-tight">Sistem Penerimaan Aset ICT LPB</h1>
                    <p class="text-blue-200 text-[10px] md:text-xs">E-Signature Enabled</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="hidden md:block text-right text-sm">
                    <p>Tarikh: {{ now()->format('d/m/Y') }}</p>
                    <p class="font-semibold text-green-300">Status: Aktif</p>
                </div>
                
                @auth
                <div class="relative group">
                    <button class="flex items-center space-x-2 px-3 py-2 bg-blue-800 hover:bg-blue-700 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="hidden md:inline text-sm font-medium">{{ Auth::user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-slate-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                        <div class="p-3 border-b border-slate-200">
                            <p class="text-sm font-semibold text-slate-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="flex items-center space-x-2 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Profile</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center space-x-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors rounded-b-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" x2="9" y1="12" y2="12"></line>
                                </svg>
                                <span>Log Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:sticky top-0 lg:top-[72px] left-0 h-screen lg:h-[calc(100vh-72px)] w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40 overflow-y-auto lg:self-start">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-slate-800">Menu</h2>
                    <button id="sidebarClose" class="lg:hidden text-slate-400 hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 font-medium' : 'text-slate-600 hover:bg-slate-50' }} transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                            <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                            <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                            <rect width="7" height="5" x="3" y="16" rx="1"></rect>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('reports.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('reports.index') ? 'bg-blue-50 text-blue-700 font-medium' : 'text-slate-600 hover:bg-slate-50' }} transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                        <span>Laporan</span>
                    </a>
                    
                    <div class="pt-4 mt-4 border-t border-slate-200">
                        <a href="{{ route('settings.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('settings.index') ? 'bg-blue-50 text-blue-700 font-medium' : 'text-slate-600 hover:bg-slate-50' }} transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                                <path d="m4.2 4.2 4.2 4.2m5.6 5.6 4.2 4.2"></path>
                                <path d="M1 12h6m6 0h6"></path>
                                <path d="m4.2 19.8 4.2-4.2m5.6-5.6 4.2-4.2"></path>
                            </svg>
                            <span>Tetapan</span>
                        </a>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Sidebar Overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden"></div>

        <!-- Main Content -->
        <main class="flex-1 p-3 md:p-4 lg:p-8">
        
        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-3 mb-6">
            <div class="bg-slate-700 text-white rounded-xl p-6 shadow-md flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-1">Jumlah Aset</p>
                    <h3 class="text-3xl font-bold" id="stat-total">{{ $stats['total'] }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="16" height="16" x="4" y="4" rx="2"></rect>
                        <rect width="6" height="6" x="9" y="9" rx="1"></rect>
                        <path d="M15 2v2"></path>
                        <path d="M15 20v2"></path>
                        <path d="M2 15h2"></path>
                        <path d="M2 9h2"></path>
                        <path d="M20 15h2"></path>
                        <path d="M20 9h2"></path>
                        <path d="M9 2v2"></path>
                        <path d="M9 20v2"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-indigo-600 text-white rounded-xl p-6 shadow-md flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-1">Jumlah Penerima</p>
                    <h3 class="text-3xl font-bold" id="stat-recipients">{{ $stats['recipients'] }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-green-600 text-white rounded-xl p-6 shadow-md flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-1">Telah Diserah</p>
                    <h3 class="text-3xl font-bold" id="stat-received">{{ $stats['received'] }}/{{ $stats['total'] }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <path d="m9 11 3 3L22 4"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-blue-600 text-white rounded-xl p-6 shadow-md flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-1">Unit AiO</p>
                    <h3 class="text-3xl font-bold" id="stat-aio">{{ $stats['aio'] }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                        <line x1="8" x2="16" y1="21" y2="21"></line>
                        <line x1="12" x2="12" y1="17" y2="21"></line>
                    </svg>
                </div>
            </div>

            <div class="bg-purple-600 text-white rounded-xl p-6 shadow-md flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-1">Unit Laptop</p>
                    <h3 class="text-3xl font-bold" id="stat-laptop">{{ $stats['laptop'] }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-3 mb-4 bg-white p-3 md:p-4 rounded-xl shadow-sm border border-slate-200">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <svg class="absolute left-3 top-3 text-slate-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <select id="yearSelect" class="pl-9 pr-10 py-2 rounded-lg text-sm font-bold border-2 border-blue-600 text-blue-700 bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer" onchange="changeYear(this.value)">
                        @foreach($availableYears as $year)
                            <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>Tahun {{ $year }}</option>
                        @endforeach
                        @if(!$availableYears->contains(date('Y')))
                            <option value="{{ date('Y') }}" selected>Tahun {{ date('Y') }}</option>
                        @endif
                    </select>
                    <svg class="absolute right-3 top-3 text-blue-600 pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
            </div>
            
            <div class="relative w-full md:w-96">
                <form method="GET" action="{{ route('assets.index') }}" class="relative">
                    <svg class="absolute left-3 top-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input 
                        type="text" 
                        name="search"
                        id="searchInput"
                        value="{{ request('search') }}"
                        placeholder="Cari nama penerima atau jenis..." 
                        class="w-full pl-10 pr-10 py-2 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 {{ request('search') ? 'border-blue-500 bg-blue-50' : '' }}"
                    />
                    @if(request('search'))
                        <button type="button" onclick="clearSearch()" class="absolute right-3 top-3 text-slate-400 hover:text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                        </button>
                    @endif
                    <input type="hidden" name="year" value="{{ $currentYear }}">
                    @if(request('type'))
                        <input type="hidden" name="type" value="{{ request('type') }}">
                    @endif
                </form>
                @if(request('search'))
                    <div class="text-xs text-blue-600 mt-1">
                        Mencari: <strong>{{ request('search') }}</strong>
                        <span class="text-slate-500">({{ $recipients->total() }} hasil)</span>
                    </div>
                @endif
            </div>
            
            <div class="flex flex-wrap items-center gap-2 w-full md:w-auto justify-center md:justify-start">
                <div class="relative">
                    <svg class="absolute left-3 top-3 text-slate-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                    </svg>
                    <select id="filterSelect" class="pl-9 pr-4 py-2 rounded-lg text-sm font-medium border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none cursor-pointer">
                        <option value="Semua" {{ request('type') == '' ? 'selected' : '' }}>Semua Jenis Aset</option>
                        @foreach($assetTypes as $type)
                            <option value="{{ $type->nama }}" {{ request('type') == $type->nama ? 'selected' : '' }}>{{ $type->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button id="addTypeBtn" class="flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-bold transition-colors bg-purple-600 text-white hover:bg-purple-700 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                        <line x1="8" x2="16" y1="21" y2="21"></line>
                        <line x1="12" x2="12" y1="17" y2="21"></line>
                        <line x1="12" x2="12" y1="7" y2="13"></line>
                        <line x1="9" x2="15" y1="10" y2="10"></line>
                    </svg>
                    <span>Tambah Jenis Aset</span>
                </button>
                <button id="addRecipientBtn" class="flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-bold transition-colors bg-green-600 text-white hover:bg-green-700 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <line x1="19" x2="19" y1="8" y2="14"></line>
                        <line x1="22" x2="16" y1="11" y2="11"></line>
                    </svg>
                    <span>Tambah Penerima</span>
                </button>
            </div>
        </div>

        <!-- Table - Desktop View -->
        <div class="hidden lg:block bg-white rounded-lg shadow overflow-hidden border border-slate-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 text-slate-600 text-[11px] font-medium uppercase border-b-2 border-slate-300">
                            <th class="px-2 py-2 border-r border-slate-200">Bil</th>
                            <th class="px-2 py-2 border-r border-slate-200">Nama Penerima</th>
                            <th class="px-2 py-2 border-r border-slate-200">Jenis Aset</th>
                            <th class="px-2 py-2 border-r border-slate-200">Tarikh Penerimaan</th>
                            <th class="px-2 py-2 border-r border-slate-200">Laptop/AIO/Desktop</th>
                            <th class="px-2 py-2 border-r border-slate-200">Adapter Charger</th>
                            <th class="px-2 py-2 border-r border-slate-200">DVD Drive</th>
                            <th class="px-2 py-2 border-r border-slate-200">Power Cord</th>
                            <th class="px-2 py-2 border-r border-slate-200">Dongle</th>
                            <th class="px-2 py-2 border-r border-slate-200">Mouse</th>
                            <th class="px-2 py-2 border-r border-slate-200">Monitor</th>
                            <th class="px-2 py-2 border-r border-slate-200">Keyboard</th>
                            <th class="px-2 py-2 border-r border-slate-200">UPS</th>
                            <th class="px-2 py-2 text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody id="assetTableBody">
                        @foreach($recipients as $index => $recipient)
                            @foreach($recipient->assets as $assetIndex => $asset)
                            <tr class="hover:bg-slate-50 border-b border-slate-200" data-recipient-id="{{ $recipient->id }}" data-asset-id="{{ $asset->id }}">
                                @if($assetIndex === 0)
                                <td class="px-2 py-1.5 text-xs text-slate-500 border-r border-slate-200" rowspan="{{ $recipient->assets->count() }}">{{ $index + 1 }}</td>
                                
                                <td class="px-2 py-1.5 border-r border-slate-200" rowspan="{{ $recipient->assets->count() }}">
                                    <div class="flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <div>
                                            <p class="text-xs font-medium text-slate-800">{{ $recipient->nama }}</p>
                                            <p class="text-[10px] text-slate-500">{{ $recipient->profil }}</p>
                                        </div>
                                    </div>
                                </td>
                                @endif

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    @php
                                        $assetTypeExists = $assetTypes->contains('nama', $asset->jenis);
                                    @endphp
                                    @if($assetTypeExists)
                                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium {{ str_contains($asset->jenis, 'Laptop') ? 'bg-purple-50 text-purple-700' : 'bg-blue-50 text-blue-700' }}">
                                            {{ str_contains($asset->jenis, 'Laptop') ? '💻' : '🖥️' }}
                                            <span class="ml-1">{{ $asset->jenis }}</span>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium bg-red-50 text-red-700">
                                            ⚠️ Tiada Rekod
                                        </span>
                                    @endif
                                </td>

                                <td class="px-2 py-1.5 bg-slate-50/50 border-r border-slate-200">
                                    <span class="text-[11px] {{ $asset->tarikh_penerimaan ? 'text-slate-700' : 'text-slate-400' }}">
                                        {{ $asset->tarikh_penerimaan ? \Carbon\Carbon::parse($asset->tarikh_penerimaan)->format('d/m/Y') : '-' }}
                                    </span>
                                </td>

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    <div class="edit-container" data-asset-id="{{ $asset->id }}">
                                        <div class="sn-display cursor-pointer hover:bg-blue-50 px-1 py-0.5 rounded">
                                            <span class="text-[11px] {{ $asset->siri_device ? 'font-mono text-slate-700' : 'text-slate-400' }}">
                                                {{ $asset->siri_device ?: '-' }}
                                            </span>
                                        </div>
                                        <input type="text" class="sn-input hidden w-full text-[11px] border p-1 rounded focus:ring-1 focus:ring-blue-500" data-field="siri_device" data-asset-id="{{ $asset->id }}" value="{{ $asset->siri_device }}">
                                    </div>
                                </td>

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    <div class="edit-container" data-asset-id="{{ $asset->id }}">
                                        <div class="sn-display cursor-pointer hover:bg-blue-50 px-1 py-0.5 rounded">
                                            <span class="text-[11px] {{ $asset->siri_adapter ? 'font-mono text-slate-700' : 'text-slate-400' }}">
                                                {{ $asset->siri_adapter ?: '-' }}
                                            </span>
                                        </div>
                                        <input type="text" class="sn-input hidden w-full text-[11px] border p-1 rounded focus:ring-1 focus:ring-blue-500" data-field="siri_adapter" data-asset-id="{{ $asset->id }}" value="{{ $asset->siri_adapter }}">
                                    </div>
                                </td>

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    <div class="edit-container" data-asset-id="{{ $asset->id }}">
                                        <div class="sn-display cursor-pointer hover:bg-blue-50 px-1 py-0.5 rounded">
                                            <span class="text-[11px] {{ $asset->siri_dvd_drive ? 'font-mono text-slate-700' : 'text-slate-400' }}">
                                                {{ $asset->siri_dvd_drive ?: '-' }}
                                            </span>
                                        </div>
                                        <input type="text" class="sn-input hidden w-full text-[11px] border p-1 rounded focus:ring-1 focus:ring-blue-500" data-field="siri_dvd_drive" data-asset-id="{{ $asset->id }}" value="{{ $asset->siri_dvd_drive }}">
                                    </div>
                                </td>

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    <div class="edit-container" data-asset-id="{{ $asset->id }}">
                                        <div class="sn-display cursor-pointer hover:bg-blue-50 px-1 py-0.5 rounded">
                                            <span class="text-[11px] {{ $asset->siri_cord ? 'font-mono text-slate-700' : 'text-slate-400' }}">
                                                {{ $asset->siri_cord ?: '-' }}
                                            </span>
                                        </div>
                                        <input type="text" class="sn-input hidden w-full text-[11px] border p-1 rounded focus:ring-1 focus:ring-blue-500" data-field="siri_cord" data-asset-id="{{ $asset->id }}" value="{{ $asset->siri_cord }}">
                                    </div>
                                </td>

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    <div class="edit-container" data-asset-id="{{ $asset->id }}">
                                        <div class="sn-display cursor-pointer hover:bg-blue-50 px-1 py-0.5 rounded">
                                            <span class="text-[11px] {{ $asset->siri_dongle ? 'font-mono text-slate-700' : 'text-slate-400' }}">
                                                {{ $asset->siri_dongle ?: '-' }}
                                            </span>
                                        </div>
                                        <input type="text" class="sn-input hidden w-full text-[11px] border p-1 rounded focus:ring-1 focus:ring-blue-500" data-field="siri_dongle" data-asset-id="{{ $asset->id }}" value="{{ $asset->siri_dongle }}">
                                    </div>
                                </td>

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    <div class="edit-container" data-asset-id="{{ $asset->id }}">
                                        <div class="sn-display cursor-pointer hover:bg-blue-50 px-1 py-0.5 rounded">
                                            <span class="text-[11px] {{ $asset->siri_mouse ? 'font-mono text-slate-700' : 'text-slate-400' }}">
                                                {{ $asset->siri_mouse ?: '-' }}
                                            </span>
                                        </div>
                                        <input type="text" class="sn-input hidden w-full text-[11px] border p-1 rounded focus:ring-1 focus:ring-blue-500" data-field="siri_mouse" data-asset-id="{{ $asset->id }}" value="{{ $asset->siri_mouse }}">
                                    </div>
                                </td>

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    <div class="edit-container" data-asset-id="{{ $asset->id }}">
                                        <div class="sn-display cursor-pointer hover:bg-blue-50 px-1 py-0.5 rounded">
                                            <span class="text-[11px] {{ $asset->siri_monitor ? 'font-mono text-slate-700' : 'text-slate-400' }}">
                                                {{ $asset->siri_monitor ?: '-' }}
                                            </span>
                                        </div>
                                        <input type="text" class="sn-input hidden w-full text-[11px] border p-1 rounded focus:ring-1 focus:ring-blue-500" data-field="siri_monitor" data-asset-id="{{ $asset->id }}" value="{{ $asset->siri_monitor }}">
                                    </div>
                                </td>

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    <div class="edit-container" data-asset-id="{{ $asset->id }}">
                                        <div class="sn-display cursor-pointer hover:bg-blue-50 px-1 py-0.5 rounded">
                                            <span class="text-[11px] {{ $asset->siri_keyboard ? 'font-mono text-slate-700' : 'text-slate-400' }}">
                                                {{ $asset->siri_keyboard ?: '-' }}
                                            </span>
                                        </div>
                                        <input type="text" class="sn-input hidden w-full text-[11px] border p-1 rounded focus:ring-1 focus:ring-blue-500" data-field="siri_keyboard" data-asset-id="{{ $asset->id }}" value="{{ $asset->siri_keyboard }}">
                                    </div>
                                </td>

                                <td class="px-2 py-1.5 border-r border-slate-200">
                                    <div class="edit-container" data-asset-id="{{ $asset->id }}">
                                        <div class="sn-display cursor-pointer hover:bg-blue-50 px-1 py-0.5 rounded">
                                            <span class="text-[11px] {{ $asset->siri_ups ? 'font-mono text-slate-700' : 'text-slate-400' }}">
                                                {{ $asset->siri_ups ?: '-' }}
                                            </span>
                                        </div>
                                        <input type="text" class="sn-input hidden w-full text-[11px] border p-1 rounded focus:ring-1 focus:ring-blue-500" data-field="siri_ups" data-asset-id="{{ $asset->id }}" value="{{ $asset->siri_ups }}">
                                    </div>
                                </td>

                                @if($assetIndex === 0)
                                <td class="px-2 py-1.5" rowspan="{{ $recipient->assets->count() }}">
                                    <div class="flex justify-center items-center gap-1">
                                        @if($recipient->isDiterima())
                                            <div class="flex flex-col items-center gap-0.5">
                                                <span class="flex items-center text-green-600 text-[10px] font-semibold">
                                                    ✓ DITERIMA
                                                </span>
                                                @if($recipient->signature)
                                                    <button class="view-signature-btn text-[10px] text-blue-600 hover:underline" data-signature="{{ $recipient->signature }}">
                                                        Lihat
                                                    </button>
                                                @endif
                                            </div>
                                        @else
                                            <button class="sign-btn flex items-center gap-1 px-2 py-1 rounded text-[10px] font-semibold bg-blue-600 text-white hover:bg-blue-700" data-recipient-id="{{ $recipient->id }}" data-recipient-name="{{ $recipient->nama }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                                                </svg>
                                                <span>TANDATANGAN</span>
                                            </button>
                                        @endif
                                        
                                        <button class="reset-btn inline-flex items-center justify-center w-7 h-7 text-white bg-orange-500 hover:bg-orange-600 rounded transition-colors" data-recipient-id="{{ $recipient->id }}" data-recipient-name="{{ $recipient->nama }}" title="Reset">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                                                <path d="M21 3v5h-5"></path>
                                                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                                                <path d="M8 16H3v5"></path>
                                            </svg>
                                        </button>
                                        
                                        <button class="delete-btn inline-flex items-center justify-center w-7 h-7 text-white bg-red-500 hover:bg-red-600 rounded transition-colors" data-recipient-id="{{ $recipient->id }}" data-recipient-name="{{ $recipient->nama }}" title="Padam">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18"></path>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mobile Card View -->
        <div class="lg:hidden space-y-4">
            @foreach($recipients as $index => $recipient)
            <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden">
                <!-- Recipient Header -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="bg-white/20 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-lg">{{ $recipient->nama }}</p>
                                <p class="text-xs text-blue-100">{{ $recipient->profil }}</p>
                            </div>
                        </div>
                        <span class="bg-white/20 px-3 py-1 rounded-full text-xs font-bold">#{{ $index + 1 }}</span>
                    </div>
                </div>

                <!-- Assets List -->
                <div class="p-4 space-y-3">
                    @forelse($recipient->assets as $asset)
                    <div class="bg-slate-50 rounded-lg p-3 border border-slate-200">
                        @php
                            $assetTypeExists = $assetTypes->contains('nama', $asset->jenis);
                        @endphp
                        
                        <!-- Asset Type Badge -->
                        <div class="mb-2">
                            @if($assetTypeExists)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ str_contains($asset->jenis, 'Laptop') ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ $asset->jenis }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                    Tiada Rekod
                                </span>
                            @endif
                        </div>

                        <!-- Tarikh Penerimaan -->
                        <div class="mb-2 pb-2 border-b border-slate-200">
                            <p class="text-slate-500 font-medium text-xs">Tarikh Penerimaan</p>
                            <p class="text-sm font-semibold text-blue-700">{{ $asset->tarikh_penerimaan ? \Carbon\Carbon::parse($asset->tarikh_penerimaan)->format('d/m/Y') : '-' }}</p>
                        </div>

                        <!-- Serial Numbers Grid -->
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div>
                                <p class="text-slate-500 font-medium">Device</p>
                                <p class="font-mono text-slate-800">{{ $asset->siri_device ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium">Adapter</p>
                                <p class="font-mono text-slate-800">{{ $asset->siri_adapter ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium">DVD Drive</p>
                                <p class="font-mono text-slate-800">{{ $asset->siri_dvd_drive ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium">Cord</p>
                                <p class="font-mono text-slate-800">{{ $asset->siri_cord ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium">Dongle</p>
                                <p class="font-mono text-slate-800">{{ $asset->siri_dongle ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium">Mouse</p>
                                <p class="font-mono text-slate-800">{{ $asset->siri_mouse ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium">Monitor</p>
                                <p class="font-mono text-slate-800">{{ $asset->siri_monitor ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium">Keyboard</p>
                                <p class="font-mono text-slate-800">{{ $asset->siri_keyboard ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium">UPS</p>
                                <p class="font-mono text-slate-800">{{ $asset->siri_ups ?: '-' }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-slate-400 py-4">Tiada aset</p>
                    @endforelse
                </div>

                <!-- Action Buttons -->
                <div class="bg-slate-50 p-3 border-t border-slate-200 flex justify-between items-center gap-2">
                    @if($recipient->isDiterima())
                        <button class="view-signature-btn flex items-center justify-center space-x-1 px-4 py-2 bg-green-100 text-green-700 rounded-lg text-xs font-bold flex-1" data-signature="{{ $recipient->signature }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <span>LIHAT</span>
                        </button>
                    @else
                        <button class="sign-btn flex items-center justify-center space-x-1 px-4 py-2 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold flex-1" data-recipient-id="{{ $recipient->id }}" data-recipient-name="{{ $recipient->nama }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                            </svg>
                            <span>TANDATANGAN</span>
                        </button>
                    @endif
                    
                    <button class="reset-btn flex items-center justify-center w-10 h-10 text-white bg-orange-600 hover:bg-orange-700 rounded-lg" data-recipient-id="{{ $recipient->id }}" data-recipient-name="{{ $recipient->nama }}" title="Reset data">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                            <path d="M21 3v5h-5"></path>
                            <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                            <path d="M8 16H3v5"></path>
                        </svg>
                    </button>
                    
                    <button class="delete-btn flex items-center justify-center w-10 h-10 text-white bg-red-600 hover:bg-red-700 rounded-lg" data-recipient-id="{{ $recipient->id }}" data-recipient-name="{{ $recipient->nama }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"></path>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                        </svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($recipients->hasPages())
        <div class="mt-6">
            {{ $recipients->links() }}
        </div>
        @endif

        </main>
    </div>

    <!-- View Signature Modal -->
    <div id="viewSignatureModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-xl shadow-2xl p-6 max-w-sm w-full relative">
            <button id="closeViewModal" class="absolute top-4 right-4 text-slate-400 hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
            <h3 class="text-lg font-bold mb-4 text-slate-800">Bukti Penerimaan</h3>
            <div class="border-2 border-slate-200 rounded-lg p-2 bg-slate-50">
                <img id="viewSignatureImage" src="" alt="Tanda Tangan" class="w-full h-auto">
            </div>
        </div>
    </div>

    <!-- Signature Modal -->
    <div id="signatureModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
            <div class="bg-slate-50 border-b p-4 flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">Tandatangan Penerima</h3>
                    <p class="text-sm text-slate-500">Sila tandatangan di bawah: <span id="recipientName" class="font-semibold text-blue-600"></span></p>
                </div>
                <button id="closeModal" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="p-4 bg-slate-100 flex justify-center">
                <canvas 
                    id="signatureCanvas"
                    width="350"
                    height="200"
                    class="bg-white rounded-lg shadow-inner cursor-crosshair touch-none border border-slate-300"
                ></canvas>
            </div>

            <div class="p-4 border-t flex justify-between items-center">
                <button id="clearCanvas" class="flex items-center space-x-2 text-red-500 hover:bg-red-50 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6h18"></path>
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                    </svg>
                    <span>Padam</span>
                </button>
                <div class="flex space-x-3">
                    <button id="cancelModal" class="px-4 py-2 text-slate-600 font-medium hover:bg-slate-100 rounded-lg text-sm">
                        Batal
                    </button>
                    <button id="confirmSignature" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-bold shadow-lg transition-all">
                        Sahkan & Terima
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Recipient Modal -->
    <div id="addRecipientModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] flex flex-col overflow-hidden">
            <div class="bg-slate-50 border-b p-4 flex justify-between items-center flex-shrink-0">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">Tambah Penerima Baru</h3>
                    <p class="text-sm text-slate-500">Isi maklumat penerima aset</p>
                </div>
                <button id="closeAddModal" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="addRecipientForm" class="flex flex-col flex-1 overflow-hidden">
                <div class="p-6 space-y-4 overflow-y-auto flex-1">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nama Penerima *</label>
                        <input type="text" name="nama" required class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Pn. Siti Binti Ahmad">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Aset * <span class="text-xs text-slate-500">(Pilih satu atau lebih)</span></label>
                        <div class="border border-slate-300 rounded-lg p-3 max-h-40 overflow-y-auto space-y-2">
                            @foreach($assetTypes as $type)
                            <div class="flex items-center justify-between hover:bg-slate-50 p-2 rounded group">
                                <label class="flex items-center space-x-2 cursor-pointer flex-1">
                                    <input type="checkbox" name="asset_types[]" value="{{ $type->nama }}" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-2 focus:ring-blue-500">
                                    <span class="text-sm text-slate-700">{{ $type->nama }}</span>
                                </label>
                                <button type="button" class="delete-asset-type-btn opacity-0 group-hover:opacity-100 text-red-500 hover:text-red-700 hover:bg-red-50 p-1 rounded transition-all" data-type-id="{{ $type->id }}" data-type-name="{{ $type->nama }}" title="Padam jenis aset">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18"></path>
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </div>
                            @endforeach
                        </div>
                        <p class="text-xs text-slate-500 mt-1">Serial numbers akan ditambah selepas pilih jenis aset</p>
                    </div>

                    <div id="assetSerialFields" class="space-y-3 hidden">
                        <!-- Serial number fields akan appear di sini -->
                    </div>
                </div>

                <div class="flex justify-end space-x-3 p-4 border-t bg-white flex-shrink-0">
                    <button type="button" id="cancelAddModal" class="px-4 py-2 text-slate-600 font-medium hover:bg-slate-100 rounded-lg text-sm">
                        Batal
                    </button>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg text-sm font-bold shadow-lg transition-all">
                        Tambah Penerima
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Asset Type Modal -->
    <div id="addTypeModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
            <div class="bg-slate-50 border-b p-4 flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">Tambah Jenis Aset</h3>
                    <p class="text-sm text-slate-500">Masukkan nama jenis aset baru</p>
                </div>
                <button id="closeTypeModal" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="addTypeForm" class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Jenis Aset *</label>
                    <input type="text" name="nama" required class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Desktop, Tablet, dll">
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <button type="button" id="cancelTypeModal" class="px-4 py-2 text-slate-600 font-medium hover:bg-slate-100 rounded-lg text-sm">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-bold shadow-lg shadow-blue-600/30 transition-all transform hover:scale-105 active:scale-95">
                        Tambah Jenis
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose = document.getElementById('sidebarClose');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        }

        sidebarToggle.addEventListener('click', openSidebar);
        sidebarClose.addEventListener('click', closeSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        // Asset Management JavaScript
        console.log('Script loaded');
        let currentFilter = 'Semua';
        let searchTerm = '';
        let currentRecipientId = null;
        let isDrawing = false;

        // Setup CSRF token for AJAX
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        console.log('CSRF Token:', csrfToken ? 'Found' : 'Missing');

        // Canvas setup
        const canvas = document.getElementById('signatureCanvas');
        const ctx = canvas.getContext('2d');
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000000';
        console.log('Canvas initialized');

        // Search functionality
        // Year change function
        function changeYear(year) {
            const params = new URLSearchParams(window.location.search);
            params.set('year', year);
            params.delete('page'); // Reset to page 1
            window.location.href = '{{ route("assets.index") }}?' + params.toString();
        }

        // Clear search function
        function clearSearch() {
            const params = new URLSearchParams(window.location.search);
            params.delete('search');
            params.delete('page'); // Reset to page 1
            window.location.href = '{{ route("assets.index") }}?' + params.toString();
        }

        // Search form - submit on input with debounce
        let searchTimeout;
        document.getElementById('searchInput').addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                e.target.form.submit();
            }, 500); // 500ms debounce
        });

        // Filter dropdown - submit form when changed
        document.getElementById('filterSelect').addEventListener('change', (e) => {
            const form = document.querySelector('form[action*="assets.index"]');
            const searchInput = document.getElementById('searchInput');
            const yearInput = document.getElementById('yearSelect');
            
            // Build URL with all parameters
            const params = new URLSearchParams();
            if (searchInput.value) params.set('search', searchInput.value);
            if (yearInput.value) params.set('year', yearInput.value);
            if (e.target.value !== 'Semua') params.set('type', e.target.value);
            
            window.location.href = '{{ route("assets.index") }}?' + params.toString();
        });

        // Edit functionality - click on display to edit each asset individually
        document.querySelectorAll('.sn-display').forEach(display => {
            display.addEventListener('click', (e) => {
                const container = e.target.closest('.edit-container');
                const displayDiv = container.querySelector('.sn-display');
                const input = container.querySelector('.sn-input');
                
                // Hide display, show input
                displayDiv.classList.add('hidden');
                input.classList.remove('hidden');
                input.focus();
                
                // Add save/cancel buttons if not exists
                if (!container.querySelector('.action-buttons')) {
                    const actionDiv = document.createElement('div');
                    actionDiv.className = 'action-buttons flex gap-1 mt-1';
                    actionDiv.innerHTML = `
                        <button class="save-cell-btn px-2 py-1 bg-green-500 text-white rounded text-xs hover:bg-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </button>
                        <button class="cancel-cell-btn px-2 py-1 bg-slate-400 text-white rounded text-xs hover:bg-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    `;
                    container.appendChild(actionDiv);
                    
                    // Save button
                    actionDiv.querySelector('.save-cell-btn').addEventListener('click', async () => {
                        const assetId = input.dataset.assetId;
                        const field = input.dataset.field;
                        const value = input.value;
                        
                        // Get current asset's row to find all its fields
                        const row = container.closest('tr');
                        const allContainers = row.querySelectorAll(`.edit-container[data-asset-id="${assetId}"]`);
                        
                        const data = {
                            tarikh_penerimaan: '',
                            siri_device: '',
                            siri_adapter: '',
                            siri_dvd_drive: '',
                            siri_cord: '',
                            siri_dongle: '',
                            siri_mouse: '',
                            siri_monitor: '',
                            siri_keyboard: '',
                            siri_ups: ''
                        };
                        
                        // Collect all values for this specific asset
                        allContainers.forEach(cont => {
                            const inp = cont.querySelector('.sn-input');
                            const fld = inp.dataset.field;
                            data[fld] = inp.value;
                        });

                        try {
                            const response = await fetch(`/assets/${assetId}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify(data)
                            });

                            const result = await response.json();
                            
                            if (result.success) {
                                const span = displayDiv.querySelector('span');
                                
                                // Format display based on field type
                                if (field === 'tarikh_penerimaan' && value) {
                                    // Format date as dd/mm/yyyy
                                    const date = new Date(value);
                                    const day = String(date.getDate()).padStart(2, '0');
                                    const month = String(date.getMonth() + 1).padStart(2, '0');
                                    const year = date.getFullYear();
                                    span.textContent = `${day}/${month}/${year}`;
                                    span.className = 'text-xs text-slate-700 font-medium';
                                } else {
                                    span.textContent = value || '-';
                                    span.className = value ? 'text-xs font-mono text-slate-700' : 'text-xs text-slate-400 italic';
                                }
                                
                                displayDiv.classList.remove('hidden');
                                input.classList.add('hidden');
                                actionDiv.remove();
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            showAlert('Ralat menyimpan data', 'error');
                        }
                    });
                    
                    // Cancel button
                    actionDiv.querySelector('.cancel-cell-btn').addEventListener('click', () => {
                        displayDiv.classList.remove('hidden');
                        input.classList.add('hidden');
                        input.value = input.defaultValue;
                        actionDiv.remove();
                    });
                }
            });
        });



        // Add Recipient Modal
        const addRecipientBtn = document.getElementById('addRecipientBtn');
        const addRecipientModal = document.getElementById('addRecipientModal');
        const closeAddModal = document.getElementById('closeAddModal');
        const cancelAddModal = document.getElementById('cancelAddModal');
        const addRecipientForm = document.getElementById('addRecipientForm');

        console.log('Add Recipient Button:', addRecipientBtn ? 'Found' : 'Missing');

        if (addRecipientBtn) {
            addRecipientBtn.addEventListener('click', () => {
                console.log('Add Recipient button clicked');
                addRecipientModal.classList.remove('hidden');
            });
        }

        if (closeAddModal) {
            closeAddModal.addEventListener('click', () => {
                addRecipientModal.classList.add('hidden');
                addRecipientForm.reset();
            });
        }

        if (cancelAddModal) {
            cancelAddModal.addEventListener('click', () => {
                addRecipientModal.classList.add('hidden');
                addRecipientForm.reset();
            });
        }

        // Handle asset type checkbox selection
        const assetTypeCheckboxes = document.querySelectorAll('input[name="asset_types[]"]');
        const assetSerialFields = document.getElementById('assetSerialFields');
        
        assetTypeCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                updateSerialFields();
            });
        });

        // Handle delete asset type
        document.querySelectorAll('.delete-asset-type-btn').forEach(btn => {
            btn.addEventListener('click', async function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const typeId = this.dataset.typeId;
                const typeName = this.dataset.typeName;
                
                const confirmed = await showConfirm(`Adakah anda pasti untuk memadam jenis aset "${typeName}"?\n\nAset dengan jenis ini akan ditandakan sebagai "Tiada Rekod".`, 'spabtm.test says');
                if (!confirmed) {
                    return;
                }
                
                try {
                    const response = await fetch(`/asset-types/${typeId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });

                    const data = await response.json();
                    
                    if (response.ok && data.success) {
                        await showAlert('Jenis aset berjaya dipadam', 'success');
                        window.location.reload();
                    } else {
                        showAlert(data.message || 'Ralat memadam jenis aset', 'error');
                    }
                } catch (error) {
                    console.error('Error deleting asset type:', error);
                    showAlert('Ralat memadam jenis aset: ' + error.message, 'error');
                }
            });
        });

        function updateSerialFields() {
            const selectedTypes = Array.from(assetTypeCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            if (selectedTypes.length === 0) {
                assetSerialFields.classList.add('hidden');
                assetSerialFields.innerHTML = '';
                return;
            }

            assetSerialFields.classList.remove('hidden');
            assetSerialFields.innerHTML = '';

            selectedTypes.forEach((type, index) => {
                const fieldSet = document.createElement('div');
                fieldSet.className = 'border border-slate-200 rounded-lg p-3 bg-slate-50';
                fieldSet.innerHTML = `
                    <h4 class="text-sm font-semibold text-slate-700 mb-2">${type}</h4>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-xs text-slate-600 mb-1">SN Device</label>
                            <input type="text" name="assets[${index}][siri_device]" class="w-full px-2 py-1.5 text-xs border border-slate-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Optional">
                            <input type="hidden" name="assets[${index}][jenis]" value="${type}">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-600 mb-1">SN Adapter</label>
                            <input type="text" name="assets[${index}][siri_adapter]" class="w-full px-2 py-1.5 text-xs border border-slate-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Optional">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-600 mb-1">SN Power Cord</label>
                            <input type="text" name="assets[${index}][siri_cord]" class="w-full px-2 py-1.5 text-xs border border-slate-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Optional">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-600 mb-1">SN Dongle</label>
                            <input type="text" name="assets[${index}][siri_dongle]" class="w-full px-2 py-1.5 text-xs border border-slate-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Optional">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-600 mb-1">SN Mouse</label>
                            <input type="text" name="assets[${index}][siri_mouse]" class="w-full px-2 py-1.5 text-xs border border-slate-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Optional">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-600 mb-1">SN Keyboard</label>
                            <input type="text" name="assets[${index}][siri_keyboard]" class="w-full px-2 py-1.5 text-xs border border-slate-300 rounded focus:ring-2 focus:ring-blue-500" placeholder="Optional">
                        </div>
                    </div>
                `;
                assetSerialFields.appendChild(fieldSet);
            });
        }

        if (addRecipientForm) {
            addRecipientForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                
                const selectedTypes = Array.from(assetTypeCheckboxes).filter(cb => cb.checked);
                if (selectedTypes.length === 0) {
                    showAlert('Sila pilih sekurang-kurangnya satu jenis aset', 'warning');
                    return;
                }

                const formData = new FormData(addRecipientForm);
                
                try {
                    const response = await fetch('{{ route("assets.store") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });

                    if (response.ok) {
                        addRecipientModal.classList.add('hidden');
                        addRecipientForm.reset();
                        assetSerialFields.classList.add('hidden');
                        assetSerialFields.innerHTML = '';
                        window.location.reload();
                    } else {
                        const data = await response.json();
                        showAlert(data.message || 'Ralat menambah penerima', 'error');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showAlert('Ralat menambah penerima', 'error');
                }
            });
        }

        // Reset Recipient Data
        const resetButtons = document.querySelectorAll('.reset-btn');
        console.log('Reset buttons found:', resetButtons.length);
        resetButtons.forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                const recipientId = e.currentTarget.dataset.recipientId;
                const recipientName = e.currentTarget.dataset.recipientName;
                
                console.log('Reset clicked:', recipientId, recipientName);
                
                const confirmed = await showConfirm(`Adakah anda pasti untuk reset semua data untuk "${recipientName}"?\n\nData yang akan dipadam:\n- Tarikh Penerimaan\n- Semua Serial Number\n- Tandatangan\n\nNama penerima dan jenis aset akan kekal.`, 'spabtm.test says');
                if (!confirmed) {
                    return;
                }
                
                try {
                    const response = await fetch(`/recipients/${recipientId}/reset`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });

                    const data = await response.json();
                    
                    if (response.ok && data.success) {
                        await showAlert('Data penerima berjaya direset', 'success');
                        window.location.reload();
                    } else {
                        showAlert(data.message || 'Ralat reset data penerima', 'error');
                    }
                } catch (error) {
                    console.error('Error resetting recipient:', error);
                    showAlert('Ralat reset data penerima: ' + error.message, 'error');
                }
            });
        });

        // Delete Recipient
        const deleteButtons = document.querySelectorAll('.delete-btn');
        console.log('Delete buttons found:', deleteButtons.length);
        deleteButtons.forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                const recipientId = e.currentTarget.dataset.recipientId;
                const recipientName = e.currentTarget.dataset.recipientName;
                
                console.log('Delete clicked:', recipientId, recipientName);
                
                const confirmed = await showConfirm(`Adakah anda pasti mahu memadam penerima "${recipientName}" dan semua aset mereka?`, 'spabtm.test says');
                if (!confirmed) {
                    return;
                }
                
                try {
                    const response = await fetch(`/recipients/${recipientId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });

                    const data = await response.json();
                    
                    if (response.ok && data.success) {
                        await showAlert('Penerima berjaya dipadam', 'success');
                        window.location.reload();
                    } else {
                        showAlert(data.message || 'Ralat memadam penerima', 'error');
                    }
                } catch (error) {
                    console.error('Error deleting recipient:', error);
                    showAlert('Ralat memadam penerima: ' + error.message, 'error');
                }
            });
        });

        // Signature Modal
        const signButtons = document.querySelectorAll('.sign-btn');
        console.log('Sign buttons found:', signButtons.length);
        signButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                console.log('Sign button clicked');
                currentRecipientId = e.currentTarget.dataset.recipientId;
                const recipientName = e.currentTarget.dataset.recipientName;
                
                document.getElementById('recipientName').textContent = recipientName;
                document.getElementById('signatureModal').classList.remove('hidden');
                clearCanvasFunc();
            });
        });

        function closeSignatureModal() {
            document.getElementById('signatureModal').classList.add('hidden');
            currentRecipientId = null;
            // Clear canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        document.getElementById('closeModal').addEventListener('click', closeSignatureModal);
        document.getElementById('cancelModal').addEventListener('click', closeSignatureModal);

        // Canvas Drawing
        function getCoordinates(event) {
            const rect = canvas.getBoundingClientRect();
            let clientX, clientY;

            if (event.touches) {
                clientX = event.touches[0].clientX;
                clientY = event.touches[0].clientY;
            } else {
                clientX = event.clientX;
                clientY = event.clientY;
            }

            return {
                x: clientX - rect.left,
                y: clientY - rect.top
            };
        }

        function startDrawing(e) {
            e.preventDefault();
            isDrawing = true;
            const { x, y } = getCoordinates(e);
            ctx.beginPath();
            ctx.moveTo(x, y);
        }

        function draw(e) {
            if (!isDrawing) return;
            e.preventDefault();
            const { x, y } = getCoordinates(e);
            ctx.lineTo(x, y);
            ctx.stroke();
        }

        function stopDrawing() {
            isDrawing = false;
            ctx.closePath();
        }

        canvas.addEventListener('mousedown', startDrawing);
        canvas.addEventListener('mousemove', draw);
        canvas.addEventListener('mouseup', stopDrawing);
        canvas.addEventListener('mouseleave', stopDrawing);
        canvas.addEventListener('touchstart', startDrawing);
        canvas.addEventListener('touchmove', draw);
        canvas.addEventListener('touchend', stopDrawing);

        document.getElementById('clearCanvas').addEventListener('click', clearCanvasFunc);

        function clearCanvasFunc() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        // Confirm Signature
        document.getElementById('confirmSignature').addEventListener('click', async () => {
            const dataUrl = canvas.toDataURL('image/png');
            
            try {
                const response = await fetch(`/recipients/${currentRecipientId}/sign`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ signature: dataUrl })
                });

                const result = await response.json();
                
                if (result.success) {
                    // Close modal immediately
                    closeSignatureModal();
                    
                    // Reload to show updated data
                    location.reload();
                }
            } catch (error) {
                console.error('Error:', error);
                showAlert('Ralat menyimpan tandatangan', 'error');
            }
        });

        // View Signature
        document.querySelectorAll('.view-signature-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const signature = e.target.dataset.signature;
                document.getElementById('viewSignatureImage').src = signature;
                document.getElementById('viewSignatureModal').classList.remove('hidden');
            });
        });

        document.getElementById('closeViewModal').addEventListener('click', () => {
            document.getElementById('viewSignatureModal').classList.add('hidden');
        });

        // Add Asset Type Modal
        document.getElementById('addTypeBtn').addEventListener('click', () => {
            document.getElementById('addTypeModal').classList.remove('hidden');
        });

        document.getElementById('closeTypeModal').addEventListener('click', closeTypeModal);
        document.getElementById('cancelTypeModal').addEventListener('click', closeTypeModal);

        function closeTypeModal() {
            document.getElementById('addTypeModal').classList.add('hidden');
            document.getElementById('addTypeForm').reset();
        }

        // Add Type Form Submission
        document.getElementById('addTypeForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData);

            try {
                const response = await fetch('/asset-types', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                
                if (result.success) {
                    // Add new option to jenis select
                    const jenisSelect = document.getElementById('jenisSelect');
                    const jenisOption = document.createElement('option');
                    jenisOption.value = result.assetType.nama;
                    jenisOption.textContent = result.assetType.nama;
                    jenisOption.selected = true;
                    jenisSelect.appendChild(jenisOption);
                    
                    // Add new option to filter dropdown
                    const filterSelect = document.getElementById('filterSelect');
                    const filterOption = document.createElement('option');
                    filterOption.value = result.assetType.nama;
                    filterOption.textContent = result.assetType.nama;
                    filterSelect.appendChild(filterOption);
                    
                    closeTypeModal();
                } else {
                    showAlert(result.message || 'Ralat menambah jenis aset', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showAlert('Ralat menambah jenis aset', 'error');
            }
        });

        // Modern Custom Alert & Confirm Modal
        function showAlert(message, type = 'info') {
            return new Promise((resolve) => {
                const modal = document.createElement('div');
                modal.className = 'fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 animate-fadeIn';
                modal.style.animation = 'fadeIn 0.2s ease-out';
                
                const iconColors = {
                    success: 'text-green-500',
                    error: 'text-red-500',
                    warning: 'text-amber-500',
                    info: 'text-blue-500'
                };
                
                const icons = {
                    success: '<svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                    error: '<svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                    warning: '<svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
                    info: '<svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
                };
                
                modal.innerHTML = `
                    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform scale-95 animate-scaleIn" style="animation: scaleIn 0.3s ease-out forwards">
                        <div class="p-6 text-center">
                            <div class="${iconColors[type]} mb-4">
                                ${icons[type]}
                            </div>
                            <p class="text-slate-700 text-base leading-relaxed whitespace-pre-line">${message}</p>
                        </div>
                        <div class="border-t border-slate-100 p-4">
                            <button class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-all transform hover:scale-105 active:scale-95">
                                OK
                            </button>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                
                const closeModal = () => {
                    modal.style.animation = 'fadeOut 0.2s ease-out';
                    setTimeout(() => {
                        document.body.removeChild(modal);
                        resolve();
                    }, 200);
                };
                
                modal.querySelector('button').addEventListener('click', closeModal);
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) closeModal();
                });
            });
        }
        
        function showConfirm(message, title = '') {
            return new Promise((resolve) => {
                const modal = document.createElement('div');
                modal.className = 'fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 animate-fadeIn';
                modal.style.animation = 'fadeIn 0.2s ease-out';
                
                modal.innerHTML = `
                    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform scale-95 animate-scaleIn" style="animation: scaleIn 0.3s ease-out forwards">
                        <div class="p-6">
                            ${title ? `<h3 class="text-xl font-bold text-slate-800 mb-4">${title}</h3>` : ''}
                            <div class="text-amber-500 mb-4 flex justify-center">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <p class="text-slate-700 text-base leading-relaxed whitespace-pre-line text-center">${message}</p>
                        </div>
                        <div class="border-t border-slate-100 p-4 flex gap-3">
                            <button class="cancel-btn flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-3 px-6 rounded-xl transition-all">
                                Cancel
                            </button>
                            <button class="confirm-btn flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-all transform hover:scale-105 active:scale-95">
                                OK
                            </button>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                
                const closeModal = (result) => {
                    modal.style.animation = 'fadeOut 0.2s ease-out';
                    setTimeout(() => {
                        document.body.removeChild(modal);
                        resolve(result);
                    }, 200);
                };
                
                modal.querySelector('.confirm-btn').addEventListener('click', () => closeModal(true));
                modal.querySelector('.cancel-btn').addEventListener('click', () => closeModal(false));
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) closeModal(false);
                });
            });
        }

        // Add animations to head
        if (!document.querySelector('#customModalStyles')) {
            const style = document.createElement('style');
            style.id = 'customModalStyles';
            style.textContent = `
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
                @keyframes fadeOut {
                    from { opacity: 1; }
                    to { opacity: 0; }
                }
                @keyframes scaleIn {
                    from { transform: scale(0.95); opacity: 0; }
                    to { transform: scale(1); opacity: 1; }
                }
            `;
            document.head.appendChild(style);
        }

    </script>
</body>
</html>
