@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="bg-indigo-50 min-h-screen">
    <div class="container mx-auto px-4 py-12">

        {{-- Hero Header --}}
        <div class="bg-purple-200 text-purple-900 rounded-3xl p-8 mb-12 text-center shadow-xl border-t-8 border-purple-400/50">
            <h1 class="text-4xl font-extrabold mb-4 tracking-tight">Data Siswa</h1>
            <p class="text-lg mb-6 font-light italic">Kelola data siswa dengan mudah dan efisien</p>
            <a href="{{ route('siswa.create') }}" 
               class="inline-flex items-center justify-center bg-purple-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:bg-purple-600 transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                <i class="fas fa-plus mr-2"></i>Tambah Siswa Baru
            </a>
        </div>

        {{-- Alert --}}
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-2xl mb-8 shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            @php
                $totalX   = $siswas->where('kelas', 'like', 'X%')->count();
                $totalXI  = $siswas->where('kelas', 'like', 'XI%')->count();
                $totalXII = $siswas->where('kelas', 'like', 'XII%')->count();
            @endphp

            <div class="bg-white rounded-2xl shadow-xl p-6 text-center border-b-4 border-blue-400 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <i class="fas fa-users text-4xl text-blue-500 mb-3 animate-bounce"></i>
                <h3 class="text-2xl font-bold text-gray-800">{{ $siswas->count() }}</h3>
                <p class="text-gray-600 font-medium">Total Siswa</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6 text-center border-b-4 border-green-400 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <i class="fas fa-user-graduate text-4xl text-green-500 mb-3 animate-bounce"></i>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalX }}</h3>
                <p class="text-gray-600 font-medium">Kelas X</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6 text-center border-b-4 border-yellow-400 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <i class="fas fa-book text-4xl text-yellow-500 mb-3 animate-bounce"></i>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalXI }}</h3>
                <p class="text-gray-600 font-medium">Kelas XI</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6 text-center border-b-4 border-red-400 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <i class="fas fa-graduation-cap text-4xl text-red-500 mb-3 animate-bounce"></i>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalXII }}</h3>
                <p class="text-gray-600 font-medium">Kelas XII</p>
            </div>
        </div>

        {{-- Filter Section --}}
        <div class="bg-white rounded-2xl shadow-xl p-6 mb-8 border-t-8 border-teal-400/50">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-filter text-teal-500 mr-3"></i>
                Filter Data Siswa
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Cari Siswa</label>
                    <div class="relative">
                        <input type="text" id="search" placeholder="Nama atau NISN..."
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 py-3 pl-10 transition duration-300">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <div>
                    <label for="kelas" class="block text-sm font-medium text-gray-700 mb-2">Filter Kelas</label>
                    <select id="kelas"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 py-3 transition duration-300">
                        <option value="">Semua Kelas</option>
                        <option value="X">Kelas X</option>
                        <option value="XI">Kelas XI</option>
                        <option value="XII">Kelas XII</option>
                    </select>
                </div>

                <div>
                    <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-2">Filter Jurusan</label>
                    <select id="jurusan"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 py-3 transition duration-300">
                        <option value="">Semua Jurusan</option>
                        <option value="IPA">IPA</option>
                        <option value="IPS">IPS</option>
                        <option value="Bahasa">Bahasa</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Tabel --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-pink-400/50">
            <div class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <i class="fas fa-list mr-3"></i>
                    Daftar Siswa
                </h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NISN</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($siswas as $siswa)
                        <tr class="hover:bg-purple-50 transition duration-300 group">

                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($siswa->foto)
                                    <img src="{{ asset('storage/' . $siswa->foto) }}" alt="{{ $siswa->nama }}"
                                         class="w-12 h-12 rounded-full object-cover shadow-md group-hover:shadow-lg transition">
                                @else
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center shadow-md group-hover:shadow-lg transition">
                                        <i class="fas fa-user text-white text-lg"></i>
                                    </div>
                                @endif
                            </td>

                            <td class="px-6 py-4 font-mono text-gray-700">{{ $siswa->nisn }}</td>

                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900 group-hover:text-purple-700 transition">{{ $siswa->nama }}</div>
                                <div class="text-sm text-gray-500">{{ $siswa->email }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800 border-2 border-blue-200">
                                    {{ $siswa->kelas }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                @if($siswa->jurusan)
                                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800 border-2 border-green-200">
                                        {{ $siswa->jurusan }}
                                    </span>
                                @else
                                    <span class="text-gray-400 italic">-</span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('siswa.show', $siswa) }}" 
                                       class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition transform hover:scale-110 shadow-md hover:shadow-lg"
                                       title="Lihat Detail">
                                        <i class="fas fa-eye w-4 h-4"></i>
                                    </a>

                                    <a href="{{ route('siswa.edit', $siswa) }}" 
                                       class="bg-green-500 text-white p-2 rounded-lg hover:bg-green-600 transition transform hover:scale-110 shadow-md hover:shadow-lg"
                                       title="Edit">
                                        <i class="fas fa-edit w-4 h-4"></i>
                                    </a>

                                    <form action="{{ route('siswa.destroy', $siswa) }}" 
                                          method="POST" class="inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition transform hover:scale-110 shadow-md hover:shadow-lg"
                                                title="Hapus">
                                            <i class="fas fa-trash w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <i class="fas fa-users text-6xl mb-4 text-gray-300"></i>
                                    <p class="text-xl font-semibold mb-2">Belum ada data siswa</p>
                                    <p class="text-gray-500 mb-4">Mulai dengan menambahkan siswa pertama</p>
                                    <a href="{{ route('siswa.create') }}" 
                                       class="inline-flex items-center justify-center bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:from-purple-600 hover:to-pink-600 transition transform hover:scale-105">
                                        <i class="fas fa-plus mr-2"></i>Tambah Siswa Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($siswas->hasPages())
                <div class="bg-white px-6 py-4 border-t border-gray-200">
                    <div class="flex justify-center">
                        {{ $siswas->links() }}
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>

{{-- Script Filter --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const kelasFilter = document.getElementById('kelas');
    const jurusanFilter = document.getElementById('jurusan');

    const rows = document.querySelectorAll('tbody tr');

    function filterTable() {
        const search = searchInput.value.toLowerCase();
        const kelas = kelasFilter.value;
        const jurusan = jurusanFilter.value;

        rows.forEach(row => {
            const nisn    = row.cells[1]?.textContent.toLowerCase() || '';
            const nama    = row.cells[2]?.textContent.toLowerCase() || '';
            const kelasTd = row.cells[3]?.textContent || '';
            const jurTd   = row.cells[4]?.textContent || '';

            const matchSearch  = nisn.includes(search) || nama.includes(search);
            const matchKelas   = !kelas   || kelasTd.includes(kelas);
            const matchJurusan = !jurusan || jurTd.includes(jurusan);

            row.style.display = (matchSearch && matchKelas && matchJurusan) ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
    kelasFilter.addEventListener('change', filterTable);
    jurusanFilter.addEventListener('change', filterTable);
});
</script>

@endsection