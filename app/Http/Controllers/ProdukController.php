<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('id', 'desc')->get();
        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('tema/img/produk'), $filename);

        Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filename,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dataProduk.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk')); // ← FIX DI SINI
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('tema/img/produk'), $filename);

            if (file_exists(public_path('tema/img/produk/' . $produk->gambar))) {
                unlink(public_path('tema/img/produk/' . $produk->gambar));
            }

            $produk->gambar = $filename;
        }

        $produk->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dataProduk.index')
                         ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if (file_exists(public_path('tema/img/produk/' . $produk->gambar))) {
            unlink(public_path('tema/img/produk/' . $produk->gambar));
        }

        $produk->delete();

        return redirect()->route('dataProduk.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }
}
