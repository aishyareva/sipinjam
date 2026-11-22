<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('judul', 'Aplikasi Sipinjam')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
  <div class="max-w-5xl mx-auto p-6">
    <header class="mb-6">
      <div class="flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-2xl font-bold text-gray-900">Sistem Peminjaman Alat & Akademik</h1>

        <div class="flex items-center gap-3 text-sm">
          @auth
            <span class="text-gray-700">
              Halo, <strong class="font-semibold text-gray-900">{{ Auth::user()->name }}</strong>
            </span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
              @csrf
              <button type="submit" class="bg-red-600 text-white px-3 py-1.5 rounded text-sm font-medium hover:bg-red-700">
                Logout
              </button>
            </form>
          @else
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login</a>
            <span class="text-gray-400">|</span>
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Register</a>
          @endauth
        </div>
      </div>

      <nav class="mt-4 flex flex-wrap gap-4 border-b border-gray-300 pb-3 text-sm font-medium text-blue-600">
        <a href="{{ route('alat.index') }}" class="hover:underline">Data Alat</a>
        <span class="text-gray-400">|</span>
        <a href="{{ route('mahasiswa.index') }}" class="hover:underline">Data Mahasiswa (Tugas)</a>
        <span class="text-gray-400">|</span>
        <a href="{{ route('peminjaman.index') }}" class="hover:underline">Peminjaman (Relasi)</a>
      </nav>
    </header>

    <main class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
      @yield('konten')
    </main>
  </div>
</body>
</html>