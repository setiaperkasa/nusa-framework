# Nusa PHP Framework

Nusa adalah framework PHP ringan yang dirancang untuk membangun aplikasi web dengan cepat dan aman. Framework ini berfokus pada kesederhanaan, fleksibilitas, dan keamanan.

## 📦 Instalasi

Pastikan Anda memiliki Composer terinstal, lalu jalankan perintah berikut untuk menginstal proyek baru:

```bash
composer create-project nusa/framework myapp
cd myapp
```

## 🚀 Fitur Utama

- **Routing sederhana** dengan `Router.php`
- **Model ORM ringan** dengan `Model.php`
- **Dukungan Middleware** untuk proteksi aplikasi
- **CLI `nusa` untuk generate model & controller**
- **Struktur kode modular dan mudah dikembangkan**

## 🔧 Cara Menggunakan

### 1️⃣ Jalankan Server PHP

```bash
php -S localhost:8000 -t public
```

Lalu buka browser dan akses:
```
http://localhost:8000/
```

### 2️⃣ Buat Controller Baru

Gunakan CLI `nusa` untuk membuat controller:

```bash
php bin/nusa make:controller UserController
```

### 3️⃣ Buat Model Baru

```bash
php bin/nusa make:model User
```

### 4️⃣ Konfigurasi Database

Buka file `.env.example`, lalu duplikasi dan ubah namanya menjadi `.env`. Kemudian, sesuaikan informasi database Anda:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nusa
DB_USERNAME=root
DB_PASSWORD=
```

### 5️⃣ Gunakan Middleware

Tambahkan middleware ke route agar bisa mengontrol akses:

```php
Router::middleware('AuthMiddleware')->get('/dashboard', function() {
    echo "✅ Selamat datang di Dashboard!";
});
```

## 📜 Struktur Direktori

```
nusa-framework/
│── bin/                  # CLI framework
│   ├── nusa
│── config/               # Konfigurasi framework
│   ├── database.php
│── src/                  # Inti framework
│   ├── Nusa/
│       ├── Core/
│       │   ├── Controller.php
│       │   ├── Database.php
│       │   ├── Middleware.php
│       │   ├── Model.php
│       │   ├── Router.php
│── storage/               # Penyimpanan log dan file sementara
│── tests/                 # Unit testing
│── vendor/                # Composer dependencies
│── composer.json          # Konfigurasi Composer
│── README.md              # Dokumentasi
```

## 🛠 Perintah CLI yang Tersedia

```
php bin/nusa make:controller NamaController  # Membuat controller baru
php bin/nusa make:model NamaModel            # Membuat model baru
```

## 📢 Kontribusi

Silakan buat **Pull Request** atau laporkan **Issue** jika menemukan bug atau ingin memberikan saran pengembangan.

## 📄 Lisensi

Framework ini dirilis di bawah lisensi **MIT**.

---
📌 **Dibuat dengan ❤️ oleh Tim Rumi Setia Aplikasi**

