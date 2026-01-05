# Sistem Manajemen Perawatan Kendaraan

Aplikasi berbasis Laravel untuk mengelola data kendaraan, jenis perawatan, data perawatan, dan suku cadang.

## Fitur Utama

✅ **5 Tabel Database dengan Relasi:**
- `users` - Manajemen user dengan role (admin, mekanik, user)
- `vehicles` - Data kendaraan (mobil, motor, truk)
- `maintenance_types` - Jenis-jenis perawatan
- `maintenances` - Data perawatan kendaraan
- `spare_parts` - Suku cadang
- `maintenance_spare_parts` - Tabel pivot untuk relasi many-to-many

✅ **CRUD Lengkap untuk 4 Entitas:**
1. **Kendaraan (Vehicles)** - Create, Read, Update, Delete
2. **Jenis Perawatan (Maintenance Types)** - Create, Read, Update, Delete
3. **Data Perawatan (Maintenances)** - Create, Read, Update, Delete
4. **Suku Cadang (Spare Parts)** - Create, Read, Update, Delete

✅ **Relasi Database:**
- One-to-Many: `users` → `maintenances`
- One-to-Many: `vehicles` → `maintenances`
- One-to-Many: `maintenance_types` → `maintenances`
- Many-to-Many: `maintenances` ↔ `spare_parts`

✅ **Form Validation:**
- Menggunakan Form Request untuk setiap operasi Create dan Update
- Validasi input dengan pesan error dalam Bahasa Indonesia

✅ **Resource Controllers:**
- VehicleController
- MaintenanceTypeController
- MaintenanceController
- SparePartController

✅ **Autentikasi (Laravel Breeze):**
- Login, Register, Logout
- Middleware auth untuk semua route CRUD

✅ **Tampilan dengan Blade & Tailwind CSS:**
- Layout responsive menggunakan Tailwind CSS
- Halaman daftar data dengan pagination
- Form input yang user-friendly
- Validasi error ditampilkan dengan jelas

## Teknologi yang Digunakan

- **Laravel 12** - PHP Framework
- **MySQL** - Database
- **Laravel Breeze** - Authentication
- **Tailwind CSS** - Styling
- **Blade** - Template Engine
- **Eloquent ORM** - Database Operations

## Instalasi

### 1. Clone/Download Project
```bash
cd c:\xampp\alba\manajemen-perawatan-kendaraan
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Konfigurasi Database
Buat database MySQL:
```sql
CREATE DATABASE manajemen_kendaraan;
```

Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manajemen_kendaraan
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrate & Seed Database
```bash
php artisan migrate:fresh --seed
```

### 5. Compile Assets
```bash
npm run dev
```

### 6. Jalankan Server
```bash
php artisan serve
```

Akses aplikasi di: `http://127.0.0.1:8000`

## Akun Login Default

Setelah seeder dijalankan, gunakan akun berikut untuk login:

**Admin:**
- Email: `admin@example.com`
- Password: `password`

**User:**
- Email: `user@example.com`
- Password: `password`

## Struktur Database

### Tabel: users
- id (PK)
- name
- email (unique)
- email_verified_at
- password
- role (enum: admin, mekanik, user)
- remember_token
- created_at, updated_at

### Tabel: vehicles
- id (PK)
- nomor_polisi (unique)
- merk
- model
- tahun (year)
- warna
- jenis (enum: mobil, motor, truk)
- created_at, updated_at

### Tabel: maintenance_types
- id (PK)
- nama
- deskripsi
- biaya_standar (decimal)
- interval_km (nullable)
- interval_bulan (nullable)
- created_at, updated_at

### Tabel: maintenances
- id (PK)
- vehicle_id (FK → vehicles)
- maintenance_type_id (FK → maintenance_types)
- user_id (FK → users)
- tanggal_perawatan (date)
- kilometer (integer)
- biaya_total (decimal)
- catatan (text, nullable)
- status (enum: dijadwalkan, sedang_proses, selesai, dibatalkan)
- created_at, updated_at

