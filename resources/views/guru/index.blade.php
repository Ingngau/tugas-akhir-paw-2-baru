@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')
<div class="bg-indigo-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2 border-l-4 border-purple-400 pl-4">Data Guru</h1>
                <p class="text-gray-600 font-light">Daftar seluruh guru di SMPN 2 Gangga</p>
            </div>
            <a href="{{ route('guru.create') }}" 
               class="bg-purple-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                <i class="fas fa-plus mr-2"></i> Tambah Guru
            </a>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-6 shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-b-4 border-purple-400">
                <i class="fas fa-chalkboard-teacher text-3xl text-purple-500 mb-3"></i>
                <h3 class="text-2xl font-bold text-gray-800">{{ $gurus->total() }}</h3>
                <p class="text-gray-600 font-medium">Total Guru</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-b-4 border-blue-400">
                <i class="fas fa-male text-3xl text-blue-500 mb-3"></i>
                <h3 class="text-2xl font-bold text-gray-800">{{ $gurus->where('jenis_kelamin', 'L')->count() }}</h3>
                <p class="text-gray-600 font-medium">Guru Laki-laki</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-b-4 border-pink-400">
                <i class="fas fa-female text-3xl text-pink-500 mb-3"></i>
                <h3 class="text-2xl font-bold text-gray-800">{{ $gurus->where('jenis_kelamin', 'P')->count() }}</h3>
                <p class="text-gray-600 font-medium">Guru Perempuan</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-b-4 border-teal-400">
                <i class="fas fa-user-tie text-3xl text-teal-500 mb-3"></i>
                <h3 class="text-2xl font-bold text-gray-800">{{ $gurus->where('jabatan', 'Kepala Sekolah')->count() }}</h3>
                <p class="text-gray-600 font-medium">Kepala Sekolah</p>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-8 border-purple-400">
            <!-- Table Header -->
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-list text-xl text-purple-200"></i>
                        <h2 class="text-xl font-bold">Daftar Guru</h2>
                    </div>
                    <div class="text-purple-200 text-sm">
                        Menampilkan {{ $gurus->firstItem() }} - {{ $gurus->lastItem() }} dari {{ $gurus->total() }} guru
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-purple-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-purple-800 uppercase tracking-wider border-b border-purple-200">
                                <i class="fas fa-fingerprint mr-2"></i>NIP
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-purple-800 uppercase tracking-wider border-b border-purple-200">
                                <i class="fas fa-user mr-2"></i>Nama Guru
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-purple-800 uppercase tracking-wider border-b border-purple-200">
                                <i class="fas fa-venus-mars mr-2"></i>JK
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-purple-800 uppercase tracking-wider border-b border-purple-200">
                                <i class="fas fa-briefcase mr-2"></i>Jabatan
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-purple-800 uppercase tracking-wider border-b border-purple-200">
                                <i class="fas fa-book mr-2"></i>Mata Pelajaran
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-purple-800 uppercase tracking-wider border-b border-purple-200">
                                <i class="fas fa-cogs mr-2"></i>Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($gurus as $guru)
                            <tr class="hover:bg-purple-50 transition duration-200 group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-mono font-semibold text-gray-800">{{ $guru->nip }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3 group-hover:bg-purple-200 transition">
                                            <i class="fas fa-chalkboard-teacher text-purple-600 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-800">{{ $guru->nama }}</div>
                                            <div class="text-xs text-gray-500">{{ $guru->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full font-semibold 
                                        {{ $guru->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                        {{ $guru->jenis_kelamin == 'L' ? 'L' : 'P' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-800">{{ $guru->jabatan }}</div>
                                    @if($guru->jabatan == 'Kepala Sekolah')
                                        <span class="inline-block mt-1 px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-full font-semibold">
                                            <i class="fas fa-crown mr-1"></i>Pimpinan
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-800">{{ $guru->mata_pelajaran }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <!-- Lihat Detail -->
                                        <a href="{{ route('guru.show', $guru) }}"
                                           class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center hover:bg-blue-200 transition transform hover:scale-110"
                                           title="Lihat Detail">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('guru.edit', $guru) }}"
                                           class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center hover:bg-green-200 transition transform hover:scale-110"
                                           title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>

                                        <!-- Hapus -->
                                        <form action="{{ route('guru.destroy', $guru) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru {{ $guru->nama }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center hover:bg-red-200 transition transform hover:scale-110"
                                                    title="Hapus">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="text-gray-400">
                                        <i class="fas fa-chalkboard-teacher text-4xl mb-3"></i>
                                        <p class="text-lg font-semibold">Belum ada data guru</p>
                                        <p class="text-sm mt-2">Klik tombol "Tambah Guru" untuk menambahkan data pertama</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($gurus->hasPages())
            <div class="bg-purple-50 px-6 py-4 border-t border-purple-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-purple-700">
                        Menampilkan {{ $gurus->firstItem() }} - {{ $gurus->lastItem() }} dari {{ $gurus->total() }} guru
                    </div>
                    <div class="flex space-x-1">
                        {{ $gurus->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .pagination li {
        margin: 0 2px;
    }
    
    .pagination li a,
    .pagination li span {
        display: block;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s;
    }
    
    .pagination li a {
        background: white;
        color: #6B46C1;
        border: 1px solid #E9D8FD;
    }
    
    .pagination li a:hover {
        background: #6B46C1;
        color: white;
        border-color: #6B46C1;
    }
    
    .pagination li span {
        background: #6B46C1;
        color: white;
        border: 1px solid #6B46C1;
    }
    
    .pagination li .text-sm {
        padding: 8px 12px;
    }
</style>
@endsection