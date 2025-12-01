@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="bg-indigo-50 min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <!-- Hero Section -->
        <div class="bg-purple-200 text-purple-900 rounded-3xl p-12 mb-12 text-center shadow-xl border-t-8 border-purple-400/50">
            <h1 class="text-5xl font-extrabold mb-4 tracking-tight">
                Selamat Datang di 
                @isset($profil->nama_sekolah)
                    {{ $profil->nama_sekolah }}
                @else
                    Sekolah Kita
                @endisset
            </h1>
            <p class="text-xl mb-8 font-light italic">Membangun Generasi Berkarakter dan Berprestasi</p>
            <a href="{{ route('profil.index') }}" class="inline-flex items-center justify-center bg-purple-500 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                Kenali Sekolah Kami <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center border-b-4 border-teal-400 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <i class="fas fa-chalkboard-teacher text-5xl text-teal-500 mb-4 animate-bounce"></i>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $guruCount ?? 0 }}</h3>
                <p class="text-gray-600 font-medium">Guru Berpengalaman</p>
            </div>
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center border-b-4 border-pink-400 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <i class="fas fa-user-graduate text-5xl text-pink-500 mb-4 animate-bounce"></i>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $siswaCount ?? 0 }}</h3>
                <p class="text-gray-600 font-medium">Siswa Aktif</p>
            </div>
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center border-b-4 border-amber-400 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <i class="fas fa-trophy text-5xl text-amber-500 mb-4 animate-bounce"></i>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">6+</h3>
                <p class="text-gray-600 font-medium">Prestasi Terbaik</p>
            </div>
        </div>

        <!-- Latest News -->
        @if(isset($beritaTerbaru) && count($beritaTerbaru) > 0)
        <div class="mb-16">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-8 border-l-4 border-purple-400 pl-4">Berita Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($beritaTerbaru as $berita)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <span class="text-xs font-semibold uppercase tracking-wider text-pink-500 bg-pink-100 px-3 py-1 rounded-full mb-3 inline-block">
                            Berita
                        </span>
                        <h3 class="text-xl font-bold text-gray-800 mb-3 leading-snug">{{ $berita->judul }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($berita->konten, 100) }}</p>
                        <div class="flex justify-between items-center text-xs text-gray-500 pt-2 border-t border-gray-100">
                            <span class="flex items-center"><i class="fas fa-user mr-1"></i> {{ $berita->penulis ?? 'Admin' }}</span>
                            <span class="flex items-center"><i class="fas fa-calendar-alt mr-1"></i> {{ $berita->created_at->format('d M Y') }}</span>
                        </div>
                        <a href="{{ route('berita.show', $berita) }}" class="inline-block mt-4 text-purple-600 font-semibold hover:text-purple-800 transition">
                            Baca Selengkapnya <i class="fas fa-chevron-right ml-1 text-sm"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Quick Links -->
        <div>
            <h2 class="text-4xl font-extrabold text-gray-800 mb-8 border-l-4 border-teal-400 pl-4">Akses Cepat</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <a href="{{ route('guru.index') }}" class="block bg-teal-50 rounded-xl p-6 text-center shadow-md hover:shadow-lg transition transform hover:scale-105 border-b-2 border-teal-400">
                    <i class="fas fa-users text-3xl text-teal-600 mb-3"></i>
                    <p class="font-bold text-teal-800">Data Guru</p>
                </a>
                <a href="{{ route('siswa.index') }}" class="block bg-pink-50 rounded-xl p-6 text-center shadow-md hover:shadow-lg transition transform hover:scale-105 border-b-2 border-pink-400">
                    <i class="fas fa-graduation-cap text-3xl text-pink-600 mb-3"></i>
                    <p class="font-bold text-pink-800">Data Siswa</p>
                </a>
                <a href="{{ route('berita.index') }}" class="block bg-purple-50 rounded-xl p-6 text-center shadow-md hover:shadow-lg transition transform hover:scale-105 border-b-2 border-purple-400">
                    <i class="fas fa-newspaper text-3xl text-purple-600 mb-3"></i>
                    <p class="font-bold text-purple-800">Berita</p>
                </a>
                <a href="{{ route('profil.index') }}" class="block bg-yellow-50 rounded-xl p-6 text-center shadow-md hover:shadow-lg transition transform hover:scale-105 border-b-2 border-yellow-400">
                    <i class="fas fa-info-circle text-3xl text-yellow-600 mb-3"></i>
                    <p class="font-bold text-yellow-800">Profil</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection