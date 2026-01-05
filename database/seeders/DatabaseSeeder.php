<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\MaintenanceType;
use App\Models\Maintenance;
use App\Models\SparePart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create regular user
        $user = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // Create vehicles
        Vehicle::create([
            'nomor_polisi' => 'B 1234 ABC',
            'merk' => 'Toyota',
            'model' => 'Avanza',
            'tahun' => 2020,
            'warna' => 'Putih',
            'jenis' => 'mobil',
        ]);

        Vehicle::create([
            'nomor_polisi' => 'B 5678 XYZ',
            'merk' => 'Honda',
            'model' => 'Beat',
            'tahun' => 2021,
            'warna' => 'Merah',
            'jenis' => 'motor',
        ]);

        Vehicle::create([
            'nomor_polisi' => 'B 9999 DEF',
            'merk' => 'Mitsubishi',
            'model' => 'Colt Diesel',
            'tahun' => 2019,
            'warna' => 'Biru',
            'jenis' => 'truk',
        ]);

        // Create maintenance types
        MaintenanceType::create([
            'nama' => 'Service Rutin',
            'deskripsi' => 'Perawatan rutin kendaraan termasuk ganti oli dan filter',
            'biaya_standar' => 350000,
            'interval_km' => 5000,
            'interval_bulan' => 3,
        ]);

        MaintenanceType::create([
            'nama' => 'Ganti Ban',
            'deskripsi' => 'Penggantian ban kendaraan',
            'biaya_standar' => 800000,
            'interval_km' => 40000,
            'interval_bulan' => null,
        ]);

        MaintenanceType::create([
            'nama' => 'Tune Up',
            'deskripsi' => 'Tune up mesin untuk performa optimal',
            'biaya_standar' => 500000,
            'interval_km' => 10000,
            'interval_bulan' => 6,
        ]);

        // Create spare parts
        SparePart::create([
            'nama' => 'Oli Mesin',
            'kode_part' => 'OLI-001',
            'deskripsi' => 'Oli mesin synthetic 10W-40',
            'harga' => 150000,
            'stok' => 50,
        ]);

        SparePart::create([
            'nama' => 'Filter Oli',
            'kode_part' => 'FIL-001',
            'deskripsi' => 'Filter oli standar',
            'harga' => 35000,
            'stok' => 100,
        ]);

        SparePart::create([
            'nama' => 'Ban Michelin',
            'kode_part' => 'BAN-001',
            'deskripsi' => 'Ban Michelin ukuran 185/65 R15',
            'harga' => 650000,
            'stok' => 20,
        ]);

        SparePart::create([
            'nama' => 'Busi',
            'kode_part' => 'BUS-001',
            'deskripsi' => 'Busi iridium',
            'harga' => 85000,
            'stok' => 80,
        ]);

        // Create maintenances
        Maintenance::create([
            'vehicle_id' => 1,
            'maintenance_type_id' => 1,
            'user_id' => $admin->id,
            'tanggal_perawatan' => now()->subDays(10),
            'kilometer' => 15000,
            'biaya_total' => 350000,
            'catatan' => 'Service rutin pertama',
            'status' => 'selesai',
        ]);

        Maintenance::create([
            'vehicle_id' => 2,
            'maintenance_type_id' => 3,
            'user_id' => $user->id,
            'tanggal_perawatan' => now()->subDays(5),
            'kilometer' => 8000,
            'biaya_total' => 500000,
            'catatan' => 'Tune up karena mesin kurang responsif',
            'status' => 'selesai',
        ]);

        Maintenance::create([
            'vehicle_id' => 1,
            'maintenance_type_id' => 2,
            'user_id' => $admin->id,
            'tanggal_perawatan' => now()->addDays(5),
            'kilometer' => 20000,
            'biaya_total' => 800000,
            'catatan' => 'Ganti ban depan dan belakang',
            'status' => 'dijadwalkan',
        ]);
    }
}

