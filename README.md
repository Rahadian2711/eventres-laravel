# 🎵 Melodia — Platform Tiket Konser Musik Indonesia

Melodia adalah platform pembelian tiket konser musik berbasis web yang dibangun dengan Laravel 13. Platform ini menghubungkan penggemar musik dengan artis favorit mereka melalui pengalaman pembelian tiket yang mudah, aman, dan modern.

---

## 📋 Daftar Isi

- [Fitur](#-fitur)
- [Tech Stack](#-tech-stack)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi & Setup](#-instalasi--setup)
- [Konfigurasi Environment](#-konfigurasi-environment)
- [Konfigurasi Midtrans](#-konfigurasi-midtrans)
- [Konfigurasi Ngrok](#-konfigurasi-ngrok)
- [Menjalankan Aplikasi](#-menjalankan-aplikasi)
- [Struktur Route](#-struktur-route)
- [Struktur Database](#-struktur-database)

---

## ✨ Fitur

- 🎪 **Jelajahi Event** — Tampilkan semua konser, festival, dan tur dengan filter kategori dan pencarian
- 🎤 **Halaman Artis** — Profil artis lengkap dengan lagu populer dan konser mendatang
- 🎫 **Pembelian Tiket** — Pilih kategori tiket, pilih jumlah, dan checkout dengan mudah
- 💳 **Payment Gateway** — Integrasi Midtrans (transfer bank, QRIS, kartu kredit, dll)
- 👤 **Autentikasi** — Register, login, dan manajemen profil (Laravel Breeze)
- 📱 **Dark Mode** — UI mendukung dark dan light mode
- 📄 **Tiket Digital** — Tiket tersimpan dan bisa dilihat kapan saja
- 📜 **Riwayat Pembayaran** — Histori semua transaksi pengguna

---

## 🛠 Tech Stack

| Layer      | Teknologi                                  |
| ---------- | ------------------------------------------ |
| Backend    | Laravel 13 (PHP ^8.3)                      |
| Frontend   | Blade, Tailwind CSS v3, Alpine.js v3       |
| Database   | MySQL / MariaDB                            |
| Payment    | Midtrans (`midtrans/midtrans-php`)         |
| Auth       | Laravel Breeze                             |
| Build Tool | Vite 8                                     |
| Dev Tools  | Laravel Tinker, Laravel Pail, Laravel Pint |

---

## 💻 Persyaratan Sistem

Pastikan software berikut sudah terinstall sebelum memulai:

| Software                                   | Versi Minimum |
| ------------------------------------------ | ------------- |
| PHP                                        | 8.3+          |
| Composer                                   | 2.x           |
| Node.js                                    | 18+           |
| NPM                                        | 9+            |
| MySQL / MariaDB                            | 8.0+ / 10.4+  |
| Git                                        | Latest        |
| [Laragon](https://laragon.org) _(Windows)_ | 6.0+          |
| [Ngrok](https://ngrok.com)                 | Latest        |

---

## 🚀 Instalasi & Setup

### 1. Clone Repository

```bash
git clone https://github.com/Rahadian2711/eventres-laravel.git
cd melodia
```

### 2. Install Dependencies PHP

```bash
composer install
```

### 3. Salin File Environment

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Buat Database

Buka **phpMyAdmin** atau MySQL CLI, lalu buat database baru:

```sql
CREATE DATABASE eventres_laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Konfigurasi File `.env`

Edit file `.env` sesuai pengaturan lokal kamu (lihat bagian [Konfigurasi Environment](#-konfigurasi-environment)).

### 7. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 8. Jalankan Seeder

```bash
php artisan db:seed
```

> Seeder akan mengisi data: kategori, artis + lagu populer, event + jadwal + tiket, dan relasi artis-event.

### 9. Buat Storage Link

```bash
php artisan storage:link
```

> Perintah ini membuat symlink `public/storage` → `storage/app/public` agar gambar bisa diakses via browser.

### 10. Install Dependencies Frontend

```bash
npm install
```

### 11. Build Assets

Untuk development (dengan hot reload):

```bash
npm run dev
```

Untuk production:

```bash
npm run build
```

---

## ⚙️ Konfigurasi Environment

Buka file `.env` dan sesuaikan nilai berikut:

```env
# Nama aplikasi
APP_NAME=Melodia
APP_ENV=local
APP_DEBUG=true

# URL aplikasi — ganti dengan URL ngrok kamu saat testing payment
APP_URL=http://localhost:8000

# Database MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eventres_laravel
DB_USERNAME=root
DB_PASSWORD=           # kosongkan jika Laragon tanpa password

# Midtrans
MIDTRANS_SERVER_KEY=Mid-server-xxxxxxxxxxxxxxxx
MIDTRANS_CLIENT_KEY=Mid-client-xxxxxxxxxxxxxxxx
MIDTRANS_IS_PRODUCTION=false    # ganti true jika sudah production
MIDTRANS_IS_SANITIZED=true
MIDTRANS_IS_3DS=true
```

---

## 💳 Konfigurasi Midtrans

### Langkah 1 — Daftar / Login Midtrans Sandbox

Buka [https://sandbox.midtrans.com](https://sandbox.midtrans.com) dan login atau daftar akun.

### Langkah 2 — Ambil API Keys

1. Masuk ke **Settings → Access Keys**
2. Salin **Server Key** dan **Client Key**
3. Tempel ke `.env`:

```env
MIDTRANS_SERVER_KEY=Mid-server-xxxxxxxxxxxxxxxx
MIDTRANS_CLIENT_KEY=Mid-client-xxxxxxxxxxxxxxxx
```

### Langkah 3 — Set Payment Notification URL

Midtrans butuh URL publik untuk mengirim notifikasi status pembayaran. Karena kamu development lokal, gunakan **ngrok** (lihat bagian berikutnya).

1. Masuk ke **Settings → Configuration**
2. Isi **Payment Notification URL** dengan:

```
https://your-ngrok-url.ngrok-free.app/midtrans/notification
```

---

## 🌐 Konfigurasi Ngrok

Ngrok digunakan agar Midtrans bisa mengirim webhook ke localhost kamu.

### Langkah 1 — Install & Login Ngrok

1. Download Ngrok di [https://ngrok.com/download](https://ngrok.com/download)
2. Daftar akun gratis di [https://ngrok.com](https://ngrok.com)
3. Hubungkan authtoken:

```bash
ngrok config add-authtoken YOUR_AUTHTOKEN
```

### Langkah 2 — Jalankan Ngrok

Pastikan Laravel sudah berjalan di port 8000, lalu di terminal baru:

```bash
ngrok http 8000
```

Output akan menampilkan URL seperti:

```
Forwarding   https://untrained-bulldog-empirical.ngrok-free.app → http://localhost:8000
```

### Langkah 3 — Update APP_URL di `.env`

```env
APP_URL=https://untrained-bulldog-empirical.ngrok-free.app
```

Setelah update `.env`, jalankan:

```bash
php artisan config:clear
```

### Langkah 4 — Update Notification URL di Midtrans

Masuk ke Midtrans Sandbox → **Settings → Configuration**, update:

```
Payment Notification URL: https://your-ngrok-url.ngrok-free.app/midtrans/notification
```

> ⚠️ **Penting:** URL ngrok berubah setiap kali kamu restart ngrok (kecuali pakai domain statis berbayar). Ulangi Langkah 3 dan 4 setiap kali URL berubah.

### Langkah 5 — Izinkan Header Ngrok di Laravel

Tambahkan ini di `bootstrap/app.php` atau `AppServiceProvider` jika muncul error CSRF/trusted proxy:

```php
// bootstrap/app.php
->withMiddleware(function (Middleware $middleware) {
    $middleware->trustProxies(at: '*');
})
```

---

## ▶️ Menjalankan Aplikasi

### Cara 1 — Jalankan Semua Sekaligus (Recommended)

```bash
composer run dev
```

Perintah ini menjalankan secara bersamaan:

- `php artisan serve` — Laravel server di port 8000
- `php artisan queue:listen` — Queue worker untuk background jobs
- `php artisan pail` — Log viewer real-time
- `npm run dev` — Vite dev server dengan hot reload

### Cara 2 — Manual (Terminal Terpisah)

**Terminal 1** — Laravel server:

```bash
php artisan serve
```

**Terminal 2** — Queue worker (wajib untuk notifikasi Midtrans):

```bash
php artisan queue:listen --tries=1 --timeout=0
```

**Terminal 3** — Vite dev server:

```bash
npm run dev
```

**Terminal 4** — Ngrok:

```bash
ngrok http 8000
```

Buka browser di: **http://localhost:8000**

---

## 🗺 Struktur Route

| Method | URL                           | Nama Route              | Deskripsi                      |
| ------ | ----------------------------- | ----------------------- | ------------------------------ |
| GET    | `/`                           | `home`                  | Halaman beranda                |
| GET    | `/artis`                      | `artists.index`         | Daftar semua artis             |
| GET    | `/artis/{slug}`               | `artists.show`          | Detail artis                   |
| GET    | `/konser`                     | `concerts.index`        | Daftar semua konser            |
| GET    | `/events/{slug}`              | `events.show`           | Detail event                   |
| GET    | `/tentang-kami`               | `about`                 | Halaman tentang kami           |
| POST   | `/orders`                     | `orders.store`          | Buat order baru                |
| GET    | `/payment/{order}`            | `payment.show`          | Halaman pembayaran             |
| POST   | `/payment/{order}/charge`     | `payment.charge`        | Proses pembayaran _(auth)_     |
| GET    | `/payment/{order}/status`     | `payment.status`        | Cek status pembayaran _(auth)_ |
| POST   | `/midtrans/notification`      | `midtrans.notification` | Webhook Midtrans               |
| GET    | `/profil`                     | `profile.show`          | Profil pengguna _(auth)_       |
| POST   | `/profil/update`              | `profile.update`        | Update profil _(auth)_         |
| POST   | `/profil/password`            | `profile.password`      | Update password _(auth)_       |
| GET    | `/tiket-saya`                 | `tickets.index`         | Daftar tiket _(auth)_          |
| GET    | `/tiket-saya/{ticket}`        | `tickets.show`          | Detail tiket _(auth)_          |
| GET    | `/riwayat-pembayaran`         | `history.index`         | Riwayat pembayaran _(auth)_    |
| GET    | `/riwayat-pembayaran/{order}` | `history.show`          | Detail transaksi _(auth)_      |

---

## 🗄 Struktur Database

| Tabel               | Deskripsi                                    |
| ------------------- | -------------------------------------------- |
| `users`             | Data pengguna (dari Breeze)                  |
| `categories`        | Kategori event (Konser, Festival, Tur)       |
| `artists`           | Data artis                                   |
| `artist_songs`      | Lagu populer tiap artis                      |
| `artist_event`      | Pivot relasi artis ↔ event                   |
| `events`            | Data event/konser                            |
| `event_schedules`   | Jadwal event (tanggal & waktu)               |
| `event_tags`        | Tag event                                    |
| `ticket_categories` | Kategori tiket per event (Regular, VIP, dll) |
| `orders`            | Data pesanan                                 |
| `tickets`           | Tiket yang diterbitkan                       |
| `reservations`      | Reservasi sementara                          |
| `payments`          | Data pembayaran                              |

---

## 👤 Akun Default Setelah Seeder

Seeder tidak membuat akun user otomatis. Daftar melalui halaman `/register`.

---

## 📁 Struktur Penyimpanan Gambar

```
storage/app/public/
├── artists/          # Foto artis (format: {slug}.jpg)
├── avatars/          # Avatar pengguna
├── thumbnail/        # Thumbnail event
└── banner/           # Banner event
```

Akses via URL: `https://your-url/storage/artists/noah.jpg`

---

## 🐛 Troubleshooting

**Gambar tidak muncul:**

```bash
php artisan storage:link --force
```

**Error 419 (CSRF) saat pakai ngrok:**
Tambahkan di `bootstrap/app.php`:

```php
$middleware->trustProxies(at: '*');
```

**Notifikasi Midtrans tidak masuk:**

- Pastikan queue worker berjalan (`php artisan queue:listen`)
- Pastikan URL ngrok di Midtrans Dashboard sudah diupdate
- Cek log: `php artisan pail`

**Error "View not found":**
Pastikan semua file blade disimpan dengan ekstensi `.blade.php` di folder `resources/views/`.

**Port 8000 sudah dipakai:**

```bash
php artisan serve --port=8001
ngrok http 8001
```

---

## 📝 Lisensi

Project ini dibuat untuk keperluan akademis / portofolio.
