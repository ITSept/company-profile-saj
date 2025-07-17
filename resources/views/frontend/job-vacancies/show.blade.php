<x-layouts.app> {{-- Pastikan ini sesuai dengan cara Anda mendaftarkan layout --}}
    <div class="container mx-auto px-4 py-12 md:py-16">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $jobVacancy->title }}</h1>
            <div class="text-gray-700 text-lg mb-6 border-b pb-4">
                <p class="mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <strong class="font-semibold">Lokasi:</strong> {{ $jobVacancy->location ?? 'Tidak Ditetapkan' }}
                </p>
                <p class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V6m0 4v2m0 4v2"></path></svg>
                    <strong class="font-semibold">Rentang Gaji:</strong> {{ $jobVacancy->salary_range ?? 'Negosiable' }}
                </p>
            </div>
            <div class="prose max-w-none text-gray-700 leading-relaxed text-lg mt-6">
                {!! nl2br(e($jobVacancy->description)) !!}
            </div>
            <div class="mt-10">
                <a href="{{ route('job-vacancies.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg shadow-sm text-base font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="mr-2 -ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Lowongan
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
