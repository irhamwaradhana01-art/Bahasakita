<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - BahasaKita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 class="text-3xl font-bold text-slate-800 mb-2">Selamat Datang di Beranda BahasaKita!</h1>
        <p class="text-slate-600 mb-6">Kamu berhasil masuk.</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-5 py-2.5 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition">
                Keluar (Logout)
            </button>
        </form>
    </div>
</body>
</html>