<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;


class MengelolahDataObatController extends Controller
{
    public function index()
    {
        return view('pengelolatoko.mengelolabarang.index', [
            'active' => 'mengelolabarang',
            'title' => 'Mengelola Barang',
            'barang' => Barang::all(),
            'barangs' => Barang::all(),
            'categories' => Category::all(),
            "barang" => Barang::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }
    public function create()
    {
        return view('pengelolatoko.mengelolabarang.create', [
            'active' => 'mengelolabarang',
            'title' =>'Tambah Barang',
            'categories' => Category::all(),
            'barang' => Barang::all(),
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'merek' => 'required',
            'minimal_stok' => 'required',
            'category_id' => 'required',
            'kadaluwarsa' => 'required',
            'harga' => 'required',
            'vendor' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'images/products';
        $file->move($tujuanFile, $namaFile);

        $barang = new Barang;
        $barang->name = $request->name;
        $barang->merek = $request->merek;
        $barang->harga = $request->harga;
        $barang->vendor = $request->vendor;
        $barang->stok = $request->stok;
        $barang->minimal_stok = $request->minimal_stok;
        $barang->category_id = $request->category_id;
        $barang->kadaluwarsa = $request->kadaluwarsa;
        $barang->deskripsi = $request->deskripsi;
        $barang->gambar = $namaFile;
        $barang->save();
        return redirect('/databarang')->with('success', 'Barang Anda Berhasil Ditambahkan!');
    }
    public function show()
    {
        //
    }
    public function edit(Request $request, $id)
    {
        $bar = Barang::findorfail($id);
        return view('pengelolatoko.mengelolabarang.edit', compact('bar'), [
            'active' => 'mengelolabarang',
            'title' =>'Ubah Barang',
            'categories' => Category::all(),
        ]);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'merek' => 'required',
            'stok' => 'required',
            'minimal_stok' => 'required',
            'category_id' => 'required',
            'kadaluwarsa' => 'required',
            'harga' => 'required',
            'vendor' => 'required',
            'deskripsi' => 'required',
        
        ]);
        $barang = Barang::find($id);
        $barang->name = $request->input('name');
        $barang->merek = $request->input('merek');
        $barang->harga = $request->input('harga');
        $barang->vendor = $request->input('vendor');
        $barang->stok = $request->input('stok');
        $barang->minimal_stok = $request->input('minimal_stok');
        $barang->category_id = $request->input('category_id');
        $barang->kadaluwarsa = $request->input('kadaluwarsa');
        $barang->deskripsi = $request->input('deskripsi');
       
        
        $barang->save();
        return redirect('/databarang')->with('success', 'Barang Berhasil di Update!');
    }
    public function delete($id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect('/databarang')->with('success', 'Barang berhasil Dihapus sementara!');
    }
    public function delete2(Barang $barang, $id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect('/databarang')->with('success', 'Barang berhasil dihapus sementara!');
    }
    public function trash(Request $request)
    {
        if ($request->has('search')) {
            $barangs = Barang::where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('vendor', 'LIKE', '%' . $request->search . '%');
        } else {
            $barangs = Barang::all();
        }
        $barangs = Barang::onlyTrashed()->get();
        $barang = Barang::onlyTrashed()->get();
        return view(
            'pengelolatoko.mengelolabarang.restore',
            compact('barangs', 'barang'),
            [
                'active' => 'mengelolabarang',
                'title' =>'Keranjang Sampah',    
            ]
        );
    }
    public function restore($id = null)
    {
        if ($id != null) {
            $barangs = Barang::onlyTrashed()
                ->where('id', $id)
                ->restore();
        } else {
            $barangs = Barang::onlyTrashed()->restore();
        }
        return redirect('/databarang/trash')->with('success', 'Barang Berhasil di-restore!');
    }
    public function deletetrash($id = null)
    {
        if ($id != null) {
            $barangs = Barang::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            $barangs = Barang::onlyTrashed()->forceDelete();
        }  
        return redirect('/databarang/trash')->with('success', 'Barang Berhasil dihapus permanen!');
    }
    public function indexkategori()
    {
        return view('pengelolatoko.mengelolabarang.kategori.index', [
            'active' => 'mengelolacategory',
            'title' =>'Mengelola Kategori',
            'categories' => Category::all(),
            "categories" => Category::latest()->filter(request(['search']))->get()
        ]);
    }
    public function indexkategoricreate()
    {
        return view('pengelolatoko.mengelolabarang.kategori.create', [
            'title' =>'Tambah Kategori',
            'active' => 'mengelolacategory',
            'categories' => Category::all(),
        ]);
    }
    public function indexkategoristore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->deskripsi = $request->deskripsi;
        $category->save();
        return redirect('/databarang/kategori')->with('success', 'Kategori Berhasil Ditambahkan!');
    }
    public function deletekategori(Category $categories, $id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect('/databarang/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
    public function editkategori(Request $request, $id)
    {
        $kategori = Category::findorfail($id);
        return view('pengelolatoko.mengelolabarang.kategori.edit', compact('kategori'), [
            'title' =>'Ubah Kategori',
            'active' => 'mengelolacategory',
            'categories' => Category::all(),
        ]);
    }
    public function updatekategori(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
        ]);
        $kategori = Category::find($id);
        $kategori->name = $request->input('name');
        $kategori->deskripsi = $request->input('deskripsi');
        $kategori->save();
        return redirect('/databarang/kategori')->with('success', 'Kategori Berhasil di Update!');
    }
    public function outofstock(){
        $barang = Barang::onlyTrashed()->get();
        view()->share('barang', $barang);
        $pdf = PDF::loadview('pengelolatoko.mengelolabarang.outofstock');
        return $pdf->download('stok.pdf');
    }
    public function pengadaaan(Barang $barang, $id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect('/databarang')->with('success', 'Barang berhasil masuk pada daftar Rencana pengadaan barang');
    }
    public function daftarrencanapengadaan(Request $request)
    {
        $barangs = Barang::onlyTrashed()->get();
        $barang = Barang::onlyTrashed()->get();
        return view(
            'pengelolatoko.mengelolabarang.daftarrencana',
            compact('barangs', 'barang'),
            []
        );
    }
}
