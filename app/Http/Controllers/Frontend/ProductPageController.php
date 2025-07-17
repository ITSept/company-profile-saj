<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product; // Pastikan ini ada
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function index()
    {
        // Ambil semua produk untuk ditampilkan
        $products = Product::all(); // Atau Product::paginate(12) jika ingin paginasi
        return view('frontend.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        // Menampilkan detail produk tunggal
        return view('frontend.products.show', compact('product'));
    }
}
