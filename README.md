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

## Dokumen Rujukan
Berikut adalah tabel yang menampilkan dokumen yang menjadi rujukan dalam penulisan dokumen:

| No  | Dokumen ID             | Dokumen                               | Keterangan                                                                              |
|-----|------------------------|---------------------------------------|----------------------------------------------------------------------------------------|
| [1] | ToR-PSI-22-03         | Term of Reference                     | Dokumen ini menjelaskan latar belakang, tujuan, topik, requirement (kebutuhan), hasil, pendekatan yang akan dipakai, serta ruang lingkup dari proyek yang akan menjadi bahan acuan selama pengerjaan. |
| [2] | PIP-PSI-22-03         | Project Implementation Plan           | Dokumen ini adalah perencanaan pembangunan website Forum Mahasiswa IT Del yang menjadi langkah awal dalam pengerjaan proyek. |
| [3] | URS-PSI-22-03         | User Requirement Specification         | Dokumen ini merinci kebutuhan pengguna untuk proyek Sistem Informasi Toko Obat Las Roha di Balige. |
| [4] | SyRS-PSI-22-03        | System Requirement Specification        | Dokumen yang menguraikan kebutuhan sistem, gambaran sistem yang akan dibangun, serta fungsi-fungsi yang akan digunakan dalam sistem. |
| [5] | SDD-PSI-22-01         | Software Design Document              | Dokumen ini mendeskripsikan gambaran dan desain dari perangkat lunak yang akan dibuat. |

## Installation Guide
1. Clone atau download code
    - Pada terminal `git clone https://github.com/san-limbong/Sistem-Informasi-Toko-Obat-Las-Roha.git`
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
