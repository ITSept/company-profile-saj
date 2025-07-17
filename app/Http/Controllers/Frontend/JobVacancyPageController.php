<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyPageController extends Controller
{
    public function index()
    {
        // Ambil semua lowongan karir untuk ditampilkan
        $jobVacancies = JobVacancy::all(); // Atau JobVacancy::paginate(10)
        return view('frontend.job-vacancies.index', compact('jobVacancies'));
    }

    public function show(JobVacancy $jobVacancy)
    {
        // Menampilkan detail lowongan tunggal
        return view('frontend.job-vacancies.show', compact('jobVacancy'));
    }
}
