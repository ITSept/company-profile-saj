<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product; // Jika ingin menampilkan produk di homepage
use App\Models\JobVacancy; // Jika ingin menampilkan lowongan di homepage
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil beberapa data terbaru untuk homepage, misalnya 3 produk dan 3 lowongan terbaru
        $latestProducts = Product::latest()->take(3)->get();
        $latestJobVacancies = JobVacancy::latest()->take(3)->get();

        return view('frontend.home', compact('latestProducts', 'latestJobVacancies'));
    }
}
