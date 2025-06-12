<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h1 align="center">Management Barang (Ujian Mid)</h1>

<p align="center">
  Aplikasi manajemen barang berbasis Laravel.
</p>

---

## 🚀 Fitur

- CRUD Barang dan Kategori
- Manajemen Stok
- Laporan Transaksi
- Antarmuka Bootstrap 5

## 🛠 Teknologi

- Laravel 10.x
- PHP 8.x
- MySQL
- Bootstrap 5

## ⚙ Instalasi

```bash
git clone https://github.com/listiana-code/project-cey.git
cd project-cey
composer install
cp .env.example .env
php artisan key:generate
# Atur database di .env
php artisan migrate
php artisan serve
