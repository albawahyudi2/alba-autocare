# Deployment Guide: Laravel to Vercel + Supabase

## Persiapan Awal

### 1. Setup Supabase Database
- Buat akun di [supabase.com](https://supabase.com)
- Buat project baru
- Copy credentials:
  - **Host**: Project Settings → Database → Host
  - **Database**: `postgres`
  - **Username**: `postgres`
  - **Password**: Project Settings → Database → Password
  - **Port**: `5432`

### 2. Setup Vercel Project
- Buat akun di [vercel.com](https://vercel.com)
- Hubungkan Git repository Anda

## Langkah-Langkah Deployment

### Step 1: Update Database Configuration di Supabase
```sql
-- Login ke Supabase Console SQL Editor
-- Buat database untuk aplikasi (optional, gunakan 'postgres' jika tidak)
-- Jalankan semua migration files
```

### Step 2: Konfigurasi Environment Variables di Vercel
Di Vercel Dashboard → Project Settings → Environment Variables, tambahkan:

```
APP_NAME=Alba AutoCare
APP_ENV=production
APP_KEY=base64:... (generate di lokal: php artisan key:generate)
APP_DEBUG=false
APP_URL=https://your-domain.vercel.app

DB_CONNECTION=pgsql
DB_HOST=aws-xxxxx.c.supabase.co
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=your_supabase_password

LOG_CHANNEL=stderr
LOG_LEVEL=error

SESSION_DRIVER=file
QUEUE_CONNECTION=sync
CACHE_STORE=array
```

### Step 3: Generate APP_KEY Lokal
```bash
php artisan key:generate --show
```
Copy output dan paste di `APP_KEY` di Vercel environment variables.

### Step 4: Deploy ke Vercel
```bash
# Push ke GitHub/GitLab/Bitbucket
git push origin main

# Atau deploy langsung:
npm i -g vercel
vercel --prod
```

### Step 5: Run Migrations di Production
Setelah deployment berhasil, run migrations:

```bash
# Option 1: Gunakan Vercel CLI
vercel env pull .env.production.local
php artisan migrate --force

# Option 2: Akses terminal Vercel di dashboard
# Jalankan: php artisan migrate --force
```

## Troubleshooting

### Database Connection Error
- Periksa IP whitelist di Supabase (Settings → Database)
- Vercel IP addresses mungkin perlu ditambahkan
- Coba gunakan DATABASE_URL format:
  ```
  DATABASE_URL=postgresql://postgres:PASSWORD@HOST:5432/postgres?sslmode=require
  ```

### Storage & Sessions Issues
- Session disimpan di file (tidak persisten dengan serverless)
- Untuk production: pertimbangkan Redis atau database session
- Configure di `config/session.php` dan `config/cache.php`

### Logs
- View logs: Vercel Dashboard → Function Logs
- Local testing: `php artisan serve` dan `php artisan tinker`

## File yang Dimodifikasi

✅ `vercel.json` - Konfigurasi Vercel untuk Laravel
✅ `.vercelignore` - Files untuk di-ignore
✅ `.env.example` - Template environment variables dengan PostgreSQL
✅ `api/index.php` - Entry point untuk Vercel Serverless Functions

## Tips Tambahan

1. **Build Script**: Vercel akan otomatis menjalankan build command
2. **Database Backups**: Enable automatic backups di Supabase
3. **Monitoring**: Setup error tracking (Sentry) untuk production
4. **Email**: Gunakan service seperti SendGrid atau Resend untuk production
5. **File Uploads**: Untuk uploads, gunakan Supabase Storage atau S3

## Rollback
Jika ada masalah, Vercel memungkinkan instant rollback ke deployment sebelumnya dari dashboard.

---

**Dokumentasi tambahan:**
- [Laravel on Vercel](https://vercel.com/guides/deploying-laravel-applications)
- [Supabase PostgreSQL](https://supabase.com/docs/guides/database)
- [Vercel Environment Variables](https://vercel.com/docs/concepts/projects/environment-variables)
