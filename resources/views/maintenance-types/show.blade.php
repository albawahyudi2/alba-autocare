<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Jenis Perawatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <tr>
                            <td class="font-bold py-2 w-1/4">Nama</td>
                            <td>{{ $maintenanceType->nama }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Deskripsi</td>
                            <td>{{ $maintenanceType->deskripsi }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Biaya Standar</td>
                            <td>Rp {{ number_format($maintenanceType->biaya_standar, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Interval KM</td>
                            <td>{{ $maintenanceType->interval_km ?? '-' }} KM</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Interval Bulan</td>
                            <td>{{ $maintenanceType->interval_bulan ?? '-' }} Bulan</td>
                        </tr>
                    </table>

                    <div class="mt-6">
                        <a href="{{ route('maintenance-types.edit', $maintenanceType) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Edit
                        </a>
                        <a href="{{ route('maintenance-types.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
