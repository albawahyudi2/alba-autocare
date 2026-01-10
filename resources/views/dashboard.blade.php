<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="glass rounded-2xl p-8 mb-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">
                            Selamat Datang di Alba AutoCare
                        </h1>
                        <p class="text-neutral-400">Sistem Manajemen Perawatan Kendaraan Premium</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="text-right">
                            <p class="text-sm text-neutral-500">Tanggal Hari Ini</p>
                            <p class="text-lg font-semibold text-white">{{ now()->format('d F Y') }}</p>
                        </div>
                        <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Kendaraan -->
                <div class="glass rounded-xl p-6 hover:border-red-600/50 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-neutral-500 mb-1">Total Kendaraan</p>
                            <p class="text-3xl font-bold text-white">{{ \App\Models\Vehicle::count() }}</p>
                        </div>
                        <div class="w-14 h-14 bg-neutral-800 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <span class="text-neutral-500">Unit aktif dalam sistem</span>
                    </div>
                </div>

                <!-- Total Perawatan -->
                <div class="glass rounded-xl p-6 hover:border-red-600/50 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-neutral-500 mb-1">Total Perawatan</p>
                            <p class="text-3xl font-bold text-white">{{ \App\Models\Maintenance::count() }}</p>
                        </div>
                        <div class="w-14 h-14 bg-neutral-800 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <span class="text-neutral-500">Riwayat perawatan</span>
                    </div>
                </div>

                <!-- Suku Cadang -->
                <div class="glass rounded-xl p-6 hover:border-red-600/50 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-neutral-500 mb-1">Suku Cadang</p>
                            <p class="text-3xl font-bold text-white">{{ \App\Models\SparePart::count() }}</p>
                        </div>
                        <div class="w-14 h-14 bg-neutral-800 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <span class="text-neutral-500">Item tersedia</span>
                    </div>
                </div>

                <!-- Jenis Perawatan -->
                <div class="glass rounded-xl p-6 hover:border-red-600/50 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-neutral-500 mb-1">Jenis Perawatan</p>
                            <p class="text-3xl font-bold text-white">{{ \App\Models\MaintenanceType::count() }}</p>
                        </div>
                        <div class="w-14 h-14 bg-neutral-800 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <span class="text-neutral-500">Kategori layanan</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Menu Cepat -->
                <div class="glass rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Menu Cepat
                    </h3>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('vehicles.create') }}" class="flex items-center p-4 bg-neutral-800/50 rounded-xl hover:bg-neutral-800 border border-neutral-700/50 hover:border-red-600/50 transition-all duration-200 group">
                            <div class="w-10 h-10 bg-neutral-700 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-600 transition-colors">
                                <svg class="w-5 h-5 text-neutral-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">Tambah Kendaraan</p>
                                <p class="text-xs text-neutral-500">Daftarkan unit baru</p>
                            </div>
                        </a>
                        <a href="{{ route('maintenances.create') }}" class="flex items-center p-4 bg-neutral-800/50 rounded-xl hover:bg-neutral-800 border border-neutral-700/50 hover:border-red-600/50 transition-all duration-200 group">
                            <div class="w-10 h-10 bg-neutral-700 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-600 transition-colors">
                                <svg class="w-5 h-5 text-neutral-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">Tambah Perawatan</p>
                                <p class="text-xs text-neutral-500">Catat service baru</p>
                            </div>
                        </a>
                        <a href="{{ route('spare-parts.create') }}" class="flex items-center p-4 bg-neutral-800/50 rounded-xl hover:bg-neutral-800 border border-neutral-700/50 hover:border-red-600/50 transition-all duration-200 group">
                            <div class="w-10 h-10 bg-neutral-700 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-600 transition-colors">
                                <svg class="w-5 h-5 text-neutral-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">Tambah Suku Cadang</p>
                                <p class="text-xs text-neutral-500">Input inventori</p>
                            </div>
                        </a>
                        <a href="{{ route('maintenance-types.create') }}" class="flex items-center p-4 bg-neutral-800/50 rounded-xl hover:bg-neutral-800 border border-neutral-700/50 hover:border-red-600/50 transition-all duration-200 group">
                            <div class="w-10 h-10 bg-neutral-700 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-600 transition-colors">
                                <svg class="w-5 h-5 text-neutral-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">Jenis Perawatan</p>
                                <p class="text-xs text-neutral-500">Tambah kategori</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Perawatan Terbaru -->
                <div class="glass rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Perawatan Terbaru
                    </h3>
                    <div class="space-y-3">
                        @forelse(\App\Models\Maintenance::with(['vehicle', 'maintenanceType'])->latest()->take(4)->get() as $maintenance)
                        <div class="flex items-center justify-between p-3 bg-neutral-800/50 rounded-lg border border-neutral-700/50">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-neutral-700 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-white">{{ strtoupper($maintenance->vehicle->nomor_polisi ?? 'N/A') }}</p>
                                    <p class="text-xs text-neutral-500">{{ $maintenance->maintenanceType->nama ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs rounded-full {{ $maintenance->status === 'selesai' ? 'bg-green-600/20 text-green-400' : ($maintenance->status === 'sedang_proses' ? 'bg-blue-600/20 text-blue-400' : ($maintenance->status === 'dijadwalkan' ? 'bg-yellow-600/20 text-yellow-400' : 'bg-neutral-600/20 text-neutral-400')) }}">
                                {{ ucfirst(str_replace('_', ' ', $maintenance->status)) }}
                            </span>
                        </div>
                        @empty
                        <div class="text-center py-8 text-neutral-500">
                            <svg class="w-12 h-12 mx-auto mb-3 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p>Belum ada data perawatan</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

