<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <tr>
                            <td class="font-bold py-2 w-1/4">Nomor Polisi</td>
                            <td>{{ $vehicle->nomor_polisi }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Merk</td>
                            <td>{{ $vehicle->merk }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Model</td>
                            <td>{{ $vehicle->model }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Tahun</td>
                            <td>{{ $vehicle->tahun }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Warna</td>
                            <td>{{ $vehicle->warna }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Jenis</td>
                            <td>{{ ucfirst($vehicle->jenis) }}</td>
                        </tr>
                    </table>

                    <div class="mt-6">
                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Edit
                        </a>
                        <a href="{{ route('vehicles.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
