<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TheoryTestsMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('theory_tests_method')->insert([
            // BARCELONA
            [
                'driving_school_name' => 'barcelona',
                'test_type' => 'common',
                'course_attendances' => 4,
                'test_completed' => json_encode(['total' => 150]),
                'points' => 60000,
                'theory_test_convocatory_number' => 1,
                'complies_with_method' => true,
                'test_date' => '2024-04-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // BADALONA
            [
                'driving_school_name' => 'badalona',
                'test_type' => 'common',
                'course_attendances' => 4,
                'test_completed' => json_encode(['total' => 135]),
                'points' => 58000,
                'theory_test_convocatory_number' => 1,
                'complies_with_method' => true,
                'test_date' => '2024-03-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'driving_school_name' => 'badalona',
                'test_type' => 'common',
                'course_attendances' => 4,
                'test_completed' => json_encode(['total' => 140]),
                'points' => 62000,
                'theory_test_convocatory_number' => 1,
                'complies_with_method' => false,
                'test_date' => '2024-04-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // SABADELL
            [
                'driving_school_name' => 'sabadell',
                'test_type' => 'common',
                'course_attendances' => 4,
                'test_completed' => json_encode(['total' => 160]),
                'points' => 61000,
                'theory_test_convocatory_number' => 1,
                'complies_with_method' => true,
                'test_date' => '2024-04-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'driving_school_name' => 'sabadell',
                'test_type' => 'common',
                'course_attendances' => 4,
                'test_completed' => json_encode(['total' => 170]),
                'points' => 63000,
                'theory_test_convocatory_number' => 1,
                'complies_with_method' => true,
                'test_date' => '2024-05-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

}
