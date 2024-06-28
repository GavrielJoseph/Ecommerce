# Gilgal Makmur - Website Jual Beli Handphone dan Accessories 

## Kelompok 12

- Marcia Yanprincessa Utama (535220044)
- Gavriel Joseph Lim (535220049)

## Pendahuluan 
Gilgal Makmur merupakan toko jual beli handphone dan accessories yang berlokasi di Jl. Mangga Dua Raya Jakarta. Website ini akan mengintegrasikan beberapa fitur penting yang bertujuan untuk memberikan solusi praktis bagi para penjual dan pembeli handphone dan aksesoris agar dengan mudah melakukan transaksi jual beli online. Dengan demikian, Toko Gilgal Makmur bisa bersaing lebih baik dalam pasar, memperluas jangkauan penjualan, dan meningkatkan pendapatan melalui peningkatan aksesibilitas produk dan layanan secara digital.

## Memulai Program 
### Install 
- [Visual Studio Code](https://code.visualstudio.com/) atau lainnya
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [PostgreSQL](https://www.postgresql.org/)
- [XAMPP](https://www.apachefriends.org/index.html)

### Eksekusi 
1. Clone repositori ini:
   ```bash
   git clone https://github.com/GavrielJoseph/Ecommerce.git
2. Masuk ke direktori proyek:
   ```bash
   cd EcommerceWeb
3. Salin file .env.example menjadi .env:
    ```bash
   cp .env.example .env
4. Edit file .env dan sesuaikan konfigurasi database Anda, khususnya DB_PASSWORD dengan password database PostgreSQL Anda:
    ```bash
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=nama_database_anda
    DB_USERNAME=nama_pengguna_anda
    DB_PASSWORD=password_anda
5. Buat database dan password PostgreSQL sesuai dengan nama database yang ada di file .env.
6. Instal dependensi PHP dengan Composer:
   ```bash
   composer install
7. Instal dependensi JavaScript dengan npm:
   ```bash
   npm install
8. Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan:
   ```bash
   php artisan migrate:fresh
9. Jalankan seeder untuk mengisi database dengan data awal:
    ```bash
   php artisan db:seed

### Menjalankan Aplikasi 
Jalankan dua perintah berikut di terminal yang berbeda untuk memulai aplikasi:
1. Menjalankan npm run dev di terminal baru:
   ```bash
   cd EcommerceWeb (di terminal baru lalu)
   npm run dev
2. Menjalankan server aplikasi Laravel:
   ```bash
   php artisan serve

### Akun Admin 
Gunakan akun admin ini untuk kredensial dalam mengakses fitur-fitur admin:
- Email: admin@gmail.com
- Password: 43214321


