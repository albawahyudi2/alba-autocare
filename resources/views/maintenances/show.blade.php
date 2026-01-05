<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Perawatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <tr>
                            <td class="font-bold py-2 w-1/4">Kendaraan</td>
                            <td>{{ $maintenance->vehicle->nomor_polisi }} - {{ $maintenance->vehicle->merk }} {{ $maintenance->vehicle->model }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Jenis Perawatan</td>
                            <td>{{ $maintenance->maintenanceType->nama }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Tanggal Perawatan</td>
                            <td>{{ $maintenance->tanggal_perawatan->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Kilometer</td>
                            <td>{{ number_format($maintenance->kilometer, 0, ',', '.') }} KM</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Biaya Total</td>
                            <td>Rp {{ number_format($maintenance->biaya_total, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Status</td>
                            <td>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($maintenance->status == 'selesai') bg-green-100 text-green-800
                                    @elseif($maintenance->status == 'sedang_proses') bg-blue-100 text-blue-800
                                    @elseif($maintenance->status == 'dijadwalkan') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst(str_replace('_', ' ', $maintenance->status)) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Petugas</td>
                            <td>{{ $maintenance->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Catatan</td>
                            <td>{{ $maintenance->catatan ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="mt-6">
                        <a href="{{ route('maintenances.edit', $maintenance) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Edit
                        </a>
                        <a href="{{ route('maintenances.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
