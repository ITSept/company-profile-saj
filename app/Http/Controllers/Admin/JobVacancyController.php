<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobVacancies = JobVacancy::all(); // Mengambil semua data lowongan
        return view('admin.job-vacancies.index', compact('jobVacancies')); // Mengirimkan data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.job-vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:255',
        ]);

        // Buat entri lowongan karir baru di database
        JobVacancy::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary_range' => $request->salary_range,
        ]);

        // Redirect kembali ke halaman index lowongan dengan pesan sukses
        return redirect()->route('admin.job-vacancies.index')->with('success', 'Lowongan karir berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobVacancy $jobVacancy)
    {
        // Opsional: Untuk menampilkan detail satu lowongan
        // return view('admin.job-vacancies.show', compact('jobVacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobVacancy $jobVacancy)
    {
        // Tampilkan form edit dengan data lowongan yang akan diedit
        return view('admin.job-vacancies.edit', compact('jobVacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobVacancy $jobVacancy)
    {
        // Validasi data input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:255',
        ]);

        // Perbarui data lowongan di database
        $jobVacancy->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary_range' => $request->salary_range,
        ]);

        // Redirect kembali ke halaman index lowongan dengan pesan sukses
        return redirect()->route('admin.job-vacancies.index')->with('success', 'Lowongan karir berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobVacancy $jobVacancy)
    {
        // Hapus entri lowongan dari database
        $jobVacancy->delete();

        // Redirect kembali ke halaman index lowongan dengan pesan sukses
        return redirect()->route('admin.job-vacancies.index')->with('success', 'Lowongan karir berhasil dihapus!');
    }
}
