<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Suku Cadang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <tr>
                            <td class="font-bold py-2 w-1/4">Kode Part</td>
                            <td>{{ $sparePart->kode_part }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Nama</td>
                            <td>{{ $sparePart->nama }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Deskripsi</td>
                            <td>{{ $sparePart->deskripsi }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Harga</td>
                            <td>Rp {{ number_format($sparePart->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2">Stok</td>
                            <td>{{ $sparePart->stok }}</td>
                        </tr>
                    </table>

                    <div class="mt-6">
                        <a href="{{ route('spare-parts.edit', $sparePart) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Edit
                        </a>
                        <a href="{{ route('spare-parts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
