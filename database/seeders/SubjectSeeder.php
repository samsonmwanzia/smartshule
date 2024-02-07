<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            [
                'name' => 'English',
                'code' => '101',
                'cluster' => 'GROUP 1',
                'note' => '(Core Subjects)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kiswahili',
                'code' => '102',
                'cluster' => 'GROUP 1',
                'note' => '(Core Subjects)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mathematics Alternative A',
                'code' => '121',
                'cluster' => 'GROUP 1',
                'note' => '(Core Subjects)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mathematics Alternative B',
                'code' => '122',
                'cluster' => 'GROUP 1',
                'note' => '(Core Subjects)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Biology',
                'code' => '231',
                'cluster' => 'GROUP 2',
                'note' => 'Sciences',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Physics',
                'code' => '232',
                'cluster' => 'GROUP 2',
                'note' => 'Sciences',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chemistry',
                'code' => '233',
                'cluster' => 'GROUP 2',
                'note' => 'Sciences',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Biology for the Blind',
                'code' => '236',
                'cluster' => 'GROUP 2',
                'note' => 'Sciences',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'General Science ',
                'code' => '237',
                'cluster' => 'GROUP 2',
                'note' => 'Sciences',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Geography',
                'code' => '312',
                'cluster' => 'GROUP 3',
                'note' => 'Humanities',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'History and Government ',
                'code' => '311',
                'cluster' => 'GROUP 3',
                'note' => 'Humanities',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Christian Religious Education',
                'code' => '313',
                'cluster' => 'GROUP 3',
                'note' => 'Humanities',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Islamic Religious Education',
                'code' => '314',
                'cluster' => 'GROUP 3',
                'note' => 'Humanities',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hindu Religious Education',
                'code' => '315',
                'cluster' => 'GROUP 3',
                'note' => 'Humanities',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Computer Studies',
                'code' => '451',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Agriculture',
                'code' => '443',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Home Science',
                'code' => '441',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Art and Design',
                'code' => '442',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Woodwork',
                'code' => '444',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Metalworks',
                'code' => '445',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Building Construction',
                'code' => '446',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Power Mechanics',
                'code' => '447',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Electricity',
                'code' => '448',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Drawing and Design',
                'code' => '449',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Aviation Technology',
                'code' => '450',
                'cluster' => 'GROUP 4',
                'note' => 'Applied Technical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Business Studies',
                'code' => '565',
                'cluster' => 'GROUP 5',
                'note' => 'Languages and Others',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'French',
                'code' => '501',
                'cluster' => 'GROUP 5',
                'note' => 'Languages and Others',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'German',
                'code' => '502',
                'cluster' => 'GROUP 5',
                'note' => 'Languages and Others',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Arabic',
                'code' => '503',
                'cluster' => 'GROUP 5',
                'note' => 'Languages and Others',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kenya Sign Language',
                'code' => '504',
                'cluster' => 'GROUP 5',
                'note' => 'Languages and Others',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Music',
                'code' => '511',
                'cluster' => 'GROUP 5',
                'note' => 'Languages and Others',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        DB::table('subjects')->insert($subjects);

        // Retrieve subjects from the subjects table
        $subjects = DB::table('subjects')->select('id', 'code')->get();

        foreach ($subjects as $subject) {
            $columnName = strtolower($subject->code) . '_score';

            // Use raw SQL to add a new column after the 'student_id' column
            DB::statement("ALTER TABLE exam_results ADD COLUMN $columnName DECIMAL(5,2) NULL AFTER student_id");
        }

    }
}
