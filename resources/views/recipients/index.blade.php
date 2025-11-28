@extends('layouts.app')

@section('title', 'Senarai Penerima')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm mb-1">Jumlah Penerima</p>
                    <h3 class="text-3xl font-bold text-blue-600" id="stat-total">{{ $stats['total'] }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-green-600 text-white rounded-xl p-6 shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium mb-1">Telah Diserah</p>
                    <h3 class="text-3xl font-bold" id="stat-received">{{ $stats['received'] }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm mb-1">Belum Diserah</p>
                    <h3 class="text-3xl font-bold text-orange-600" id="stat-pending">{{ $stats['pending'] }}</h3>
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

    <!-- Search & Controls -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">
        <div class="flex flex-col md:flex-row gap-4 justify-between items-start md:items-center">
            <div class="relative flex-1 w-full">
                <svg class="absolute left-3 top-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                <input 
                    type="text" 
                    id="searchInput"
                    placeholder="Cari nama penerima..." 
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            
            <button id="addRecipientBtn" class="flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-bold transition-colors bg-green-600 text-white hover:bg-green-700 shadow-md w-full md:w-auto justify-center">
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

    <!-- Recipients Table -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-100 text-slate-600 text-sm uppercase tracking-wider">
                        <th class="p-4 border-b">Bil</th>
                        <th class="p-4 border-b">Nama Penerima</th>
                        <th class="p-4 border-b">Bilangan Aset</th>
                        <th class="p-4 border-b">Jenis Aset</th>
                        <th class="p-4 border-b">Status</th>
                        <th class="p-4 border-b text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="recipientsTable">
                    @foreach($recipients as $index => $recipient)
                    <tr class="border-b hover:bg-slate-50 transition-colors">
                        <td class="p-4">{{ $index + 1 }}</td>
                        <td class="p-4">
                            <div class="font-semibold text-slate-800">{{ $recipient->nama }}</div>
                            <div class="text-xs text-slate-500">{{ $recipient->profil }}</div>
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-700">
                                {{ $recipient->assets->count() }} aset
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex flex-wrap gap-1">
                                @foreach($recipient->assets as $asset)
                                    <span class="px-2 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-700">
                                        {{ $asset->jenis }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                        <td class="p-4">
                            @if($recipient->isDiterima())
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 flex items-center w-fit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    Telah Terima
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-orange-100 text-orange-700 flex items-center w-fit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    Belum Terima
                                </span>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="add-asset-btn px-3 py-1 bg-blue-600 text-white rounded-lg text-xs font-bold hover:bg-blue-700 transition-colors" data-recipient-id="{{ $recipient->id }}" data-recipient-name="{{ $recipient->nama }}">
                                    + Aset
                                </button>
                                @if(!$recipient->isDiterima())
                                <button class="sign-btn px-3 py-1 bg-purple-600 text-white rounded-lg text-xs font-bold hover:bg-purple-700 transition-colors" data-recipient-id="{{ $recipient->id }}" data-recipient-name="{{ $recipient->nama }}">
                                    Tandatangan
                                </button>
                                @else
                                <button class="view-signature-btn px-3 py-1 bg-slate-600 text-white rounded-lg text-xs font-bold hover:bg-slate-700 transition-colors" data-signature="{{ $recipient->signature }}">
                                    Lihat
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Recipient Modal -->
<div id="addRecipientModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden">
        <div class="bg-slate-50 border-b p-4 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-slate-800">Tambah Penerima Baru</h3>
                <p class="text-sm text-slate-500">Isi nama penerima</p>
            </div>
            <button id="closeAddModal" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
        <form id="addRecipientForm" class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nama Penerima *</label>
                <input type="text" name="nama" required class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Pn. Siti Binti Ahmad">
            </div>
            <div class="flex justify-end space-x-3 pt-4 border-t">
                <button type="button" id="cancelAddModal" class="px-4 py-2 text-slate-600 font-medium hover:bg-slate-100 rounded-lg text-sm">Batal</button>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg text-sm font-bold shadow-lg transition-all">Tambah Penerima</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Asset Modal -->
<div id="addAssetModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden">
        <div class="bg-slate-50 border-b p-4 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-slate-800">Tambah Aset</h3>
                <p class="text-sm text-slate-500">Untuk: <span id="assetRecipientName" class="font-semibold text-blue-600"></span></p>
            </div>
            <button id="closeAssetModal" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
        <form id="addAssetForm" class="p-6 space-y-4">
            <input type="hidden" name="recipient_id" id="assetRecipientId">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Jenis Aset *</label>
                <select name="jenis" required class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">Pilih Jenis Aset</option>
                    @foreach($assetTypes as $type)
                        <option value="{{ $type->nama }}">{{ $type->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">SN Device</label>
                    <input type="text" name="siri_device" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">SN Adapter</label>
                    <input type="text" name="siri_adapter" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">SN Power Cord</label>
                    <input type="text" name="siri_cord" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">SN Dongle</label>
                    <input type="text" name="siri_dongle" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                </div>
            </div>
            <div class="flex justify-end space-x-3 pt-4 border-t">
                <button type="button" id="cancelAssetModal" class="px-4 py-2 text-slate-600 font-medium hover:bg-slate-100 rounded-lg text-sm">Batal</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-bold shadow-lg transition-all">Tambah Aset</button>
            </div>
        </form>
    </div>
</div>

<!-- Signature Modal -->
<div id="signatureModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
        <div class="bg-slate-50 border-b p-4 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-slate-800">Tandatangan Penerima</h3>
                <p class="text-sm text-slate-500">Sila tandatangan di bawah: <span id="signRecipientName" class="font-semibold text-blue-600"></span></p>
            </div>
            <button id="closeSignModal" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <canvas id="signatureCanvas" class="w-full border-2 border-slate-300 rounded-lg cursor-crosshair touch-none" width="400" height="200"></canvas>
            <input type="hidden" id="signRecipientId">
            <div class="flex justify-between items-center">
                <button id="clearSignature" class="px-4 py-2 text-slate-600 font-medium hover:bg-slate-100 rounded-lg text-sm flex items-center space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6h18"></path>
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                    </svg>
                    <span>Padam</span>
                </button>
                <button id="saveSignature" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg text-sm font-bold shadow-lg transition-all">
                    Simpan Tandatangan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- View Signature Modal -->
<div id="viewSignatureModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
        <div class="bg-slate-50 border-b p-4 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-800">Tandatangan Penerima</h3>
            <button id="closeViewSignModal" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <img id="viewSignatureImage" class="w-full border-2 border-slate-300 rounded-lg" />
        </div>
    </div>
</div>

<script>
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

// Add Recipient Modal
document.getElementById('addRecipientBtn').addEventListener('click', () => {
    document.getElementById('addRecipientModal').classList.remove('hidden');
});

document.getElementById('closeAddModal').addEventListener('click', closeAddModal);
document.getElementById('cancelAddModal').addEventListener('click', closeAddModal);

function closeAddModal() {
    document.getElementById('addRecipientModal').classList.add('hidden');
    document.getElementById('addRecipientForm').reset();
}

// Add Recipient Form
document.getElementById('addRecipientForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);

    try {
        const response = await fetch('/recipients', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        if (result.success) {
            location.reload();
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Ralat menambah penerima');
    }
});

// Add Asset Modal
document.querySelectorAll('.add-asset-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
        const recipientId = e.target.dataset.recipientId;
        const recipientName = e.target.dataset.recipientName;
        document.getElementById('assetRecipientId').value = recipientId;
        document.getElementById('assetRecipientName').textContent = recipientName;
        document.getElementById('addAssetModal').classList.remove('hidden');
    });
});

document.getElementById('closeAssetModal').addEventListener('click', closeAssetModal);
document.getElementById('cancelAssetModal').addEventListener('click', closeAssetModal);

function closeAssetModal() {
    document.getElementById('addAssetModal').classList.add('hidden');
    document.getElementById('addAssetForm').reset();
}

// Add Asset Form
document.getElementById('addAssetForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);

    try {
        const response = await fetch('/assets', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        if (result.success) {
            location.reload();
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Ralat menambah aset');
    }
});

// Signature Modal
const canvas = document.getElementById('signatureCanvas');
const ctx = canvas.getContext('2d');
let isDrawing = false;

canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mouseup', stopDrawing);
canvas.addEventListener('mouseout', stopDrawing);

canvas.addEventListener('touchstart', (e) => {
    e.preventDefault();
    const touch = e.touches[0];
    const mouseEvent = new MouseEvent('mousedown', {
        clientX: touch.clientX,
        clientY: touch.clientY
    });
    canvas.dispatchEvent(mouseEvent);
});

canvas.addEventListener('touchmove', (e) => {
    e.preventDefault();
    const touch = e.touches[0];
    const mouseEvent = new MouseEvent('mousemove', {
        clientX: touch.clientX,
        clientY: touch.clientY
    });
    canvas.dispatchEvent(mouseEvent);
});

canvas.addEventListener('touchend', (e) => {
    e.preventDefault();
    const mouseEvent = new MouseEvent('mouseup', {});
    canvas.dispatchEvent(mouseEvent);
});

function startDrawing(e) {
    isDrawing = true;
    const rect = canvas.getBoundingClientRect();
    ctx.beginPath();
    ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
}

function draw(e) {
    if (!isDrawing) return;
    const rect = canvas.getBoundingClientRect();
    ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
    ctx.strokeStyle = '#000';
    ctx.lineWidth = 2;
    ctx.lineCap = 'round';
    ctx.stroke();
}

function stopDrawing() {
    isDrawing = false;
}

document.getElementById('clearSignature').addEventListener('click', () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
});

document.querySelectorAll('.sign-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
        const recipientId = e.target.dataset.recipientId;
        const recipientName = e.target.dataset.recipientName;
        document.getElementById('signRecipientId').value = recipientId;
        document.getElementById('signRecipientName').textContent = recipientName;
        document.getElementById('signatureModal').classList.remove('hidden');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    });
});

document.getElementById('closeSignModal').addEventListener('click', () => {
    document.getElementById('signatureModal').classList.add('hidden');
});

document.getElementById('saveSignature').addEventListener('click', async () => {
    const recipientId = document.getElementById('signRecipientId').value;
    const signatureData = canvas.toDataURL();

    try {
        const response = await fetch(`/recipients/${recipientId}/sign`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ signature: signatureData })
        });

        const result = await response.json();
        if (result.success) {
            location.reload();
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Ralat menyimpan tandatangan');
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

document.getElementById('closeViewSignModal').addEventListener('click', () => {
    document.getElementById('viewSignatureModal').classList.add('hidden');
});

// Search
document.getElementById('searchInput').addEventListener('input', (e) => {
    const search = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#recipientsTable tr');
    
    rows.forEach(row => {
        const nama = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
        if (nama.includes(search)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
@endsection
