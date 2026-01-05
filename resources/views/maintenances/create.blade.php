<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Perawatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('maintenances.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="vehicle_id" class="block text-gray-700 text-sm font-bold mb-2">Kendaraan</label>
                            <select name="vehicle_id" id="vehicle_id"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('vehicle_id') border-red-500 @enderror">
                                <option value="">-- Pilih Kendaraan --</option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                                        {{ $vehicle->nomor_polisi }} - {{ $vehicle->merk }} {{ $vehicle->model }}
                                    </option>
                                @endforeach
                            </select>
                            @error('vehicle_id')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="maintenance_type_id" class="block text-gray-700 text-sm font-bold mb-2">Jenis Perawatan</label>
                            <select name="maintenance_type_id" id="maintenance_type_id"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('maintenance_type_id') border-red-500 @enderror">
                                <option value="">-- Pilih Jenis Perawatan --</option>
                                @foreach($maintenanceTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('maintenance_type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->nama }} (Rp {{ number_format($type->biaya_standar, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                            @error('maintenance_type_id')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_perawatan" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Perawatan</label>
                            <input type="date" name="tanggal_perawatan" id="tanggal_perawatan" value="{{ old('tanggal_perawatan') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tanggal_perawatan') border-red-500 @enderror">
                            @error('tanggal_perawatan')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="kilometer" class="block text-gray-700 text-sm font-bold mb-2">Kilometer</label>
                            <input type="number" name="kilometer" id="kilometer" value="{{ old('kilometer') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kilometer') border-red-500 @enderror">
                            @error('kilometer')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="biaya_total" class="block text-gray-700 text-sm font-bold mb-2">Biaya Total</label>
                            <input type="number" name="biaya_total" id="biaya_total" value="{{ old('biaya_total') }}" step="0.01"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('biaya_total') border-red-500 @enderror">
                            @error('biaya_total')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select name="status" id="status"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror">
                                <option value="">-- Pilih Status --</option>
                                <option value="dijadwalkan" {{ old('status') == 'dijadwalkan' ? 'selected' : '' }}>Dijadwalkan</option>
                                <option value="sedang_proses" {{ old('status') == 'sedang_proses' ? 'selected' : '' }}>Sedang Proses</option>
                                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="catatan" class="block text-gray-700 text-sm font-bold mb-2">Catatan (Opsional)</label>
                            <textarea name="catatan" id="catatan" rows="3"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('catatan') }}</textarea>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan
                            </button>
                            <a href="{{ route('maintenances.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
