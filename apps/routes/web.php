<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RencanaControlller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DraftbarangController;
use App\Http\Controllers\KelolapesananController;
use App\Http\Controllers\ManageAccountController;
use App\Http\Controllers\PengadaanbarangController;
use App\Http\Controllers\MengelolahDataObatController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function () {
    // Login and Logout
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

    // REGISTER
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/myprofile', [ProfileController::class, 'index']);
    Route::get('/myprofile/edit/{id}', [ProfileController::class, 'edit']);
    Route::put('/myprofile/ubah/{id}', [ProfileController::class, 'update']);
    Route::middleware(['checkRole:admin'])->group(function () {
        // ADD EMPLOYEE
        Route::get('/profile/list', [ManageAccountController::class, 'index']);
        Route::get('/profile/create', [ManageAccountController::class, 'create']);
        Route::post('/profile/create', [ManageAccountController::class, 'store']);
        Route::get('/profile/ubah/{id}', [ManageAccountController::class, 'edit']);
        Route::put('/profile/update/{id}', [ManageAccountController::class, 'update']);
        Route::get('/profile/hapus/{id}', [ManageAccountController::class, 'destroy']);

        // Route::get('/profile/list{id?}',[MengelolahDataObatController::class,'delete']);
    });

    Route::middleware(['checkRole:karyawan'])->group(function () {
        //Kelolapesanan

        Route::get('/receipt/{id}', [KelolapesananController::class, 'invoice']);
        Route::get('/datapesanan/trashbin', [KelolapesananController::class, 'keranjangsampah']);
        Route::get('/datapesanan/trashbin/pulihkan/{id}', [KelolapesananController::class, 'restore']);
        Route::get('/datapesanan/trashbin/delete/{id}', [KelolapesananController::class, 'destroy']);
        Route::get('/datapesanan/trashbin/pulihkansemua', [KelolapesananController::class, 'pulihkan']);
        Route::get('/datapesanan', [KelolapesananController::class, 'index']);
        Route::get('/datapesanan/{id}', [KelolapesananController::class, 'show']);
        Route::get('/datapesanan/ubah/{id}', [KelolapesananController::class, 'edit']);
        Route::put('/datapesanan/ubahpesanan/{id}', [KelolapesananController::class, 'update']);
        Route::get('/datapesanan/remove/{id}', [KelolapesananController::class, 'remove']);
    });

    Route::middleware(['checkRole:admin,karyawan'])->group(function () {
        Route::get('/profile/roles', function () {
            return view('pengelolatoko.manage_account.roles');
        });

        Route::get('/dashboard', [DashboardController::class, 'index']);

        // Vendor
        Route::get('/vendor', [VendorController::class, 'index']);

        //MENGELOLA DATA BARANG
        Route::get('/databarang', [MengelolahDataObatController::class, 'index']);
        Route::get('/databarang/show', [MengelolahDataObatController::class, 'show']);
        Route::get('/databarang/create', [MengelolahDataObatController::class, 'create']);
        Route::post('/databarang/create', [MengelolahDataObatController::class, 'store']);
        Route::get('/databarang/delete/{id}', [MengelolahDataObatController::class, 'delete']);
        Route::get('/edit-barang/{id}', [MengelolahDataObatController::class, 'edit'])->name('edit-barang');
        Route::put('/update-barang/{id}', [MengelolahDataObatController::class, 'update'])->name('update-barang');

        Route::get('/databarang/delete2/{id}', [MengelolahDataObatController::class, 'delete2']);
        Route::get('/databarang/trash', [MengelolahDataObatController::class, 'trash']);
        Route::get('/databarang/restore/{id?}', [MengelolahDataObatController::class, 'restore']);
        Route::get('/databarang/trash/detele/{id?}', [MengelolahDataObatController::class, 'deletetrash']);

        Route::get('/databarang/pengadaaan/{id}', [MengelolahDataObatController::class, 'pengadaan']);
        Route::get('/databarang/daftarrencanapengadaan', [MengelolahDataObatController::class, 'daftarrencanapengadaan']);

        //MENGELOLA KATEGORI
        Route::get('/databarang/kategori', [MengelolahDataObatController::class, 'indexkategori']);
        Route::get('/databarang/kategori/create', [MengelolahDataObatController::class, 'indexkategoricreate']);
        Route::post('/databarang/kategori/create', [MengelolahDataObatController::class, 'indexkategoristore']);
        Route::get('/databarang/kategori/detele/{id?}', [MengelolahDataObatController::class, 'deletekategori']);
        Route::get('/edit-kategori/{id}', [MengelolahDataObatController::class, 'editkategori'])->name('edit-kategori');
        Route::put('/update-kategori/{id}', [MengelolahDataObatController::class, 'updatekategori'])->name('update-kategori');


        // Pengadaan Barang
        Route::get('/pengadaanbarang', [PengadaanbarangController::class, 'index']);
        Route::get('/pengadaanbarang/item/{id}', [PengadaanbarangController::class, 'show']);
        Route::get('/pengadaanbarang/tambah', [PengadaanbarangController::class, 'create']);
        Route::post('/pengadaanbarang/store', [PengadaanbarangController::class, 'store']);
        Route::get('/pengadaanbarang/review/{id}', [PengadaanbarangController::class, 'edit']);
        Route::put('/pengadaanbarang/update/{id}', [PengadaanbarangController::class, 'update']);
        Route::delete('/pengadaanbarang/hapus/{id}', [PengadaanbarangController::class, 'destroy']);

        //Perencanaan Barang
        Route::get('/rencanapengadaan', [RencanaControlller::class, 'index']);
        Route::get('/edit-rencana/{id}', [RencanaControlller::class, 'edit'])->name('edit-rencana');
        Route::put('/update-rencana/{id}', [RencanaControlller::class, 'update'])->name('update-rencana');
        Route::get('/outofstock', [RencanaControlller::class, 'outofstock']);

        // Draft Barang
        Route::get('/draftbarang', [DraftbarangController::class, 'index']);
        Route::get('/draftbarang/tambah', [DraftbarangController::class, 'create']);
        Route::post('/draftbarang/store', [DraftbarangController::class, 'store']);
        Route::get('/draftbarang/lihat/{id}', [DraftbarangController::class, 'show']);
        Route::delete('/draftbarang/hapus/{id}', [DraftbarangController::class, 'destroy']);
    });
});



// Layanan
Route::get('/layanan', [CartController::class, 'index']);
Route::get('/daftarharga', [LayananController::class, 'daftarharga']);

Route::middleware(['checkRole:pembeli'])->group(function () {
    Route::get('/riwayatpemesanan', [LayananController::class, 'index']);
    Route::get('/detailriwayat/{id}', [LayananController::class, 'show']);
    Route::get('/unduhriwayat/{id}', [LayananController::class, 'riwayat']);
    Route::get('/invoice/{id}', [CartController::class, 'invoice']);
    Route::get('/cart', [CartController::class, 'cart']);
    Route::get('/cart/tambah/{id}', [CartController::class, 'addtocart']);
    Route::post('/cart/update/{id}', [CartController::class, 'update']);
    Route::get('/cart/hapus/{id}', [CartController::class, 'remove']);
    Route::get('/cart/kosongkancart', [CartController::class, 'destroy']);
    Route::post('/cart/checkout', [CartController::class, 'checkout']);
});

// Welcome
Route::get('/', function () {
    return view('welcome.index');
});

// Logout
Route::get('/logout', [LoginController::class, 'logout']);
