@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<div class="bg-indigo-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-extrabold text-gray-800 mb-2 border-l-4 border-purple-400 pl-4">Detail Guru</h1>
                    <p class="text-gray-600 font-light">Informasi lengkap tentang guru {{ $guru->nama }}</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('guru.edit', $guru->id) }}" class="bg-purple-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                        <i class="fas fa-edit mr-2"></i>Edit Guru
                    </a>
                    <a href="{{ route('guru.index') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-semibold shadow-md hover:bg-gray-400 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>

            <!-- Main Profile Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-8 border-purple-400 mb-8">
                <!-- Header -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-8">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                        <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center border-4 border-white/80 shadow-lg">
                            <i class="fas fa-chalkboard-teacher text-3xl text-white"></i>
                        </div>
                        <div class="text-center md:text-left">
                            <h1 class="text-4xl font-extrabold mb-2">{{ $guru->nama }}</h1>
                            <p class="text-purple-100 text-lg font-light flex items-center justify-center md:justify-start">
                                <i class="fas fa-briefcase mr-2"></i>{{ $guru->jabatan }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Guru -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Informasi Pribadi -->
                        <div class="space-y-6">
                            <div class="bg-purple-50 rounded-2xl p-6 border-l-4 border-purple-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-id-card text-purple-500 mr-3"></i>
                                    Informasi Pribadi
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-fingerprint text-purple-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">NIP</span>
                                        </div>
                                        <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">{{ $guru->nip }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-venus-mars text-purple-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Jenis Kelamin</span>
                                        </div>
                                        <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">
                                            {{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-birthday-cake text-purple-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">TTL</span>
                                        </div>
                                        <span class="text-gray-800 font-medium">{{ $guru->tempat_lahir }}, {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Kontak & Profesi -->
                        <div class="space-y-6">
                            <div class="bg-teal-50 rounded-2xl p-6 border-l-4 border-teal-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-address-book text-teal-500 mr-3"></i>
                                    Informasi Kontak
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-envelope text-teal-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $guru->email }}</p>
                                            <p class="text-sm text-gray-500">Email</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-phone text-teal-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $guru->telepon }}</p>
                                            <p class="text-sm text-gray-500">Telepon</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-map-marker-alt text-teal-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $guru->alamat }}</p>
                                            <p class="text-sm text-gray-500">Alamat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-amber-50 rounded-2xl p-6 border-l-4 border-amber-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-briefcase text-amber-500 mr-3"></i>
                                    Informasi Profesi
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-user-tie text-amber-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Jabatan</span>
                                        </div>
                                        <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm font-medium">{{ $guru->jabatan }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-book text-amber-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Mata Pelajaran</span>
                                        </div>
                                        <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm font-medium">{{ $guru->mata_pelajaran }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-xl shadow-sm">
                                        <div class="flex items-center">
                                            <i class="fas fa-door-open text-amber-400 mr-3"></i>
                                            <span class="font-semibold text-gray-700">Kelas Diampu</span>
                                        </div>
                                        <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm font-medium">{{ $guru->kelas_diampu }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Actions -->
            <div class="flex justify-center space-x-4">
                <a href="{{ route('guru.edit', $guru->id) }}" class="bg-purple-500 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                    <i class="fas fa-edit mr-2"></i>Edit Data Guru
                </a>
                <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-red-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-red-300">
                        <i class="fas fa-trash mr-2"></i>Hapus Guru
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection