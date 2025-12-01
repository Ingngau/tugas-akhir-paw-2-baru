<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMPN 2 Gangga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-indigo-50 antialiased">
    <!-- Navigation - Match dengan home design -->
    <nav class="bg-purple-600/95 text-white shadow-xl sticky top-0 z-10 backdrop-blur-sm border-b-2 border-purple-400">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-school text-2xl text-purple-200 animate-pulse"></i>
                    <a href="{{ route('home') }}" class="text-xl font-extrabold tracking-wider text-purple-100">SMPN 2 GANGGA</a>
                </div>
                <div class="hidden md:flex space-x-4 items-center text-base font-semibold">
                    <a href="{{ route('home') }}" class="py-2 px-4 rounded-xl hover:bg-purple-500/80 transition duration-300 transform hover:scale-105">Home</a>
                    <a href="{{ route('profil.index') }}" class="py-2 px-4 rounded-xl hover:bg-purple-500/80 transition duration-300 transform hover:scale-105">Profil</a>
                    <a href="{{ route('guru.index') }}" class="py-2 px-4 rounded-xl hover:bg-purple-500/80 transition duration-300 transform hover:scale-105">Guru</a>
                    <a href="{{ route('siswa.index') }}" class="py-2 px-4 rounded-xl hover:bg-purple-500/80 transition duration-300 transform hover:scale-105">Siswa</a>
                    <a href="{{ route('berita.index') }}" class="py-2 px-4 rounded-xl hover:bg-purple-500/80 transition duration-300 transform hover:scale-105">Berita</a>
                    <a href="{{ route('pengumuman.index') }}" class="py-2 px-4 rounded-xl hover:bg-purple-500/80 transition duration-300 transform hover:scale-105">Pengumuman</a>
                </div>
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-purple-100 p-2 focus:outline-none focus:ring-2 focus:ring-purple-300 rounded-lg transition transform hover:scale-110">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-3 bg-purple-700/90 rounded-b-2xl shadow-lg border-t border-purple-400/50">
                <a href="{{ route('home') }}" class="block py-3 px-6 hover:bg-purple-600 transition rounded-lg font-medium">Home</a>
                <a href="{{ route('profil.index') }}" class="block py-3 px-6 hover:bg-purple-600 transition rounded-lg font-medium">Profil</a>
                <a href="{{ route('guru.index') }}" class="block py-3 px-6 hover:bg-purple-600 transition rounded-lg font-medium">Guru</a>
                <a href="{{ route('siswa.index') }}" class="block py-3 px-6 hover:bg-purple-600 transition rounded-lg font-medium">Siswa</a>
                <a href="{{ route('berita.index') }}" class="block py-3 px-6 hover:bg-purple-600 transition rounded-lg font-medium">Berita</a>
                <a href="{{ route('pengumuman.index') }}" class="block py-3 px-6 hover:bg-purple-600 transition rounded-lg font-medium">Pengumuman</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer - Match dengan theme -->
    <footer class="bg-purple-800 text-purple-200 py-8 border-t-4 border-purple-400">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center items-center space-x-3 mb-3">
                <i class="fas fa-school text-purple-300 text-xl"></i>
                <span class="text-lg font-bold text-purple-100">SMP NEGERI 2 GANGGA</span>
            </div>
            <p class="text-sm font-light mb-2">Membangun Generasi Berkarakter dan Berprestasi</p>
            <p class="text-xs text-purple-300/80">&copy; 2024 SMPN 2 Gangga. Didesain dengan nuansa Pastel dan Modern.</p>
        </div>
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>