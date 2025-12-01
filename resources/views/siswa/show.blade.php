@extends('layouts.app')

@section('title', 'Detail Siswa - ' . $siswa->nama)

@section('content')
<div class="bg-indigo-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-extrabold text-gray-800 mb-2 border-l-4 border-purple-400 pl-4">Detail Siswa</h1>
                    <p class="text-gray-600 font-light">Informasi lengkap tentang siswa {{ $siswa->nama }}</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('siswa.edit', $siswa) }}" class="bg-purple-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                        <i class="fas fa-edit mr-2"></i>Edit Siswa
                    </a>
                    <a href="{{ route('siswa.index') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-semibold shadow-md hover:bg-gray-400 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>

            <!-- Main Profile Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-8 border-purple-400 mb-8">
                <!-- Header -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-8">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                        @if($siswa->foto)
                            <img src="{{ asset('storage/' . $siswa->foto) }}" alt="{{ $siswa->nama }}" 
                                 class="w-24 h-24 rounded-full border-4 border-white/80 object-cover shadow-lg">
                        @else
                            <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center border-4 border-white/80 shadow-lg">
                                <i class="fas fa-user-graduate text-3xl text-white"></i>
                            </div>
                        @endif
                        <div class="text-center md:text-left">
                            <h1 class="text-4xl font-extrabold mb-2">{{ $siswa->nama }}</h1>
                            <p class="text-purple-100 text-lg font-light flex items-center justify-center md:justify-start">
                                <i class="fas fa-id-card mr-2"></i>NISN: {{ $siswa->nisn }}
                            </p>
                            <div class="flex flex-wrap gap-2 mt-3 justify-center md:justify-start">
                                <span class="bg-purple-400/80 px-3 py-1 rounded-full text-sm font-semibold">
                                    <i class="fas fa-door-open mr-1"></i>{{ $siswa->kelas }}
                                </span>
                                @if($siswa->jurusan && $siswa->jurusan != '-')
                                    <span class="bg-teal-400/80 px-3 py-1 rounded-full text-sm font-semibold">
                                        <i class="fas fa-graduation-cap mr-1"></i>{{ $siswa->jurusan }}
                                    </span>
                                @endif
                                <span class="bg-pink-400/80 px-3 py-1 rounded-full text-sm font-semibold">
                                    <i class="fas fa-venus-mars mr-1"></i>
                                    {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Siswa -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Data Pribadi -->
                        <div class="space-y-6">
                            <div class="bg-purple-50 rounded-2xl p-6 border-l-4 border-purple-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-id-card text-purple-500 mr-3"></i>
                                    Data Pribadi
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt text-purple-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Tempat Lahir</span>
                                        </div>
                                        <span class="text-gray-800 font-medium">{{ $siswa->tempat_lahir }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-birthday-cake text-purple-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Tanggal Lahir</span>
                                        </div>
                                        <span class="text-gray-800 font-medium">{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar-day text-purple-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Usia</span>
                                        </div>
                                        <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">
                                            {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->age }} tahun
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-venus-mars text-purple-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Jenis Kelamin</span>
                                        </div>
                                        <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">
                                            {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="bg-blue-50 rounded-2xl p-6 border-l-4 border-blue-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-home text-blue-500 mr-3"></i>
                                    Alamat
                                </h3>
                                <div class="p-3 bg-white rounded-xl shadow-sm">
                                    <p class="text-gray-700 leading-relaxed">{{ $siswa->alamat }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Akademik & Kontak -->
                        <div class="space-y-6">
                            <div class="bg-teal-50 rounded-2xl p-6 border-l-4 border-teal-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-graduation-cap text-teal-500 mr-3"></i>
                                    Data Akademik
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-door-open text-teal-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Kelas</span>
                                        </div>
                                        <span class="bg-teal-100 text-teal-800 px-3 py-1 rounded-full text-sm font-medium">{{ $siswa->kelas }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-book text-teal-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Jurusan</span>
                                        </div>
                                        <span class="bg-teal-100 text-teal-800 px-3 py-1 rounded-full text-sm font-medium">
                                            {{ $siswa->jurusan && $siswa->jurusan != '-' ? $siswa->jurusan : 'Umum' }}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar-plus text-teal-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Tanggal Daftar</span>
                                        </div>
                                        <span class="text-gray-800 font-medium">{{ $siswa->created_at->format('d F Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-amber-50 rounded-2xl p-6 border-l-4 border-amber-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-address-book text-amber-500 mr-3"></i>
                                    Informasi Kontak
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                        <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-phone text-amber-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $siswa->telepon }}</p>
                                            <p class="text-sm text-gray-500">Telepon</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                        <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-envelope text-amber-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $siswa->email }}</p>
                                            <p class="text-sm text-gray-500">Email</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Actions -->
            <div class="flex justify-center space-x-4">
                <a href="{{ route('siswa.edit', $siswa->id) }}" class="bg-purple-500 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                    <i class="fas fa-edit mr-2"></i>Edit Data Siswa
                </a>
                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa {{ $siswa->nama }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-red-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-red-300">
                        <i class="fas fa-trash mr-2"></i>Hapus Siswa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection