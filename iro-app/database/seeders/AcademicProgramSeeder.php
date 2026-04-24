<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\College;
use App\Models\AcademicProgram;
use Illuminate\Support\Str;

class AcademicProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, ensure the College of Engineering exists so we can attach the program to it
        $engineeringCollege = College::firstOrCreate(
            ['slug' => 'college-of-engineering'],
            ['name' => 'College of Engineering', 'description' => 'Home of future engineers.']
        );

        // Define the program
        $title = 'Global Engineering Exchange Program';

        AcademicProgram::updateOrCreate(
            ['slug' => Str::slug($title)], // Check if it exists by slug
            [
                'college_id' => $engineeringCollege->id,
                'title' => $title,
                'category' => 'International Exchange',
                'degree_level' => 'Undergraduate',
                'image' => 'https://placehold.co/1200x500/990000/ffffff?text=Engineering+Exchange',
                'overview' => 'The Global Engineering Exchange Program is a premier initiative by the WMSU International Relations Office...',
                'opportunities' => 'Graduates of this exchange program consistently report higher employability rates...',

                // Since we cast these to arrays in the Model, we just write them as PHP arrays!
                'quick_facts' => [
                    'Duration' => '1 Semester (5 Months)',
                    'Location' => 'Tokyo, Japan / Seoul, South Korea',
                    'Language' => 'English',
                    'Intake' => 'Fall (August) & Spring (February)',
                    'Credits' => 'Fully transferable to WMSU'
                ],
                'structure' => [
                    [
                        'phase' => 'Core Specialization Seminars',
                        'details' => 'Students will participate in advanced seminars focusing on Robotics...'
                    ],
                    [
                        'phase' => 'Industry Immersion & Lab Work',
                        'details' => '150 hours of hands-on laboratory work...'
                    ]
                ],
                'eligibility' => [
                    'Must be a currently enrolled 3rd or 4th-year Engineering student at WMSU.',
                    'Minimum Cumulative Grade Point Average (CGPA) of 1.75 or better.',
                    'Proof of English proficiency.',
                ],
                'cta' => [
                    'primary_text' => 'Apply for Fall Intake',
                    'primary_url' => '#',
                    'secondary_text' => 'Download Program Brochure',
                    'secondary_url' => '#'
                ]
            ]
        );

        // You can copy/paste that AcademicProgram::updateOrCreate block for as many programs as you want to seed!
    }
}
