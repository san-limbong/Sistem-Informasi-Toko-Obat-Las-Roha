<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Karyawan;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // User
        User::create([
            'email'=>'admin@admin.com',
            'password'=> bcrypt('admin'),
            'namalengkap'=>'Admin',
            'role'=>1,
        ]); 

        User::create([
            'email'=>'karyawan@karyawan.com',
            'password'=> bcrypt('karyawan'),
            'namalengkap'=>'Karyawan',
            'role'=>2,
        ]); 

        User::create([
            'email'=>'anggota@anggota.com',
            'password'=> bcrypt('anggota'),
            'namalengkap'=>'Anggota',
            'role'=>2,
        ]); 

        User::create([
            'email'=>'pembeli@pembeli.com',
            'password'=> bcrypt('pembeli'),
            'namalengkap'=>'Pembeli',
            'notelp'=>'08350061000',
            'alamat'=>'Balige',
            'role'=>3,
        ]); 

        User::create([
            'email'=>'pengunjung@pengunjung.com',
            'password'=> bcrypt('pengunjung'),
            'namalengkap'=>'Pengunjung',
            'notelp'=>'08450062000',
            'alamat'=>'Balige',
            'role'=>3,
        ]); 

          // CATEGORY
        Category::create([
            'name'=>'Obat Bebas Terbatas',
            'deskripsi' =>'Obat bebas terbatas adalah obat yang dapat dibeli bebas tanpa resep dokter di toko obat berizin. 
            Obat bebas terbatas digunakan untuk mengobati penyakit ringan yang dapat dikenali oleh penderita sendiri. 
            ada dasarnya, obat bebas terbatas merupakan obat keras.
            '
        ]);
        Category::create([
            'name'=>'Obat Bebas',
            'deskripsi' =>'Obat bebas adalah obat yang dapat dijual bebas kepada umum tanpa resep dokter, tidak termasuk dalam daftar narkotika, psikotropika, obat keras, obat bebas terbatas dan sudah terdaftar di Depkes RI. Obat bebas merupakan yang paling aman dikonsumsi.'
        ]);
        Category::create([
            'name'=>'Obat Herbal',
            'deskripsi'=>'Obat herbal adalah obat yang diramu dari tanaman-tanaman tradisonal berkhasiat yang digunakan untuk pengobatan penyakit-penyakit tertentu.'
        ]); 
        Category::create([
            'name'=>'Alat Medis',
            'deskripsi'=>'Sarana dan prasarana pendukung pelayanan perawatan dan pengobatan di rumah dan di rumah sakit.'
        ]);
        Category::create([
            'name'=>'Peralatan Bayi',
            'deskripsi' =>'Keperluan yang dibutuhkan bayi.'
        ]); 
        Category::create([
            'name'=>'Obat Keras',
            'deskripsi' =>'  Obat Keras adalah obat yang hanya boleh dibeli menggunakan resep dokter.'
        ]); 
        Category::create([
            'name'=>'Vitamin & Nutrisi',
            'deskripsi' =>' Vitamin adalah nutrisi tambahan yang diperlukan bagi tubuh untuk bisa menunjang kinerja tubuh.'
        ]); 
      

        // Barang
        Barang::create([
            'category_id' => '2',
            'name' => 'Paracetamol',
            'merek' => 'Hufagesic',
            'stok' => '10',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2026-06-17',
            'harga' =>'10000',
            'gambar' =>'paracetamol.jpg',
            'deskripsi' =>'Parasetamol atau asetaminofen adalah obat analgesik dan antipiretik yang banyak dipakai untuk meredakan sakit kepala ringan akut, nyeri ringan hingga sedang, serta demam.',
            'vendor'=>'PT. Insoclay Acidatama Indonesia',     
        ]);
        Barang::create([
            'category_id' => '2',
            'name' => 'Amoxicillin 500 mg',
            'merek' => 'Penisilin',
            'stok' => '10',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2026-10-01',
            'harga' =>'8000',
            'gambar' =>'amoxicillin.jpg',
            'deskripsi' =>'Amoxicillin merupakan antibiotik yang digunakan dalam pengobatan berbagai infeksi bakteri.',
            'vendor'=>'PT. Hexpharm Jaya Laboratories',     
        ]);
        Barang::create([
            'category_id' => '3',
            'name' => 'Suntik Medis',
            'merek' => 'Disposable Syringe (10ml)',
            'stok' => '200',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2023-10-01',
            'harga' =>'3000',
            'gambar' =>'suntik.jpg',
            'deskripsi' =>'Penyuntikan adalah tindakan memasukkan sebuah cairan, khususnya obat, ke tubuh seseorang memakai sebuah jarum dan alat suntik',
            'vendor'=>'PT. Hexpharm Jaya Laboratories',     
        ]);
        Barang::create([
            'category_id' => '4',
            'name' => 'Pempres',
            'merek' => 'MamyPoko Pants',
            'stok' => '150',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2025-10-01',
            'harga' =>'45000',
            'gambar' =>'pempres.jpg',
            'deskripsi' =>'Popok sekali pakai dibuat dari kertas, plastik, gel penyeram, serta sodium polyacrylate.',
            'vendor'=>'PT. Cakra Wiraniaga Indonesia',     
        ]);
        Barang::create([
            'category_id' => '6',
            'name' => 'Acetylcysteine 200 mg',
            'merek' => 'Etercon',
            'stok' => '150',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2025-10-02',
            'harga' =>'45000',
            'gambar' =>'acetylcysteine.jpg',
            'deskripsi' =>'Popok sekali pakai dibuat dari kertas, plastik, gel penyeram, serta sodium polyacrylate.',
            'vendor'=>'PT. Nulah Pharmaceutical Indonesia',     
        ]);
        Barang::create([
            'category_id' => '6',
            'name' => 'Piracetam 800 mg',
            'merek' => 'Piracetam',
            'stok' => '60',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2025-10-02',
            'harga' =>'6000',
            'gambar' =>'piracetam.jpg',
            'deskripsi' =>'PIRACETAM 800 mg merupakan obat generik neurotropic yang efektif untuk penderita gangguan fungsi kognitif, disleksia, vertigo dan cedera pada kepala. Obat ini bekerja dengan melindungi sel-sel otak dari kerusakan, terutama akibat dari kekurangan oksigen.',
            'vendor'=>'PT. Dankos Farma',     
        ]);

        Barang::create([

            'category_id' => '7',
            'name' => 'Blackmores vitamin A 5000',
            'merek' => 'Blackmores',
            'stok' => '150',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2025-10-02',
            'harga' =>'130000',
            'gambar' =>'blackmores_vitamina.jpg',
            'deskripsi' =>'Vitamin A penting untuk penglihatan (terutama night vision), fungsi kulit yang sehat dan perbaikan, untuk pemeliharaan selaput lendir yang sehat seperti lapisan pencernaan dan pernafasan saluran, dan untuk pemeliharaan sistem kekebalan tubuh yang sehat.',
            'vendor'=>'Blackmores',     
        ]);

        Barang::create([

            'category_id' => '7',
            'name' => 'Blackmores Vitamin C 500mg',
            'merek' => 'Blackmores',
            'stok' => '50',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2025-10-02',
            'harga' =>'118000',
            'gambar' =>'blackmores_vitaminc.jpg',
            'deskripsi' =>'Blackmores Vitamin C 500 merupakansiplemen mengandung Vitamin C yang diperlukan
            untuk memelihara kesehatan seluruh tubuh, menjaga daya tahan tubuh dari radikal
            bebas. Blackmores Vitamin C 500 tersedia dalam botol berisi 60 tablet.
            Manfaat',
            'vendor'=>'Blackmores',     
        ]);
     

        Barang::create([

            'category_id' => '7',
            'name' => 'Blackmores Vitamin E 500 ',
            'merek' => 'Blackmores',
            'stok' => '70',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2025-10-02',
            'harga' =>'231000',
            'gambar' =>'blackmores_vitamine.jpg',
            'deskripsi' =>'Blackmores Natural Vitamin E 500IU Suplemen Kesehatan [150 Capsules], suplemen yang membantu menjaga kesehatan jantung karena merupakan antioksidan dan pemulung radikal bebas. Ini memiliki sekitar dua kali bioavailabilitas vitamin E sintetis, yang berarti lebih mudah diserap ke dalam tubuh.',
            'vendor'=>'Blackmores',     
        ]);
        Barang::create([

            'category_id' => '7',
            'name' => 'Blackmores Multivitamin Immune ',
            'merek' => 'Blackmores',
            'stok' => '150',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2025-10-02',
            'harga' =>'200000',
            'gambar' =>'blackmores_multivitaminmmune.jpg',
            'deskripsi' =>'Blackmores Multivitamin + Immune adalah multivitamin lengkap untuk mendukung kesehatan sistem kekebalan tubuh, mengandung kombinasi vitamin C dan nutrisi penting. Dewasa: Diminum 1 tablet sehari setelah makan, atau sesuai resep dokter.',
            'vendor'=>'Blackmores',     
        ]);  
        Barang::create([
            'category_id' => '6',
            'name' => 'Betamethasone Valerate',
            'merek' => 'Etercon',
            'stok' => '150',
            'minimal_stok' => '15',
            'kadaluwarsa' =>'2025-10-02',
            'harga' =>'3000',
            'gambar' =>'betamethasone.jpg',
            'deskripsi' =>'Salep Kulit.',
            'vendor'=>'Kimia Farma',     
        ]);
        
    }
}
