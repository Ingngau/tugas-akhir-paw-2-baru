@extends('layouts.app')

@section('title', 'Tambah Profil Sekolah')

@section('content')
<div class="bg-indigo-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2 border-l-4 border-purple-400 pl-4 inline-block">Tambah Profil Sekolah</h1>
                <p class="text-gray-600 font-light">Isi form berikut untuk menambahkan profil sekolah baru</p>
            </div>

            <!-- Main Form Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-8 border-purple-400">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-8">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fas fa-plus-circle text-2xl text-purple-200"></i>
                        <h2 class="text-2xl font-bold">Form Tambah Profil</h2>
                    </div>
                </div>

                <div class="p-8">
                    <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 gap-8">
                            <!-- Basic Information -->
                            <div class="bg-purple-50 rounded-2xl p-6 border-l-4 border-purple-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-info-circle text-purple-500 mr-3"></i>
                                    Informasi Dasar
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="nama_sekolah" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-school text-purple-400 mr-2 text-xs"></i>Nama Sekolah
                                        </label>
                                        <input type="text" name="nama_sekolah" id="nama_sekolah" required
                                            class="w-full border border-purple-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-purple-300 transition duration-200 bg-white shadow-sm"
                                            placeholder="Masukkan nama sekolah">
                                    </div>

                                    <div>
                                        <label for="npsn" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-fingerprint text-purple-400 mr-2 text-xs"></i>NPSN
                                        </label>
                                        <input type="text" name="npsn" id="npsn" required
                                            class="w-full border border-purple-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-purple-300 transition duration-200 bg-white shadow-sm"
                                            placeholder="Masukkan NPSN">
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="bg-teal-50 rounded-2xl p-6 border-l-4 border-teal-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-address-book text-teal-500 mr-3"></i>
                                    Informasi Kontak
                                </h3>
                                <div class="space-y-6">
                                    <div>
                                        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-map-marker-alt text-teal-400 mr-2 text-xs"></i>Alamat
                                        </label>
                                        <textarea name="alamat" id="alamat" rows="3" required
                                            class="w-full border border-teal-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:border-teal-300 transition duration-200 bg-white shadow-sm"
                                            placeholder="Masukkan alamat lengkap sekolah"></textarea>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="telepon" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                                <i class="fas fa-phone text-teal-400 mr-2 text-xs"></i>Telepon
                                            </label>
                                            <input type="text" name="telepon" id="telepon" required
                                                class="w-full border border-teal-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:border-teal-300 transition duration-200 bg-white shadow-sm"
                                                placeholder="Masukkan nomor telepon">
                                        </div>

                                        <div>
                                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                                <i class="fas fa-envelope text-teal-400 mr-2 text-xs"></i>Email
                                            </label>
                                            <input type="email" name="email" id="email" required
                                                class="w-full border border-teal-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:border-teal-300 transition duration-200 bg-white shadow-sm"
                                                placeholder="Masukkan alamat email">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="website" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-globe text-teal-400 mr-2 text-xs"></i>Website
                                        </label>
                                        <input type="url" name="website" id="website"
                                            class="w-full border border-teal-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:border-teal-300 transition duration-200 bg-white shadow-sm"
                                            placeholder="https://example.sch.id">
                                    </div>
                                </div>
                            </div>

                            <!-- Logo -->
                            <div class="bg-amber-50 rounded-2xl p-6 border-l-4 border-amber-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-image text-amber-500 mr-3"></i>
                                    Logo Sekolah
                                </h3>
                                <div>
                                    <input type="file" name="logo" id="logo"
                                        class="w-full border border-amber-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-300 transition duration-200 bg-white shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                                    <p class="text-sm text-gray-500 mt-2">Unggah logo sekolah (opsional)</p>
                                </div>
                            </div>

                            <!-- History & Vision -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Sejarah -->
                                <div class="bg-blue-50 rounded-2xl p-6 border-l-4 border-blue-400">
                                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-history text-blue-500 mr-3"></i>
                                        Sejarah Sekolah
                                    </h3>
                                    <textarea name="sejarah" id="sejarah" rows="6"
                                        class="w-full border border-blue-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition duration-200 bg-white shadow-sm resize-none"
                                        placeholder="Tuliskan sejarah berdirinya sekolah..."></textarea>
                                </div>

                                <!-- Visi & Misi -->
                                <div class="space-y-6">
                                    <div class="bg-green-50 rounded-2xl p-6 border-l-4 border-green-400">
                                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                            <i class="fas fa-eye text-green-500 mr-3"></i>
                                            Visi Sekolah
                                        </h3>
                                        <textarea name="visi" id="visi" rows="3" required
                                            class="w-full border border-green-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-green-300 focus:border-green-300 transition duration-200 bg-white shadow-sm resize-none"
                                            placeholder="Tuliskan visi sekolah..."></textarea>
                                    </div>

                                    <div class="bg-pink-50 rounded-2xl p-6 border-l-4 border-pink-400">
                                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                            <i class="fas fa-bullseye text-pink-500 mr-3"></i>
                                            Misi Sekolah
                                        </h3>
                                        <textarea name="misi" id="misi" rows="3" required
                                            class="w-full border border-pink-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300 transition duration-200 bg-white shadow-sm resize-none"
                                            placeholder="Tuliskan misi sekolah..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                            <a href="{{ route('profil.index') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-semibold shadow-md hover:bg-gray-400 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                <i class="fas fa-arrow-left mr-2"></i>Batal
                            </a>
                            <button type="submit" class="bg-purple-500 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                                <i class="fas fa-save mr-2"></i>Simpan Profil
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Text -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Pastikan semua informasi yang dimasukkan akurat dan lengkap
                </p>
            </div>
        </div>
    </div>
</div>
@endsection