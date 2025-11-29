<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produk;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil semua kategori
        $categories = Category::all();

        // Ambil kategori Smartphone
        $smartphoneCategory = Category::where('nama', 'Smartphone')->first();

        // Ambil kategori Drone
        $droneCategory = Category::where('nama', 'Drone')->first();

        // Produk Smartphone
        $smartphones = $smartphoneCategory
            ? Produk::where('category_id', $smartphoneCategory->id)->get()
            : collect([]);

        // Produk Drone
        $drones = $droneCategory
            ? Produk::where('category_id', $droneCategory->id)->get()
            : collect([]);

        return view('user.landing', compact('categories', 'smartphones', 'drones'));
    }
}
