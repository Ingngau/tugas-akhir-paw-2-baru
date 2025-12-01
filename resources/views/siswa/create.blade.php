@extends('layouts.app')

@section('title', 'Tambah Data Siswa')

@section('content')
<div class="bg-indigo-50 min-h-screen">
    <div class="container mx-auto px-4 py-12">

        {{-- Hero Header --}}
        <div class="bg-gradient-to-r from-green-500 to-teal-500 text-white rounded-3xl p-8 mb-8 text-center shadow-xl border-t-8 border-white/20">
            <h1 class="text-4xl font-extrabold mb-3 tracking-tight">Tambah Data Siswa Baru</h1>
            <p class="text-lg font-light opacity-90">Isi form berikut untuk menambahkan siswa baru ke sistem</p>
            <div class="mt-4 flex items-center justify-center">
                <div class="bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                    <i class="fas fa-user-plus mr-2"></i>
                    <span class="font-semibold">Form Pendaftaran Siswa</span>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-purple-400/50">
            <div class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <i class="fas fa-user-plus mr-3"></i>
                    Form Tambah Data Siswa
                </h2>
            </div>

            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                    {{-- DATA PRIBADI --}}
                    <div class="space-y-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-2xl mr-4">
                                <i class="fas fa-user-circle text-2xl text-purple-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Data Pribadi</h3>
                        </div>

                        {{-- NISN --}}
                        <div class="transform hover:scale-[1.02] transition duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-id-card text-purple-500 mr-2 text-sm"></i>
                                NISN *
                            </label>
                            <input type="text" name="nisn" value="{{ old('nisn') }}" required
                                   class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 py-3 px-4 transition duration-300">
                            @error('nisn')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Nama --}}
                        <div class="transform hover:scale-[1.02] transition duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-signature text-purple-500 mr-2 text-sm"></i>
                                Nama Lengkap *
                            </label>
                            <input type="text" name="nama" value="{{ old('nama') }}" required
                                   class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 py-3 px-4 transition duration-300">
                            @error('nama')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="transform hover:scale-[1.02] transition duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-venus-mars text-purple-500 mr-2 text-sm"></i>
                                Jenis Kelamin *
                            </label>
                            <select name="jenis_kelamin" required
                                    class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 py-3 px-4 transition duration-300">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Tempat & Tanggal Lahir --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="transform hover:scale-[1.02] transition duration-300">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-map-marker-alt text-purple-500 mr-2 text-sm"></i>
                                    Tempat Lahir *
                                </label>
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                       class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 py-3 px-4 transition duration-300">
                                @error('tempat_lahir')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="transform hover:scale-[1.02] transition duration-300">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-calendar-alt text-purple-500 mr-2 text-sm"></i>
                                    Tanggal Lahir *
                                </label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                       class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 py-3 px-4 transition duration-300">
                                @error('tanggal_lahir')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <div class="transform hover:scale-[1.02] transition duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-home text-purple-500 mr-2 text-sm"></i>
                                Alamat *
                            </label>
                            <textarea name="alamat" rows="3" required
                                      class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 py-3 px-4 transition duration-300 resize-none">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Foto --}}
                        <div class="transform hover:scale-[1.02] transition duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-camera text-purple-500 mr-2 text-sm"></i>
                                Foto Siswa (opsional)
                            </label>
                            <div class="relative">
                                <input type="file" name="foto" 
                                       class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 py-3 px-4 transition duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                            </div>
                            @error('foto')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- DATA AKADEMIK & KONTAK --}}
                    <div class="space-y-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-2xl mr-4">
                                <i class="fas fa-graduation-cap text-2xl text-blue-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Data Akademik & Kontak</h3>
                        </div>

                        {{-- Kelas --}}
                        <div class="transform hover:scale-[1.02] transition duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-chalkboard-teacher text-blue-500 mr-2 text-sm"></i>
                                Kelas *
                            </label>
                            <select name="kelas" required
                                    class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 py-3 px-4 transition duration-300">
                                <option value="">Pilih Kelas</option>
                                @foreach([
                                    'X IPA 1','X IPA 2','X IPS 1','X IPS 2',
                                    'XI IPA 1','XI IPA 2','XI IPS 1','XI IPS 2',
                                    'XII IPA 1','XII IPA 2','XII IPS 1','XII IPS 2'
                                ] as $kelas)
                                    <option value="{{ $kelas }}" {{ old('kelas') == $kelas ? 'selected' : '' }}>
                                        {{ $kelas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kelas')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Jurusan --}}
                        <div class="transform hover:scale-[1.02] transition duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-book-open text-blue-500 mr-2 text-sm"></i>
                                Jurusan
                            </label>
                            <select name="jurusan"
                                    class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 py-3 px-4 transition duration-300">
                                <option value="">Pilih Jurusan</option>
                                <option value="IPA" {{ old('jurusan') == 'IPA' ? 'selected' : '' }}>IPA</option>
                                <option value="IPS" {{ old('jurusan') == 'IPS' ? 'selected' : '' }}>IPS</option>
                                <option value="Bahasa" {{ old('jurusan') == 'Bahasa' ? 'selected' : '' }}>Bahasa</option>
                            </select>
                            @error('jurusan')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Telepon --}}
                        <div class="transform hover:scale-[1.02] transition duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-phone text-blue-500 mr-2 text-sm"></i>
                                Telepon *
                            </label>
                            <input type="text" name="telepon" value="{{ old('telepon') }}" required
                                   class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 py-3 px-4 transition duration-300">
                            @error('telepon')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="transform hover:scale-[1.02] transition duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-envelope text-blue-500 mr-2 text-sm"></i>
                                Email *
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 py-3 px-4 transition duration-300">
                            @error('email')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- Tombol Action --}}
                <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-4">
                    <a href="{{ route('siswa.index') }}" 
                       class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:from-gray-600 hover:to-gray-700 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-300 flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <button type="submit"
                            class="bg-gradient-to-r from-green-500 to-teal-500 text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:from-green-600 hover:to-teal-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300 flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Data Siswa
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection