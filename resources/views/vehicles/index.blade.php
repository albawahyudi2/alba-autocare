<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Data Kendaraan') }}
            </h2>
            <a href="{{ route('vehicles.create') }}" class="inline-flex items-center px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-lg shadow-red-600/25">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Kendaraan
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
                            <p class="text-xs text-neutral-500 uppercase tracking-wider">Total</p>
                            <p class="text-2xl font-bold text-white mt-1">{{ $vehicles->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-red-600/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="glass rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-neutral-500 uppercase tracking-wider">Mobil</p>
                            <p class="text-2xl font-bold text-white mt-1">{{ $vehicles->where('jenis', 'mobil')->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-neutral-700/50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="glass rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-neutral-500 uppercase tracking-wider">Motor</p>
                            <p class="text-2xl font-bold text-white mt-1">{{ $vehicles->where('jenis', 'motor')->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-neutral-700/50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="glass rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-neutral-500 uppercase tracking-wider">Truk</p>
                            <p class="text-2xl font-bold text-white mt-1">{{ $vehicles->where('jenis', 'truk')->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-neutral-700/50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8"></path>
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
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Plat Nomor</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Merek & Model</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Tipe</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Tahun</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">KM Terakhir</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 bg-gray-800/50">
                            @forelse($vehicles as $vehicle)
                            <tr class="hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <span style="color: #EF4444; font-weight: bold; font-size: 16px; font-family: monospace;">
                                        {{ strtoupper($vehicle->nomor_polisi) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p style="color: #FFFFFF; font-weight: 600; font-size: 16px;">{{ $vehicle->merk }}</p>
                                        <p style="color: #FFFFFF; font-size: 14px;">{{ $vehicle->model }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span style="color: #FFFFFF; font-weight: 600; font-size: 16px;">
                                        {{ ucfirst($vehicle->jenis) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span style="color: #FFFFFF; font-weight: 600; font-size: 16px;">{{ $vehicle->tahun }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2" x-data="{ editing: false, km: '{{ $vehicle->km_terakhir ?? 0 }}' }">
                                        <span x-show="!editing" style="color: #FFFFFF; font-weight: 600; font-size: 16px;" x-text="parseInt(km).toLocaleString() + ' km'"></span>
                                        <input x-show="editing" x-model="km" type="number" class="bg-gray-700 text-white px-2 py-1 rounded w-32 text-sm" min="0" @keydown.enter="editing = false; fetch('{{ route('vehicles.update-km', $vehicle) }}', { method: 'PATCH', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }, body: JSON.stringify({ km_terakhir: km }) }).then(r => r.json()).then(data => { if(!data.success) alert('Gagal update KM'); })">
                                        <button @click="editing = !editing" class="p-1.5 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-all" :title="editing ? 'Simpan' : 'Edit KM'">
                                            <svg x-show="!editing" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            <svg x-show="editing" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center space-x-1">
                                        <a href="{{ route('vehicles.show', $vehicle) }}" class="p-2 text-neutral-400 hover:text-white hover:bg-neutral-700 rounded-lg transition-all" title="Lihat">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="p-2 text-neutral-400 hover:text-white hover:bg-neutral-700 rounded-lg transition-all" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kendaraan ini?')">
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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                        </svg>
                                        <p class="text-neutral-500 mb-4">Belum ada data kendaraan</p>
                                        <a href="{{ route('vehicles.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                            Tambah Kendaraan Pertama
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
