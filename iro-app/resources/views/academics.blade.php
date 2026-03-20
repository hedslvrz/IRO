<x-layouts::app.iro-sidebar>

    @php
        // Data extracted directly from the provided WMSU document
        $academicsData = [
            'College of Agriculture' => [
                'BS Agriculture', 'BS Agriculture Business', 'BS Agriculture Engineering', 'Bachelor in Agricultural Technology', 'BS Food Technology', 'MS Agronomy'
            ],
            'College of Criminal Justice Education' => [
                'BS Criminology', 'MS Criminal Justice Education'
            ],
            'College of Engineering' => [
                'BS Environmental Engineering', 'BS Sanitary Engineering', 'BS Agriculture and Biosystems', 'BS Civil Engineering', 'BS Computer Engineering', 'BS Electrical Engineering', 'BS Electronics Engineering', 'BS Geodetic Engineering', 'BS Industrial Engineering', 'BS Mechanical Engineering', 'MSST/MSE', 'Meng Ed'
            ],
            'College of Forestry' => [
                'BS Agroforestry', 'BS Environmental Science', 'BS Forestry'
            ],
            'College of Home Economics' => [
                'BS Nutrition and Dietetics', 'BS Home Economics', 'BS Hospitality Management Services', 'Dipploma in Food Processing', 'Associate in Hospitality Management Services', 'Master in Food Processing'
            ],
            'College of Liberal Arts' => [
                'BS Psychology', 'AB Political Science', 'BA History', 'BAELS', 'Batsilyer g Sining sa Filipino', 'BA Journalism', 'BA Broadcasting', 'BS Economics', 'BS Accountancy', 'MAELS'
            ],
            'College of Nursing' => [
                'BS Nursing', 'Master of Nursing', 'Master of Arts in Nursing'
            ],
            'College of Physical Education Recreation and Sports' => [
                'Bachelor of Physical Education', 'BSESS', 'Diploma in Sports Coaching', 'Diploma in Physical Edcuation', 'MSPE'
            ],
            'College of Science and Mathematics' => [
                'BS Biology', 'BS Chemistry', 'BS Physics', 'BS Mathematics', 'BS Statistics', 'Master of Science in Teaching'
            ],
            'College of Teacher Education' => [
                'Bachelor of Elementary Education', 'BEED-Special Education', 'Bachelor of Early Childhood Education', 'Bachelor of Culture and Arts', 'STEP', 'Bachelor of Special Needs Education', 'BSED-English', 'BSED-Filipino', 'BSED Mathematics', 'BSED Science', 'BSED-Social Studies', 'BSED-Values Education', 'BSED-MAPEH', 'Doctor of Education', 'Doctor of Philosophy on Education', 'Master of Arts in Education'
            ],
            'College of Public Administration' => [
                'Doctor of Public Administration', 'Master in Public Administration', 'Certificate in Governmental Management'
            ],
            'College of Social Work and Community Development' => [
                'BS Social Work', 'BS Community Development', 'Master of Social Work'
            ],
            'College of Architecture' => [
                'BS Architecture'
            ],
            'College of Asian and Islamic Studies' => [
                'AB Islamic Studies', 'AB Asian Studies', 'Diploma in Arabic Language'
            ],
            'College of Computing Studies' => [
                'BSCS – Information Technology', 'BS Computer Science', 'Master in Information Technology'
            ],
            'College of Law' => [
                'Juris Doctor'
            ]
        ];
    @endphp

    {{-- PAGE HEADER BANNERS --}}
    <div class="bg-red-900 py-14 border-b-4 border-red-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-red-950 opacity-20"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight">Accredited Programs</h1>
            <p class="mt-4 text-red-100 text-lg md:text-xl max-w-3xl mx-auto font-medium">
                Western Mindanao State University (WMSU) stands as a beacon of inclusive and transformative education, offering 83 courses that are truly for the masses.
            </p>
        </div>
    </div>

    {{-- MAIN CONTENT: ACADEMIC ACCORDIONS --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="mb-10 text-center">
            <h2 class="text-2xl font-bold text-red-900">Explore Our Colleges</h2>
            <p class="text-gray-600 mt-2">Click on any college to view the specific accredited programs offered.</p>
        </div>

        {{-- Single Column Stack for Accordions --}}
        <div class="flex flex-col space-y-4">

            @foreach($academicsData as $college => $programs)
                <details class="group bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden [&_summary::-webkit-details-marker]:hidden">

                    {{-- DROPDOWN HEADER --}}
                    <summary class="flex items-center justify-between cursor-pointer p-5 bg-white hover:bg-red-50 transition-colors duration-200">
                        <div class="flex items-center gap-4">
                            {{-- Academic Cap Icon --}}
                            <div class="p-2.5 bg-red-100 rounded-lg text-red-700 group-hover:bg-red-600 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path></svg>
                            </div>
                            <h3 class="font-bold text-gray-900 group-hover:text-red-800 transition-colors text-lg">{{ strtoupper($college) }}</h3>
                        </div>

                        {{-- Dropdown Chevron Icon --}}
                        <span class="transition-transform duration-300 group-open:-rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24" class="text-gray-500 group-hover:text-red-700"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>

                    {{-- DROPDOWN CONTENT --}}
                    <div class="px-7 py-5 border-t border-gray-100 bg-gray-50">
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-3 gap-x-6">
                            @foreach($programs as $program)
                                <li>
                                    <a href="{{ route('academics-program') }}" class="flex items-center text-[15px] font-medium text-gray-700 hover:text-red-700 hover:translate-x-1 transition-all duration-200">
                                        <svg class="w-4 h-4 mr-2.5 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                                        {{ $program }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </details>
            @endforeach

        </div>
    </div>

</x-layouts::app.iro-sidebar>
