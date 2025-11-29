<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $filename = null;

        if ($request->hasFile('icon')) {
            $filename = time() . '_' . $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('uploads/categories'), $filename);
        }

        Category::create([
            'nama' => $request->nama,
            'icon' => $filename,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('icon')) {

            // Hapus icon lama
            if ($category->icon && file_exists(public_path('uploads/categories/' . $category->icon))) {
                unlink(public_path('uploads/categories/' . $category->icon));
            }

            // Upload baru
            $filename = time() . '_' . $request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads/categories'), $filename);
            $category->icon = $filename;
        }

        $category->nama = $request->nama;
        $category->save();

        return redirect()->route('admin.category.index')
                         ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Hapus icon fisik
        if ($category->icon && file_exists(public_path('uploads/categories/' . $category->icon))) {
            unlink(public_path('uploads/categories/' . $category->icon));
        }

        $category->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
