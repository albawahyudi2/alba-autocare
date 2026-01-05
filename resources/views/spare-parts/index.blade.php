<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Suku Cadang') }}
            </h2>
            <a href="{{ route('spare-parts.create') }}" class="inline-flex items-center px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-lg shadow-red-600/25">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Suku Cadang
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if(session('success'))
            <div class="mb-6 p-4 bg-green-600/10 border border-green-600/30 rounded-xl">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-green-400">{{ session('success') }}</span>
                </div>
            </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="glass rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-neutral-500 uppercase tracking-wider">Total Item</p>
                            <p class="text-2xl font-bold text-white mt-1">{{ $spareParts->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-red-600/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="glass rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-neutral-500 uppercase tracking-wider">Total Stok</p>
                            <p class="text-2xl font-bold text-white mt-1">{{ $spareParts->sum('stok') }}</p>
                        </div>
                        <div class="w-12 h-12 bg-neutral-700/50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="glass rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-neutral-500 uppercase tracking-wider">Stok Rendah</p>
                            <p class="text-2xl font-bold text-yellow-400 mt-1">{{ $spareParts->where('stok', '<=', 5)->where('stok', '>', 0)->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-600/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="glass rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-neutral-500 uppercase tracking-wider">Habis</p>
                            <p class="text-2xl font-bold text-red-400 mt-1">{{ $spareParts->where('stok', 0)->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-red-600/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="glass rounded-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-900">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Kode</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Deskripsi</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Stok</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 bg-gray-800/50">
                            @forelse($spareParts as $part)
                            <tr class="hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <span style="color: #EF4444; font-weight: bold; font-size: 14px; font-family: monospace;">
                                        {{ $part->kode_part }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span style="color: #FFFFFF; font-weight: 600; font-size: 16px;">{{ $part->nama }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span style="color: #FFFFFF; font-size: 14px;">{{ Str::limit($part->deskripsi, 40) ?: '-' }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span style="color: #FFFFFF; font-weight: 600; font-size: 16px;">Rp {{ number_format($part->harga, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        if ($part->stok > 10) {
                                            $stockClass = 'bg-green-600/20 text-green-400 border-green-600/30';
                                        } elseif ($part->stok > 5) {
                                            $stockClass = 'bg-gray-700 text-white border-gray-600';
                                        } elseif ($part->stok > 0) {
                                            $stockClass = 'bg-yellow-600/20 text-yellow-400 border-yellow-600/30';
                                        } else {
                                            $stockClass = 'bg-red-600/20 text-red-400 border-red-600/30';
                                        }
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $stockClass }} border">
                                        {{ $part->stok }} unit
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center space-x-1">
                                        <a href="{{ route('spare-parts.show', $part) }}" class="p-2 text-neutral-400 hover:text-white hover:bg-neutral-700 rounded-lg transition-all" title="Lihat">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('spare-parts.edit', $part) }}" class="p-2 text-neutral-400 hover:text-white hover:bg-neutral-700 rounded-lg transition-all" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('spare-parts.destroy', $part) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus suku cadang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-neutral-400 hover:text-red-500 hover:bg-red-600/10 rounded-lg transition-all" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-neutral-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        <p class="text-neutral-500 mb-4">Belum ada suku cadang</p>
                                        <a href="{{ route('spare-parts.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                            Tambah Suku Cadang Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
