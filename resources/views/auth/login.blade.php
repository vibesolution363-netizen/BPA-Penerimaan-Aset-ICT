<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/BPA Logo Transperants.svg') }}">
    <title>Login - Sistem Pengurusan Aset BTM LPB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-slide-in { animation: slideIn 0.6s ease-out forwards; }
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
        }
    </style>
</head>
<body class="min-h-screen gradient-bg flex items-center justify-center p-4">
    
    <!-- Background Pattern -->
    <div class="fixed inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-72 h-72 bg-white rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-blue-300 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
    </div>

    <div class="relative w-full max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-center">
        
        <!-- Left Side - Branding -->
        <div class="hidden md:block text-white space-y-6 animate-slide-in">
            <div class="flex items-center space-x-4 mb-8">
                <div class="bg-white p-4 rounded-2xl shadow-2xl">
                    <img src="{{ asset('images/BPA Logo Transperants.svg') }}" alt="BPA Logo" class="w-16 h-16 object-contain">
                </div>
                <div>
                    <h1 class="text-4xl font-bold">SPABTM</h1>
                    <p class="text-blue-200">Asset Management System</p>
                </div>
            </div>
            
            <h2 class="text-5xl font-bold leading-tight">
                Sistem Pengurusan<br>
                <span class="text-blue-300">Aset BTM LPB</span>
            </h2>
            
            <p class="text-xl text-blue-100">
                Platform digital untuk pengurusan aset BTM LPB dengan e-signature
            </p>
            
            <div class="flex items-center space-x-4 pt-8">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-300">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span class="text-blue-100">#Mudah & Selamat</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-300">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span class="text-blue-100">#Paperless</span>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="animate-slide-in" style="animation-delay: 0.2s;">
            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10">
                <!-- Mobile Logo -->
                <div class="md:hidden flex items-center justify-center space-x-3 mb-8">
                    <div class="bg-white p-3 rounded-xl border-2 border-blue-100">
                        <img src="{{ asset('images/BPA Logo Transperants.svg') }}" alt="BPA Logo" class="w-12 h-12 object-contain">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">SPABTM</h2>
                        <p class="text-xs text-slate-500">Asset Management</p>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-3xl font-bold text-slate-800 mb-2">Selamat Kembali!</h3>
                    <p class="text-slate-600">Log masuk untuk akses sistem pengurusan aset</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span class="text-sm">{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                                class="w-full pl-12 pr-4 py-3 border-2 border-slate-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all outline-none text-slate-800" 
                                placeholder="nama@contoh.com">
                        </div>
                        @error('email')
                            <p class="text-sm text-red-600 flex items-center space-x-1 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="w-full pl-12 pr-12 py-3 border-2 border-slate-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all outline-none text-slate-800" 
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400 hover:text-slate-600 transition-colors">
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-sm text-red-600 flex items-center space-x-1 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2 cursor-pointer group">
                            <input type="checkbox" name="remember" id="remember_me" class="w-5 h-5 rounded border-2 border-slate-300 text-blue-600 focus:ring-4 focus:ring-blue-100 transition-all">
                            <span class="text-sm text-slate-600 group-hover:text-slate-800 transition-colors">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                        <span>Log Masuk</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </button>
                </form>

                <!-- Footer -->
                <div class="mt-8 pt-6 border-t border-slate-200 text-center">
                    <p class="text-sm text-slate-500">
                        © {{ date('Y') }} BTM LPB. Hak cipta terpelihara.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle><line x1="2" x2="22" y1="2" y2="22"></line>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle>';
            }
        }
    </script>
</body>
</html>
