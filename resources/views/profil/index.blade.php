@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<div class="bg-indigo-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2 border-l-4 border-purple-400 pl-4">Profil Sekolah</h1>
                <p class="text-gray-600 font-light">Informasi lengkap tentang sekolah kami</p>
            </div>
            @if($profil)
                <a href="{{ route('profil.edit', $profil) }}" class="bg-purple-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                    <i class="fas fa-edit mr-2"></i>Edit Profil
                </a>
            @else
                <a href="{{ route('profil.create') }}" class="bg-purple-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                    <i class="fas fa-plus mr-2"></i>Tambah Profil
                </a>
            @endif
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-6 shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($profil)
            <!-- Main Profile Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-8 border-purple-400 mb-8">
                <!-- Header Profil -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-8">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                        @if($profil->logo)
                            <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" class="w-24 h-24 rounded-full border-4 border-white/80 shadow-lg">
                        @else
                            <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center border-4 border-white/80 shadow-lg">
                                <i class="fas fa-school text-3xl text-white"></i>
                            </div>
                        @endif
                        <div class="text-center md:text-left">
                            <h1 class="text-4xl font-extrabold mb-2">{{ $profil->nama_sekolah }}</h1>
                            <p class="text-purple-100 text-lg font-light flex items-center justify-center md:justify-start">
                                <i class="fas fa-map-marker-alt mr-2"></i>{{ $profil->alamat }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Sekolah -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <!-- Informasi Utama -->
                        <div class="space-y-6">
                            <div class="bg-purple-50 rounded-2xl p-6 border-l-4 border-purple-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-info-circle text-purple-500 mr-3"></i>
                                    Informasi Sekolah
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <span class="font-semibold text-gray-700 w-32 flex items-center">
                                            <i class="fas fa-fingerprint text-purple-400 mr-2"></i>NPSN:
                                        </span>
                                        <span class="bg-white px-3 py-1 rounded-full text-sm font-medium border border-purple-200">{{ $profil->npsn }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="font-semibold text-gray-700 w-32 flex items-center">
                                            <i class="fas fa-phone text-purple-400 mr-2"></i>Telepon:
                                        </span>
                                        <span>{{ $profil->telepon }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="font-semibold text-gray-700 w-32 flex items-center">
                                            <i class="fas fa-envelope text-purple-400 mr-2"></i>Email:
                                        </span>
                                        <span class="text-purple-600 font-medium">{{ $profil->email }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="font-semibold text-gray-700 w-32 flex items-center">
                                            <i class="fas fa-globe text-purple-400 mr-2"></i>Website:
                                        </span>
                                        <span class="text-purple-600 font-medium">{{ $profil->website ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kontak -->
                        <div class="space-y-6">
                            <div class="bg-teal-50 rounded-2xl p-6 border-l-4 border-teal-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-address-book text-teal-500 mr-3"></i>
                                    Kontak Sekolah
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-phone text-teal-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $profil->telepon }}</p>
                                            <p class="text-sm text-gray-500">Telepon</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-envelope text-teal-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $profil->email }}</p>
                                            <p class="text-sm text-gray-500">Email</p>
                                        </div>
                                    </div>
                                    @if($profil->website)
                                    <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-globe text-teal-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $profil->website }}</p>
                                            <p class="text-sm text-gray-500">Website</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sejarah -->
                    <div class="mb-8">
                        <div class="bg-amber-50 rounded-2xl p-6 border-l-4 border-amber-400">
                            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-history text-amber-500 mr-3"></i>
                                Sejarah Sekolah
                            </h3>
                            <p class="text-gray-700 leading-relaxed text-lg">{{ $profil->sejarah }}</p>
                        </div>
                    </div>

                    <!-- Visi & Misi -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="bg-blue-50 rounded-2xl p-6 border-l-4 border-blue-400 transform hover:scale-105 transition duration-300">
                            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-eye text-blue-500 mr-3"></i>
                                Visi Sekolah
                            </h3>
                            <div class="bg-white/80 p-4 rounded-xl">
                                <p class="text-gray-700 italic text-lg leading-relaxed">"{{ $profil->visi }}"</p>
                            </div>
                        </div>
                        <div class="bg-green-50 rounded-2xl p-6 border-l-4 border-green-400 transform hover:scale-105 transition duration-300">
                            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-bullseye text-green-500 mr-3"></i>
                                Misi Sekolah
                            </h3>
                            <div class="bg-white/80 p-4 rounded-xl">
                                <p class="text-gray-700 whitespace-pre-line leading-relaxed text-lg">{{ $profil->misi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-3xl shadow-xl p-12 text-center border-2 border-dashed border-purple-300">
                <div class="w-24 h-24 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-school text-4xl text-purple-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Profil Sekolah Belum Ditambahkan</h3>
                <p class="text-gray-600 mb-6 max-w-md mx-auto">Tambahkan profil sekolah untuk menampilkan informasi tentang sekolah Anda.</p>
                <a href="{{ route('profil.create') }}" class="inline-flex items-center justify-center bg-purple-500 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>Tambah Profil Sekolah
                </a>
            </div>
        @endif
    </div>
</div>
@endsection