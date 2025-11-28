@extends('layouts.app')

@section('title', 'Profil - Sistem Penerimaan Aset ICT LPB')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Profile Information -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
            <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                Maklumat Profil
            </h2>
            <p class="text-blue-100 text-sm mt-1">Kemaskini maklumat akaun dan alamat emel anda.</p>
        </div>
        
        <form method="post" action="{{ route('profile.update') }}" class="p-6 space-y-4">
            @csrf
            @method('patch')

            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Emel</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                    Simpan
                </button>
                @if (session('status') === 'profile-updated')
                    <p class="text-green-600 text-sm font-medium">Berjaya disimpan!</p>
                @endif
            </div>
        </form>
    </div>

    <!-- Update Password -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4">
            <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                Tukar Kata Laluan
            </h2>
            <p class="text-amber-100 text-sm mt-1">Pastikan akaun anda menggunakan kata laluan yang panjang dan rawak.</p>
        </div>
        
        <form method="post" action="{{ route('password.update') }}" class="p-6 space-y-4">
            @csrf
            @method('put')

            <div>
                <label for="current_password" class="block text-sm font-medium text-slate-700 mb-1">Kata Laluan Semasa</label>
                <input type="password" id="current_password" name="current_password" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors">
                @error('current_password', 'updatePassword')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Kata Laluan Baru</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors">
                @error('password', 'updatePassword')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Sahkan Kata Laluan</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors">
                @error('password_confirmation', 'updatePassword')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="px-6 py-2 bg-amber-500 text-white font-semibold rounded-lg hover:bg-amber-600 transition-colors">
                    Tukar Kata Laluan
                </button>
                @if (session('status') === 'password-updated')
                    <p class="text-green-600 text-sm font-medium">Kata laluan berjaya ditukar!</p>
                @endif
            </div>
        </form>
    </div>

    <!-- Delete Account -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-red-500 to-red-600 px-6 py-4">
            <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6h18"></path>
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                </svg>
                Padam Akaun
            </h2>
            <p class="text-red-100 text-sm mt-1">Setelah akaun dipadam, semua data akan hilang secara kekal.</p>
        </div>
        
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <p class="text-slate-600 text-sm mb-4">
                Adakah anda pasti ingin memadam akaun anda? Tindakan ini tidak boleh dibatalkan. Sila masukkan kata laluan untuk mengesahkan.
            </p>

            <div class="mb-4">
                <label for="delete_password" class="block text-sm font-medium text-slate-700 mb-1">Kata Laluan</label>
                <input type="password" id="delete_password" name="password" required
                    class="w-full max-w-md px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors">
                @error('password', 'userDeletion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors"
                onclick="return confirm('Adakah anda pasti ingin memadam akaun ini?')">
                Padam Akaun
            </button>
        </form>
    </div>
</div>
@endsection
