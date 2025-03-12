# 📌 Nusa Framework

**Nusa** adalah framework PHP ringan yang dirancang untuk keamanan tinggi dan kemudahan penggunaan. Framework ini memiliki fitur bawaan seperti **middleware**, **router**, **templating**, dan **ORM sederhana**, serta mendukung pengembangan **REST API** dengan arsitektur yang fleksibel.

## 🚀 Fitur Utama

✅ **Routing Dinamis** - Mendukung metode GET dan POST dengan parameter dinamis.  
✅ **Middleware System** - Proteksi akses dengan Authentication dan CSRF Middleware.  
✅ **Template Engine** - Load halaman dengan sistem template yang rapi.  
✅ **Database ORM Sederhana** - Koneksi ke MySQL/PostgreSQL dengan model ringan.  
✅ **CLI Generator** - Generate controller, model, dan migration dengan mudah.  
✅ **Keamanan Tinggi** - Proteksi dari IDOR, SQL Injection, dan XSS.  

## 📁 Struktur Folder
```
nusa-framework/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   ├── Models/
│   ├── Views/
├── core/
│   ├── Router.php
│   ├── Middleware.php
│   ├── Controller.php
├── config/
├── routes/
│   ├── web.php
├── public/
│   ├── index.php
├── storage/
│   ├── logs/
├── tests/
├── vendor/
├── bootstrap.php
├── composer.json
├── .env
├── .gitignore
├── README.md
```

## ⚙️ Instalasi & Setup
### 1️⃣ **Clone Repository**
```bash
git clone https://github.com/setiaperkasa/nusa-framework.git
cd nusa-framework
```
### 2️⃣ **Install Dependency**
```bash
composer install
```
### 3️⃣ **Jalankan Server**
```bash
php -S localhost:8000 -t public
```
Akses di browser:
```
http://localhost:8000/
```

## 🏗️ Penggunaan Dasar
### 📌 1. **Menambahkan Route**
Edit `routes/web.php`:
```php
use Nusa\Core\Router;

Router::get('/', 'HomeController@index');
Router::middleware('AuthMiddleware')->get('/dashboard', function() {
    echo "Selamat datang di Dashboard!";
});
```

### 📌 2. **Membuat Controller Baru**
Buat file di `app/Http/Controllers/ExampleController.php`:
```php
<?php

namespace App\Http\Controllers;

use Nusa\Core\Controller;

class ExampleController extends Controller {
    public function index() {
        echo "Halo, ini contoh controller!";
    }
}
```
Tambahkan route:
```php
Router::get('/example', 'ExampleController@index');
```
Akses di browser: `http://localhost:8000/example`

### 📌 3. **Menambahkan Middleware**
Buat file `app/Http/Middleware/ExampleMiddleware.php`:
```php
<?php

namespace App\Http\Middleware;

class ExampleMiddleware {
    public function handle($next) {
        echo "Middleware dijalankan!";
        return $next();
    }
}
```
Tambahkan middleware ke route:
```php
Router::middleware('ExampleMiddleware')->get('/protected', function() {
    echo "Halaman ini dilindungi middleware.";
});
```

## 🌎 Kontribusi
1. **Fork repo ini.**
2. **Buat branch baru.**
3. **Commit perubahan dan push ke GitHub.**
4. **Buat pull request.**

## 📝 Lisensi
Framework ini menggunakan **MIT License**, artinya bebas digunakan, dimodifikasi, dan dikembangkan.

---
📌 **Dibuat dengan ❤️ oleh Tim Rumi Setia Aplikasi**

