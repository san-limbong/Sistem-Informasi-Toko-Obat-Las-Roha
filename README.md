# PSI-2022-03 Sistem Informasi Toko Obat Las Roha (SILAS)
Please read [RULES.md](RULES.md).

## General Discription
Sistem Informasi Toko Obat Las Roha merupakan sistem informasi berbasis web, Toko Obat Las Roha merupakan salah satu toko yang menjual berbagai macam jenis obat ataupun barang non-medis. Dalam melakukan transaksinya, Toko Obat Las Roha masih menggunakan cara manual yaitu dengan mencatat setiap transaksi yang dilakukan kedalam buku besar. Untuk membuat laporan penjualan dan pembelian karyawan harus menjumlah setiap transaksi yang dilakukan perbulannya dan mengarsipkan faktur-faktur pembelian, jika ada kesalahan dalam pencatatan maka akan menjadi kendala bagi pihak toko obat untuk mendapatkan informasi yang akurat. Tujuan dari pengembangan ini adalah untuk menghasilkan sistem informasi penjualan dan pembelian obat di Toko Obat Las Roha di Balige. Sistem informasi ini dapat memudahkan karyawan dalam mengolah data obat, data penjualan dan data pembelian serta memberikan informasi penjualan kepada konsumen. Untuk menghasilkan sistem informasi penjualan dan pembelian ini menggunakan metode penelitian R&D dan dihasilkan sebuah sistem informasi berbasis web yang digunakan oleh tiga user yaitu pemilik usaha, customer dan karyawan dimana sistem tersebut mempunyai tampilan interface berupa form login, form data obat, form data penjualan, form laporan penjualan, pembelian, dan stok obat dan hasil pengujian sistem ini menggunakan blackbox testing.

## Features
Fitur pada Aplikasi ini meliputi:

1. Login
    - Login dan Logout User
2. Register
3. Mengelola Barang
    - Perencanaan Pengadaan Barang
    - Pengadaan Barang
    - Penerimaan Barang
    - Penyimpanan Barang
4. Penjualan
    - Melakukan Pemesanan
    - Mengelola Pemesanan
6. Mengelola Akun Karyawan

## Architectural Design

## Database Design

## Installation Guide
1. Clone atau download code
    - Pada terminal, clone repo `git clone git@github.com:proyek-mahasiswa/psi-22-03-silas.git`
    - atau `git clone https://github.com/proyek-mahasiswa/psi-22-03-silas.git`
    - Jika tidak menggunakan Git, silakan **Download Zip** dan *extract* 
2. `cd apps`
3. `composer install` dan `composer update`
4. `cp .env.example .env`
    - Jika tidak menggunakan Git, bisa rename file `.env.example` menjadi `.env`
5. Pada terminal `php artisan key:generate`
6. Buat **database pada mariadb** untuk aplikasi ini
7. **Setting database** pada file `.env`
8. `php artisan migrate --seed`
9. `php artisan serve`
10. Selesai

### Minimum Hardware Requirements
+ RAM       :   8.00 GB
+ Processor :   Intel(R)Core(TM)i5

### Minimum Software Requirements
+ VS Code   :   1.64.0
+ PHP       :   8.0.xx    
+ Heidi SQL :   11.3.0.6371 (32 Bit)

# Contributors
+ 12S1S013 - Agnes Sagita Lumbantobing (@agnessagita)
+ 12S19028 - Anju Ucok Lubis (@anjuucoklubis)
+ 12S19033 - San Antonio Limbong (@san-limbong)
+ 12S19035 - Nixon Daniel Hutahaean (@Xedonedron)
+ 12S19040 - Abel Maylio Yosevino Tampubolon (@AbelTampubolon)
# Sistem-Informasi-Toko-Obat-Las-Roha
