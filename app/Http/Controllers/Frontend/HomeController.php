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
        $products = Product::all();           // Ambil semua produk
        $jobVacancies = JobVacancy::all();   // Ambil semua lowongan kerja

        return view('frontend.home', compact('products', 'jobVacancies'));
    }
}