### Tabel: spare_parts
- id (PK)
- nama
- kode_part (unique)
- deskripsi
- harga (decimal)
- stok (integer)
- created_at, updated_at

### Tabel: maintenance_spare_parts (Pivot)
- id (PK)
- maintenance_id (FK → maintenances)
- spare_part_id (FK → spare_parts)
- jumlah (integer)
- harga_satuan (decimal)
- subtotal (decimal)
- created_at, updated_at

## Fitur Validasi

Setiap form memiliki validasi yang ketat:

**Kendaraan:**
- Nomor polisi wajib dan unique
- Merk, model, warna wajib diisi
- Tahun harus antara 1900 - tahun depan
- Jenis harus salah satu dari: mobil, motor, truk

**Jenis Perawatan:**
- Nama dan deskripsi wajib diisi
- Biaya standar harus angka positif
- Interval KM dan bulan opsional

**Perawatan:**
- Kendaraan dan jenis perawatan wajib dipilih
- Tanggal perawatan wajib diisi
- Kilometer dan biaya harus angka positif
- Status wajib dipilih

**Suku Cadang:**
- Nama dan kode part wajib diisi
- Kode part harus unique
- Harga dan stok harus angka positif

## Route Resource

```php
Route::resource('vehicles', VehicleController::class);
Route::resource('maintenance-types', MaintenanceTypeController::class);
Route::resource('maintenances', MaintenanceController::class);
Route::resource('spare-parts', SparePartController::class);
```

Semua route dilindungi middleware `auth`.

## Menu Navigasi

Dashboard menyediakan akses cepat ke:
- 🚗 Kendaraan
- 📋 Jenis Perawatan
- ⏰ Data Perawatan
- 📦 Suku Cadang

## Ketentuan yang Dipenuhi

### ✅ Ketentuan Umum
- [x] Menggunakan Laravel 12
- [x] Menggunakan konsep MVC
- [x] Menggunakan database MySQL
- [x] Menggunakan Eloquent ORM

### ✅ Database
- [x] 6 tabel (users, vehicles, maintenance_types, maintenances, spare_parts, maintenance_spare_parts)
- [x] Setiap tabel memiliki primary key
- [x] Setiap tabel minimal 5 kolom data

### ✅ Relasi Antar Tabel
- [x] Relasi One-to-Many: users → maintenances
- [x] Relasi One-to-Many: vehicles → maintenances
- [x] Relasi One-to-Many: maintenance_types → maintenances
- [x] Relasi Many-to-Many: maintenances ↔ spare_parts

### ✅ Operasi CRUD
- [x] 4 entitas dengan CRUD lengkap (Vehicles, MaintenanceTypes, Maintenances, SpareParts)
- [x] Create, Read, Update, Delete untuk setiap entitas
- [x] CRUD dilakukan melalui Controller

### ✅ Controller & Routing
- [x] 4 Resource Controllers
- [x] Route menggunakan resource routing
- [x] Tidak ada logika bisnis di web.php

### ✅ Validasi
- [x] Validasi input pada tambah data
- [x] Validasi input pada ubah data
- [x] Menggunakan Form Request (VehicleRequest, MaintenanceTypeRequest, dll)

### ✅ Tampilan (View & CSS)
- [x] Menggunakan Blade Template
- [x] Halaman daftar data dengan pagination
- [x] Halaman form input dengan validasi
- [x] Menggunakan Tailwind CSS
- [x] Tampilan rapi dan mudah digunakan

## URL Akses

Server berjalan di: **http://127.0.0.1:8000**

Menu yang tersedia:
- `/dashboard` - Halaman Dashboard
- `/vehicles` - Manajemen Kendaraan
- `/maintenance-types` - Jenis Perawatan
- `/maintenances` - Data Perawatan
- `/spare-parts` - Suku Cadang

## Pengembang

Dibuat dengan ❤️ menggunakan Laravel & Tailwind CSS untuk memenuhi tugas Sistem Manajemen Perawatan Kendaraan

## Lisensi

Open Source - Bebas digunakan untuk pembelajaran
