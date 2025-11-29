<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /** ================= ADMIN ================= */

    public function index()
    {
        $produk = Produk::orderBy('id', 'desc')->get();
        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.produk.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok'  => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        // upload gambar
        $filename = time() . '_' . $request->gambar->getClientOriginalName();
        $request->gambar->move(public_path('tema/img/produk'), $filename);

        Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filename,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $categories = Category::all();

        return view('admin.produk.edit', compact('produk', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        // jika ada gambar baru
        if ($request->hasFile('gambar')) {

            $filename = time() .'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('tema/img/produk'), $filename);

            if (file_exists(public_path('tema/img/produk/'.$produk->gambar))) {
                unlink(public_path('tema/img/produk/'.$produk->gambar));
            }

            $produk->gambar = $filename;
        }

        $produk->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok'  => $request->stok,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if (file_exists(public_path('tema/img/produk/'.$produk->gambar))) {
            unlink(public_path('tema/img/produk/'.$produk->gambar));
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }
    

    /** ================= USER ================= */

    public function listUser()
    {
        $produk = Produk::latest()->get();
        return view('user.product', ['products' => $produk]);
    }

    public function detail($id)
    {
        $produk = Produk::findOrFail($id);
        return view('user.produk_detail', compact('produk'));
    }

    public function landing()
    {
        $categories = Category::all(); // ambil semua kategori

        return view('user.landing', compact('categories'));
    }

        public function landingLogin()
    {
        $categories = Category::all();
        return view('user.landingLogin', compact('categories'));
    }


}
