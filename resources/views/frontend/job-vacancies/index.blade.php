<x-layouts.app> {{-- Pastikan ini sesuai dengan cara Anda mendaftarkan layout --}}
    <div class="container mx-auto px-4 py-12 md:py-16">
        <h1 class="text-5xl font-extrabold text-gray-900 text-center mb-12">Lowongan Karir</h1>

        @if ($jobVacancies->isEmpty())
            <p class="text-center text-gray-600 text-lg">Saat ini belum ada lowongan karir yang tersedia.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($jobVacancies as $jobVacancy)
                    <div class="bg-white rounded-xl shadow-lg p-7 border border-gray-200 transform hover:scale-102 transition duration-300">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $jobVacancy->title }}</h2>
                        <p class="text-gray-600 text-sm mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $jobVacancy->location ?? 'Tidak Ditetapkan' }}
                        </p>
                        <p class="text-gray-600 text-sm mb-4 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V6m0 4v2m0 4v2"></path></svg>
                            {{ $jobVacancy->salary_range ?? 'Negosiable' }}
                        </p>
                        <p class="text-gray-700 mb-5 text-base leading-relaxed">{{ Str::limit($jobVacancy->description, 150) }}</p>
                        <a href="{{ route('job-vacancies.show', $jobVacancy->id) }}" class="inline-block text-indigo-600 hover:text-indigo-800 font-semibold transition duration-300 text-lg flex items-center">
                            Baca Selengkapnya
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- Paginasi --}}
            <div class="mt-12">
                {{ $jobVacancies->links() }}
            </div>
        @endif
    </div>
</x-layouts.app>
