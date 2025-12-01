@extends('layouts.app')

@section('title', 'Edit Data Guru')

@section('content')
<div class="bg-indigo-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2 border-l-4 border-purple-400 pl-4 inline-block">Edit Data Guru</h1>
                <p class="text-gray-600 font-light">Perbarui informasi guru {{ $guru->nama }}</p>
            </div>

            <!-- Main Form Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-8 border-purple-400">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-8">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fas fa-user-edit text-2xl text-purple-200"></i>
                        <h2 class="text-2xl font-bold">Form Edit Guru</h2>
                    </div>
                </div>

                <div class="p-8">
                    <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-8">
                            <!-- Informasi Pribadi -->
                            <div class="bg-purple-50 rounded-2xl p-6 border-l-4 border-purple-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-id-card text-purple-500 mr-3"></i>
                                    Informasi Pribadi
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="nip" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-fingerprint text-purple-400 mr-2 text-xs"></i>NIP *
                                        </label>
                                        <input type="text" name="nip" id="nip" value="{{ old('nip', $guru->nip) }}" required
                                            class="w-full border border-purple-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-purple-300 transition duration-200 bg-white shadow-sm">
                                        @error('nip') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-user text-purple-400 mr-2 text-xs"></i>Nama Lengkap *
                                        </label>
                                        <input type="text" name="nama" id="nama" value="{{ old('nama', $guru->nama) }}" required
                                            class="w-full border border-purple-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-purple-300 transition duration-200 bg-white shadow-sm">
                                        @error('nama') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                                    <div>
                                        <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-venus-mars text-purple-400 mr-2 text-xs"></i>Jenis Kelamin *
                                        </label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" required
                                            class="w-full border border-purple-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-purple-300 transition duration-200 bg-white shadow-sm">
                                            <option value="L" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="P" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="tempat_lahir" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-map-marker-alt text-purple-400 mr-2 text-xs"></i>Tempat Lahir *
                                        </label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $guru->tempat_lahir) }}" required
                                            class="w-full border border-purple-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-purple-300 transition duration-200 bg-white shadow-sm">
                                        @error('tempat_lahir') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-calendar-alt text-purple-400 mr-2 text-xs"></i>Tanggal Lahir *
                                        </label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $guru->tanggal_lahir) }}" required
                                            class="w-full border border-purple-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-purple-300 transition duration-200 bg-white shadow-sm">
                                        @error('tanggal_lahir') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Informasi Kontak -->
                            <div class="bg-teal-50 rounded-2xl p-6 border-l-4 border-teal-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-address-book text-teal-500 mr-3"></i>
                                    Informasi Kontak
                                </h3>
                                <div class="space-y-6">
                                    <div>
                                        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-home text-teal-400 mr-2 text-xs"></i>Alamat
                                        </label>
                                        <textarea name="alamat" id="alamat" rows="3"
                                            class="w-full border border-teal-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:border-teal-300 transition duration-200 bg-white shadow-sm">{{ old('alamat', $guru->alamat) }}</textarea>
                                        @error('alamat') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="telepon" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                                <i class="fas fa-phone text-teal-400 mr-2 text-xs"></i>Nomor Telepon
                                            </label>
                                            <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $guru->telepon) }}"
                                                class="w-full border border-teal-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:border-teal-300 transition duration-200 bg-white shadow-sm">
                                            @error('telepon') 
                                                <small class="text-red-600 text-sm mt-1 flex items-center">
                                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                                </small> 
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                                <i class="fas fa-envelope text-teal-400 mr-2 text-xs"></i>Email *
                                            </label>
                                            <input type="email" name="email" id="email" value="{{ old('email', $guru->email) }}" required
                                                class="w-full border border-teal-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:border-teal-300 transition duration-200 bg-white shadow-sm">
                                            @error('email') 
                                                <small class="text-red-600 text-sm mt-1 flex items-center">
                                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                                </small> 
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Informasi Profesi -->
                            <div class="bg-amber-50 rounded-2xl p-6 border-l-4 border-amber-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-briefcase text-amber-500 mr-3"></i>
                                    Informasi Profesi
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="jabatan" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-user-tie text-amber-400 mr-2 text-xs"></i>Jabatan *
                                        </label>
                                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $guru->jabatan) }}" required
                                            class="w-full border border-amber-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-300 transition duration-200 bg-white shadow-sm">
                                        @error('jabatan') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="mata_pelajaran" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-book text-amber-400 mr-2 text-xs"></i>Mata Pelajaran *
                                        </label>
                                        <input type="text" name="mata_pelajaran" id="mata_pelajaran" value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}" required
                                            class="w-full border border-amber-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-300 transition duration-200 bg-white shadow-sm">
                                        @error('mata_pelajaran') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="kelas_diampu" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                            <i class="fas fa-door-open text-amber-400 mr-2 text-xs"></i>Kelas Diampu
                                        </label>
                                        <input type="text" name="kelas_diampu" id="kelas_diampu" value="{{ old('kelas_diampu', $guru->kelas_diampu) }}"
                                            class="w-full border border-amber-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-300 transition duration-200 bg-white shadow-sm">
                                        @error('kelas_diampu') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Foto -->
                            <div class="bg-blue-50 rounded-2xl p-6 border-l-4 border-blue-400">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-camera text-blue-500 mr-3"></i>
                                    Foto Guru
                                </h3>
                                <div class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-6">
                                    @if($guru->foto)
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" class="w-24 h-24 rounded-2xl border-4 border-white shadow-lg object-cover">
                                            <p class="text-sm text-gray-500 mt-2 text-center">Foto Saat Ini</p>
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <input type="file" name="foto" id="foto"
                                            class="w-full border border-blue-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition duration-200 bg-white shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        <p class="text-sm text-gray-500 mt-2">Unggah foto guru baru (opsional)</p>
                                        @error('foto') 
                                            <small class="text-red-600 text-sm mt-1 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </small> 
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                            <a href="{{ route('guru.index') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-semibold shadow-md hover:bg-gray-400 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                <i class="fas fa-arrow-left mr-2"></i>Batal
                            </a>
                            <button type="submit" class="bg-purple-500 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection