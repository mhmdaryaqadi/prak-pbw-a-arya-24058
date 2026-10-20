# 📘 Laporan Praktikum Pemrograman Berbasis Web - Pertemuan 5

**Nama:** Muhammad Arya Alqadi  
**NIM:** 4524210058  
**Kelas:** Praktikum Pemrograman Berbasis Web (A)  
**Topik:** Implementasi CRUD, Dynamic Settings, dan Autentikasi (SMP Mentari)

---

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/Tailwind_CSS-v4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/SQLite_%2F_MySQL-07405E?style=for-the-badge&logo=sqlite&logoColor=white" alt="Database">
  <img src="https://img.shields.io/badge/Laravel_Breeze-Auth-red?style=for-the-badge" alt="Auth">
</p>

## 📋 Ringkasan Aplikasi

Aplikasi **SMP Mentari** adalah sistem portal sekolah berbasis web yang dibangun dengan Laravel 12 dan Tailwind CSS v4. Aplikasi ini menyediakan halaman publik (kegiatan sekolah dan buku tamu digital) serta panel dashboard administrator terproteksi autentikasi (Laravel Breeze) untuk mengelola postingan kegiatan (CRUD), memoderasi pesan buku tamu, dan mengatur konfigurasi dinamis website menggunakan sistem cache terintegrasi.

---

## 🎯 Fitur yang Diimplementasikan

### 1. Sistem Autentikasi (Laravel Breeze)
- Autentikasi bawaan Blade stack: Registrasi, Login, dan Logout.
- Proteksi route panel dashboard admin menggunakan middleware `auth` dan `verified`.

### 2. Modul Kegiatan Sekolah (CRUD)
- **Publik:** Menampilkan daftar kegiatan sekolah terbaru di halaman utama dengan sistem paginasi dinamis.
- **Admin (CRUD):** 
  - Melihat seluruh daftar kegiatan (`index`).
  - Menambah kegiatan baru (`create` & `store`) dengan validasi form.
  - Memperbarui data kegiatan (`edit` & `update`).
  - Menghapus kegiatan (`destroy`) dengan konfirmasi alert.

### 3. Modul Buku Tamu (Guestbook)
- **Publik:** Pengunjung umum dapat mengirim pesan/kesan melalui form validasi (nama, email, pesan) dan melihat daftar ulasan pengunjung dengan format waktu relatif (`diffForHumans`).
- **Admin:** Melihat tabel seluruh pesan masuk dengan paginasi serta hak akses untuk menghapus pesan tertentu.

### 4. Pengaturan Dinamis (Dynamic Settings & Caching)
- Tabel konfigurasi berbasis *key-value* (misal: `home_kegiatan_per_page`).
- Menggunakan `Cache::remember` untuk efisiensi kueri database pada halaman publik.
- Pembersihan cache otomatis (`Cache::forget` / `clearCache`) setiap kali pengaturan diubah melalui panel admin.

### 5. Admin Dashboard & Metrik
- Statistik ringkasan jumlah total kegiatan dan pesan buku tamu secara riil.
- Menampilkan 5 pesan buku tamu terbaru langsung di halaman dashboard.

---

## 🗄️ Skema Database & Migrasi

1. **`pesan_tamus`**
   - `id`: Primary Key (auto-increment)
   - `nama`: String (varchar 255)
   - `email`: String (varchar 255)
   - `pesan`: Text
   - `timestamps`: `created_at` & `updated_at`

2. **`kegiatans`**
   - `id`: Primary Key (auto-increment)
   - `judul`: String (varchar 255)
   - `deskripsi`: Text
   - `timestamps`: `created_at` & `updated_at`

3. **`settings`**
   - `id`: Primary Key (auto-increment)
   - `key`: String (unique)
   - `value`: Text (nullable)
   - `type`: String (default: 'text')
   - `description`: Text (nullable)
   - `timestamps`: `created_at` & `updated_at`
   - *Default Seeder:* `home_kegiatan_per_page = 6`

---

## 🛣️ Daftar Rute Utama (`routes/web.php`)

| Method | URI | Action / Controller | Keterangan / Middleware |
| :--- | :--- | :--- | :--- |
| `GET` | `/` | `PageController@home` | Halaman Home Publik (Paginated) |
| `GET` | `/bukutamu` | `PesanTamuController@index` | Form & Daftar Pesan Publik |
| `POST` | `/bukutamu` | `PesanTamuController@store` | Simpan Pesan Pengunjung |
| `GET` | `/dashboard` | `DashboardController@index` | Dashboard Admin (`auth`, `verified`) |
| `RESOURCE` | `/kegiatan` | `KegiatanController` | CRUD Kegiatan Lengkap (`auth`) |
| `GET` | `/admin/bukutamu` | `PesanTamuController@adminIndex` | Daftar Buku Tamu Admin (`auth`) |
| `DELETE` | `/admin/bukutamu/{pesanTamu}` | `PesanTamuController@destroy` | Hapus Pesan Buku Tamu (`auth`) |
| `GET` | `/settings` | `SettingController@index` | Form Konfigurasi Website (`auth`) |
| `PUT` | `/settings` | `SettingController@update` | Simpan Konfigurasi & Clear Cache (`auth`) |

---

## 🛠️ Langkah Instalasi & Menjalankan Project

### 1. Masuk ke Direktori Project
```bash
cd SMP-Mentari
```

### 2. Instalasi Dependensi
```bash
composer install
npm install
```

### 3. Konfigurasi Environment & Key
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Migrasi Database
Pastikan database sudah disiapkan pada `.env` (SQLite/MySQL), lalu jalankan:
```bash
php artisan migrate
```

### 5. Menjalankan Server & Vite
Jalankan server aplikasi dan asset bundler secara bersamaan:
```bash
composer dev
```
*Atau jika dijalankan terpisah:*
```bash
php artisan serve
npm run dev
```
Aplikasi dapat diakses melalui peramban di: `http://localhost:8000`

---

## 📸 Dokumentasi & Hasil Uji Coba

### 1. Tampilan Halaman Publik
#### Halaman Home (Katalog Kegiatan)
> Menampilkan daftar kegiatan yang dibatasi paginasi dinamis sesuai konfigurasi.
<img width="1600" height="753" alt="WhatsApp Image 2026-10-13 at 13 41 14" src="https://github.com/user-attachments/assets/861fc8f1-0330-49de-9fc2-c495771e881c" />

#### Halaman Buku Tamu (Form & Feed Pengunjung)
> Form interaktif bagi publik untuk mengirim pesan serta daftar ulasan pengunjung.
<img width="1600" height="757" alt="WhatsApp Image 2026-10-13 at 13 41 14 (6)" src="https://github.com/user-attachments/assets/b8948b32-1be1-403d-a8bb-efa2dbb4dec3" />

---

### 2. Tampilan Autentikasi (Laravel Breeze)
#### Halaman Login & Register
<img width="1600" height="753" alt="WhatsApp Image 2026-10-13 at 13 46 21" src="https://github.com/user-attachments/assets/62759e36-acf3-48b4-8811-4f5f1a517a0b" />

<img width="1600" height="757" alt="WhatsApp Image 2026-10-13 at 13 46 22" src="https://github.com/user-attachments/assets/a5e4d070-c1ee-496c-97fd-23c86b2bd626" />

---

### 3. Tampilan Panel Administrator
#### Dashboard Admin
> Ringkasan metrik total kegiatan, pesan masuk, dan 5 pesan terbaru.
<img width="1600" height="756" alt="WhatsApp Image 2026-10-13 at 13 41 14 (5)" src="https://github.com/user-attachments/assets/2b9a74e3-0bf5-4640-ae80-afe4ba2c01e5" />

#### Manajemen Data Kegiatan (CRUD)
> Tampilan tabel data kegiatan, formulir create, dan formulir edit.
<img width="1600" height="752" alt="WhatsApp Image 2026-10-13 at 13 41 14 (4)" src="https://github.com/user-attachments/assets/9c17d1ab-4323-474c-b77a-e584c5193743" />
<img width="1600" height="758" alt="WhatsApp Image 2026-10-13 at 13 41 14 (3)" src="https://github.com/user-attachments/assets/25ded642-0af6-4279-9fc3-5cd3f2347f6e" />

#### Moderasi Buku Tamu
> Tabel admin untuk memantau serta menghapus pesan buku tamu.
<img width="1600" height="750" alt="WhatsApp Image 2026-10-13 at 13 41 14 (2)" src="https://github.com/user-attachments/assets/be75d45d-61d8-4675-89c4-15b2f048084a" />

#### Konfigurasi Website Dinamis (Settings)
> Pengaturan jumlah item per halaman home dengan caching database.
<img width="1600" height="754" alt="WhatsApp Image 2026-10-13 at 13 41 14 (1)" src="https://github.com/user-attachments/assets/70eb820f-ae2f-42de-9167-85e918f113a3" />

---

## 🧪 Testing

Jalankan automated test menggunakan Pest PHP:
```bash
composer test
```
