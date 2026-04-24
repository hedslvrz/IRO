<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\College;
use App\Models\AcademicProgram;
use Illuminate\Support\Str;

class AcademicsSeeder extends Seeder
{
    public function run(): void
    {
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

        // 2. Loop through the array to populate the database
        foreach ($academicsData as $collegeName => $programs) {

            // Create or Find the College
            $college = College::firstOrCreate(
                ['slug' => Str::slug($collegeName)], // Check if it exists by slug
                [
                    'name' => $collegeName,
                    'description' => 'Welcome to the ' . $collegeName . ' at Western Mindanao State University.'
                ]
            );

            // Loop through each program in this specific college
            foreach ($programs as $programTitle) {

                // Determine category based on title (Basic logic for dummy data)
                $level = str_contains($programTitle, 'Master') || str_contains($programTitle, 'MS') || str_contains($programTitle, 'MA') ? 'Graduate' : (str_contains($programTitle, 'Doctor') ? 'Post-Graduate' : 'Undergraduate');

                // Create or Find the Academic Program
                AcademicProgram::firstOrCreate(
                    ['slug' => Str::slug($programTitle)],
                    [
                        'college_id' => $college->id,
                        'title' => $programTitle,

                        // We will add placeholder dummy data for the rest so your public views don't break.
                        // The Admin can edit these later!
                        'category' => 'Local Program',
                        'degree_level' => $level,
                        'overview' => 'This is the official page for the ' . $programTitle . ' program offered by the ' . $collegeName . '.',
                        'opportunities' => 'Graduates of the ' . $programTitle . ' program have excellent local and international career opportunities.',

                        'quick_facts' => [
                            'Duration' => '4 Years (Varies for Masters/Doctorates)',
                            'Campus' => 'WMSU Main Campus',
                            'Instruction' => 'English / Filipino'
                        ],
                        'structure' => [
                            [
                                'phase' => 'General Education & Fundamentals',
                                'details' => 'Foundational courses designed to prepare students for specialized subjects.'
                            ],
                            [
                                'phase' => 'Major Subjects & Specialization',
                                'details' => 'Core subjects focused strictly on ' . $programTitle . '.'
                            ]
                        ],
                        'eligibility' => [
                            'Must pass the WMSU College Entrance Test (CET).',
                            'Must submit Form 138 (High School Report Card) or equivalent.',
                            'Must pass the college-level interview (if applicable).'
                        ],
                        'cta' => [
                            'primary_text' => 'View Admission Requirements',
                            'primary_url' => '#',
                        ]
                    ]
                );
            }
        }
    }
}
