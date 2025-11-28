@extends('layouts.app')

@section('title', 'Tetapan')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Tetapan Sistem</h2>
    <p class="text-slate-600">Urus pengguna dan konfigurasi sistem</p>
</div>

<!-- User Administrator Management -->
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h3 class="text-lg font-bold text-slate-800">Pengguna Administrator</h3>
            <p class="text-sm text-slate-600">Urus akaun pentadbir sistem</p>
        </div>
        <button id="addUserBtn" class="flex items-center space-x-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <line x1="19" x2="19" y1="8" y2="14"></line>
                <line x1="22" x2="16" y1="11" y2="11"></line>
            </svg>
            <span>Tambah Pengguna</span>
        </button>
    </div>
    
    <div class="space-y-2">
        @forelse($users as $user)
        <div class="flex items-center justify-between p-4 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-slate-800">{{ $user->name }}</p>
                    <p class="text-xs text-slate-500">{{ $user->email }}</p>
                </div>
            </div>
            @if($user->id !== Auth::id())
            <button class="delete-user-btn text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded transition-colors" data-id="{{ $user->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6h18"></path>
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                </svg>
            </button>
            @else
            <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full font-medium">Anda</span>
            @endif
        </div>
        @empty
        <div class="text-center py-8 text-slate-500">
            <p>Tiada pengguna dijumpai</p>
        </div>
        @endforelse
    </div>
</div>

<!-- Year Management -->
<div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl shadow-sm border-2 border-blue-200 p-6 mb-6">
    <div class="flex items-center mb-4">
        <div class="bg-blue-600 p-3 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
        </div>
        <div>
            <h3 class="text-lg font-bold text-slate-800">Pengurusan Tahun</h3>
            <p class="text-sm text-slate-600">Sistem ini merekod aset mengikut tahun</p>
        </div>
    </div>
    
    <div class="bg-white rounded-lg p-4 border border-blue-200 mb-4">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-slate-600">Tahun Semasa</p>
                <p class="text-3xl font-bold text-blue-600">{{ $currentYear }}</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-slate-600">Jumlah Rekod</p>
                <p class="text-2xl font-bold text-slate-800">{{ $totalRecords }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-start space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 mt-0.5 flex-shrink-0">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>
            <div class="text-sm text-slate-700">
                <p class="font-semibold mb-1">Bagaimana Sistem Berfungsi:</p>
                <ul class="list-disc ml-4 space-y-1 text-xs">
                    <li>Semua rekod baru dikaitkan dengan tahun {{ $currentYear }}</li>
                    <li>Data tahun lepas kekal tersimpan dan boleh dilihat dengan pilih tahun di dashboard</li>
                    <li>Untuk tahun baru, sistem akan auto gunakan tahun semasa bila tambah aset baru</li>
                    <li>Tiada perlu reset - data tersimpan secara kekal mengikut tahun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- System Info -->
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4">Maklumat Sistem</h3>
    <div class="space-y-3 text-sm">
        <div class="flex justify-between">
            <span class="text-slate-600">Versi Sistem</span>
            <span class="font-medium text-slate-800">1.0.0</span>
        </div>
        <div class="flex justify-between">
            <span class="text-slate-600">Laravel</span>
            <span class="font-medium text-slate-800">{{ app()->version() }}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-slate-600">PHP</span>
            <span class="font-medium text-slate-800">{{ PHP_VERSION }}</span>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div id="addUserModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
        <div class="bg-slate-50 border-b p-4 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-800">Tambah Pengguna Administrator</h3>
            <button type="button" id="closeUserModal" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
        <form id="addUserForm" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nama Penuh *</label>
                <input type="text" name="name" required class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Ahmad Ibrahim">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email *</label>
                <input type="email" name="email" required class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: ahmad@spabtm.test">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password *</label>
                <input type="password" name="password" required minlength="8" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Minimum 8 karakter">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Sahkan Password *</label>
                <input type="password" name="password_confirmation" required minlength="8" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan password sekali lagi">
            </div>
            <div class="flex justify-end space-x-3 pt-4 border-t">
                <button type="button" id="cancelUserModal" class="px-4 py-2 text-slate-600 font-medium hover:bg-slate-100 rounded-lg text-sm">Batal</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-bold shadow-lg transition-all">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script>
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

// Add User Modal
document.getElementById('addUserBtn').addEventListener('click', () => {
    document.getElementById('addUserModal').classList.remove('hidden');
});

document.getElementById('closeUserModal').addEventListener('click', closeModal);
document.getElementById('cancelUserModal').addEventListener('click', closeModal);

function closeModal() {
    document.getElementById('addUserModal').classList.add('hidden');
    document.getElementById('addUserForm').reset();
}

// Add User Form
document.getElementById('addUserForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);

    // Validate password match
    if (data.password !== data.password_confirmation) {
        alert('Password tidak sepadan!');
        return;
    }

    try {
        const response = await fetch('/settings/users', {
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
        } else {
            alert(result.message || 'Ralat menambah pengguna');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Ralat menambah pengguna');
    }
});

// Delete User
document.querySelectorAll('.delete-user-btn').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        if (!confirm('Adakah anda pasti ingin memadam pengguna ini?')) return;
        
        const id = e.currentTarget.dataset.id;
        try {
            const response = await fetch(`/settings/users/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            const result = await response.json();
            if (result.success) {
                location.reload();
            } else {
                alert(result.message || 'Ralat memadam pengguna');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Ralat memadam pengguna');
        }
    });
});
</script>
@endsection
