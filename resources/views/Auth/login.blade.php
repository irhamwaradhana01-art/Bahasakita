@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row">

   <!-- Kolom Kiri: Visual & Branding (Tanpa File Gambar) -->
    <div class="relative hidden md:flex md:w-7/12 bg-gradient-to-br from-slate-900 via-brand-navy to-slate-800 flex-col justify-between p-12 text-white overflow-hidden">
        
        <!-- Efek dekoratif opsional (lingkaran cahaya lembut di latar belakang) -->
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Logo BahasaKita -->
        <div class="relative z-10 flex items-center gap-3">
            <div class="w-10 h-10 bg-white/10 backdrop-blur border border-white/20 rounded-lg flex items-center justify-center font-bold text-xl shadow">
                B
            </div>
            <div>
                <h1 class="font-bold text-lg tracking-tight leading-none text-white">BahasaKita</h1>
                <span class="text-[10px] tracking-widest text-slate-300 uppercase font-semibold">Portal Belajar</span>
            </div>
        </div>

        <!-- Headline & Tagline -->
        <div class="relative z-10 max-w-lg mb-12">
            <h2 class="text-3xl lg:text-4xl font-extrabold leading-tight tracking-tight mb-4">
                Lestarikan Budaya, Kuasai Sastra Indonesia
            </h2>
            <p class="text-slate-300 text-sm lg:text-base leading-relaxed">
                Temukan cara belajar Bahasa Indonesia yang interaktif, mendalam, dan menyenangkan bersama ribuan pelajar di seluruh Indonesia.
            </p>
        </div>

        <!-- Footer Kiri -->
        <div class="relative z-10 flex items-center gap-4 text-xs text-slate-400 font-medium">
            <span>Kurikulum Merdeka 2026</span>
            <span>•</span>
            <span>Akses Materi 24/7</span>
        </div>
    </div>

    <!-- Kolom Kanan: Form Login -->
    <div class="flex-1 flex flex-col justify-center px-8 sm:px-14 lg:px-20 py-12 bg-white">
        <div class="max-w-md w-full mx-auto">
            
            <!-- Header Form -->
            <div class="mb-8">
                <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">
                    Selamat Datang Kembali
                </h2>
                <p class="text-sm text-slate-500 mt-2">
                    Silakan masuk ke akun BahasaKita kamu.
                </p>
            </div>

            <!-- Pesan Error / Validasi -->
            @if ($errors->any())
                <div class="mb-5 p-3 rounded-lg bg-red-50 border border-red-200 text-xs text-red-600">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Formulir Login -->
            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-700 mb-2">
                        Alamat Email
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           placeholder="nama@sekolah.sch.id"
                           required
                           class="w-full px-4 py-3 text-sm rounded-lg border border-slate-200 bg-slate-50/50 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-navy focus:border-transparent transition">
                </div>

                <!-- Input Password -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Masukkan password" 
                               required
                               class="w-full px-4 py-3 text-sm rounded-lg border border-slate-200 bg-slate-50/50 text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-navy focus:border-transparent transition pr-10">
                        
                        <!-- Tombol Lihat Password -->
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Lupa Password -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer text-slate-600">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-brand-navy focus:ring-brand-navy">
                        <span>Ingat Saya</span>
                    </label>
                    <a href="#" class="text-brand-accent hover:underline font-medium">
                        Lupa Password?
                    </a>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" 
                        class="w-full py-3.5 px-4 bg-brand-navy hover:bg-brand-dark text-white text-sm font-semibold rounded-lg shadow-md transition duration-150">
                    Masuk Sekarang
                </button>
            </form>

            <!-- Link Daftar -->
            <p class="text-center text-xs text-slate-500 mt-8">
                Belum punya akun? 
                <a href="#" class="text-brand-accent font-semibold hover:underline">
                    Daftar Gratis
                </a>
            </p>

        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
@endsection