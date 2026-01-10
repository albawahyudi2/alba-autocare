# Panduan Setup Laravel di InfinityFree

## Langkah-langkah Setup

### 1. Upload File ke InfinityFree

Upload semua file Laravel ke folder `htdocs` di hosting InfinityFree Anda:
- Upload semua file dan folder (app, bootstrap, config, database, public, resources, routes, storage, vendor, dll)
- Pastikan file `.htaccess` di root dan di folder `public` sudah terupload
- Jangan upload folder `node_modules` (tidak diperlukan di production)

### 2. Konfigurasi Database

Di panel InfinityFree:
1. Buat database MySQL baru
2. Catat informasi berikut:
   - Database Host (biasanya: sqlXXX.infinityfreeapp.com atau localhost)
   - Database Name (format: epizXXXXXXXX_namadatabase)
   - Database Username (format: epizXXXXXXXX)
   - Database Password

3. Import database Anda melalui phpMyAdmin InfinityFree

### 3. Konfigurasi File .env

Buat file `.env` di root folder (sejajar dengan file `.htaccess`) dengan konfigurasi berikut:

```env
APP_NAME="Alba Autocare"
APP_ENV=production
APP_KEY=base64:TyFcuWcyDx6l4vu9h5FKvFgk5wiPDUfvQkWJe9plY/Q=
APP_DEBUG=false
APP_URL=http://namadomainanda.infinityfreeapp.com

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

# Konfigurasi Database InfinityFree
DB_CONNECTION=mysql
DB_HOST=sqlXXX.infinityfreeapp.com
DB_PORT=3306
DB_DATABASE=epizXXXXXXXX_manajemen_kendaraan
DB_USERNAME=epizXXXXXXXX
DB_PASSWORD=password_database_anda

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync

CACHE_STORE=file

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

**PENTING:**
- Ganti `APP_DEBUG=false` untuk production (jangan gunakan true di production!)
- Ganti `APP_URL` dengan URL domain Anda
- Ganti semua konfigurasi database (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD) sesuai dengan informasi dari panel InfinityFree
- Gunakan `SESSION_DRIVER=file` dan `CACHE_STORE=file` karena InfinityFree tidak support database sessions dengan baik
- Gunakan `QUEUE_CONNECTION=sync` karena InfinityFree tidak support queue workers

### 4. Set Permission Folder Storage dan Bootstrap/Cache

**PENTING:** InfinityFree memerlukan permission khusus untuk folder storage.

Melalui File Manager InfinityFree atau FTP, set permission folder berikut menjadi **0755** atau **0777**:
- `storage/`
- `storage/framework/`
- `storage/framework/cache/`
- `storage/framework/sessions/`
- `storage/framework/views/`
- `storage/logs/`
- `bootstrap/cache/`

### 5. Cek File .htaccess

Pastikan ada 2 file `.htaccess`:

**File `.htaccess` di ROOT folder (htdocs):**
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

**File `.htaccess` di folder PUBLIC sudah ada (default Laravel)**

### 6. Testing

1. Akses website Anda: `http://namadomainanda.infinityfreeapp.com`
2. Jika muncul error, aktifkan debug sementara:
   - Set `APP_DEBUG=true` di file `.env`
   - Lihat error message yang muncul
   - Setelah selesai troubleshoot, set kembali `APP_DEBUG=false`

## Troubleshooting

### Error: "500 Internal Server Error"

**Penyebab umum:**
1. File `.env` tidak ada atau salah konfigurasi
2. APP_KEY tidak di-generate
3. Permission folder storage salah
4. Konfigurasi database salah

**Solusi:**
1. Pastikan file `.env` ada di root folder
2. Cek permission folder storage (harus 0755 atau 0777)
3. Verifikasi konfigurasi database di file `.env`
4. Aktifkan `APP_DEBUG=true` sementara untuk lihat error detail

### Error: "Database connection failed"

**Penyebab:**
Konfigurasi database salah

**Solusi:**
1. Verifikasi DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD di file `.env`
2. InfinityFree biasanya menggunakan:
   - Host: `sqlXXX.infinityfreeapp.com` atau `localhost`
   - Database name: `epizXXXXXXXX_namadatabase`
   - Username: `epizXXXXXXXX`
3. Pastikan database sudah dibuat di panel InfinityFree
4. Pastikan database sudah di-import

### Error: "SQLSTATE[HY000] [2002] Connection refused"

**Solusi:**
- Ganti `DB_HOST=127.0.0.1` menjadi `DB_HOST=localhost` atau sebaliknya
- Atau gunakan host database yang diberikan InfinityFree (format: sqlXXX.infinityfreeapp.com)

### Halaman tidak ada CSS/JS atau gambar tidak muncul

**Solusi:**
1. Pastikan `APP_URL` di `.env` sudah benar
2. Cek apakah folder `public/build` sudah terupload
3. Run `npm run build` di local, lalu upload ulang folder `public/build`

### Session tidak berfungsi

**Solusi:**
1. Set `SESSION_DRIVER=file` di `.env` (bukan database)
2. Pastikan folder `storage/framework/sessions` punya permission 0755 atau 0777
3. Set `SESSION_PATH=/` dan `SESSION_DOMAIN=null`

## Catatan Penting InfinityFree

1. **PHP Version**: Cek versi PHP di panel InfinityFree, pastikan compatible dengan Laravel Anda (minimal PHP 8.1 untuk Laravel 11)

2. **Limitation**:
   - Tidak support Artisan commands di hosting
   - Tidak support Queue workers
   - Tidak support Cron jobs (terbatas)
   - Ada hit rate limit (requests per hour)

3. **File .env**: InfinityFree kadang tidak menampilkan file yang dimulai dengan titik (.) di file manager. Anda bisa:
   - Upload via FTP client (FileZilla)
   - Atau rename `env.txt` menjadi `.env` via FTP

4. **APP_KEY**: Jangan ganti APP_KEY jika sudah ada data terenkripsi di database

## Checklist Setup

- [ ] Semua file Laravel sudah diupload ke `htdocs`
- [ ] Database sudah dibuat di panel InfinityFree
- [ ] Database sudah di-import via phpMyAdmin
- [ ] File `.env` sudah dibuat dengan konfigurasi yang benar
- [ ] Permission folder `storage` dan `bootstrap/cache` sudah di-set (0755/0777)
- [ ] File `.htaccess` di root folder sudah ada
- [ ] `APP_DEBUG=false` untuk production
- [ ] `SESSION_DRIVER=file` 
- [ ] `CACHE_STORE=file`
- [ ] `QUEUE_CONNECTION=sync`
- [ ] Website berhasil diakses tanpa error

## Kontak & Support

Jika masih ada masalah, periksa:
1. Error log di `storage/logs/laravel.log`
2. Error log di panel InfinityFree
3. Forum InfinityFree untuk troubleshooting
