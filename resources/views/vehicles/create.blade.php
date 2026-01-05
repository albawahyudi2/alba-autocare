<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('vehicles.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="nomor_polisi" class="block text-gray-700 text-sm font-bold mb-2">Nomor Polisi</label>
                            <input type="text" name="nomor_polisi" id="nomor_polisi" value="{{ old('nomor_polisi') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nomor_polisi') border-red-500 @enderror">
                            @error('nomor_polisi')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="merk" class="block text-gray-700 text-sm font-bold mb-2">Merk</label>
                            <input type="text" name="merk" id="merk" value="{{ old('merk') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('merk') border-red-500 @enderror">
                            @error('merk')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Model</label>
                            <input type="text" name="model" id="model" value="{{ old('model') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('model') border-red-500 @enderror">
                            @error('model')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tahun" class="block text-gray-700 text-sm font-bold mb-2">Tahun</label>
                            <input type="number" name="tahun" id="tahun" value="{{ old('tahun') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tahun') border-red-500 @enderror">
                            @error('tahun')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="warna" class="block text-gray-700 text-sm font-bold mb-2">Warna</label>
                            <input type="text" name="warna" id="warna" value="{{ old('warna') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('warna') border-red-500 @enderror">
                            @error('warna')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jenis" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kendaraan</label>
                            <select name="jenis" id="jenis"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jenis') border-red-500 @enderror">
                                <option value="">-- Pilih Jenis --</option>
                                <option value="mobil" {{ old('jenis') == 'mobil' ? 'selected' : '' }}>Mobil</option>
                                <option value="motor" {{ old('jenis') == 'motor' ? 'selected' : '' }}>Motor</option>
                                <option value="truk" {{ old('jenis') == 'truk' ? 'selected' : '' }}>Truk</option>
                            </select>
                            @error('jenis')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan
                            </button>
                            <a href="{{ route('vehicles.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
