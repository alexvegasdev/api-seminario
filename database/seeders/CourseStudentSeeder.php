<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseStudentData = [
            ['course_id' => 1, 'student_id' => 1],
            ['course_id' => 2, 'student_id' => 1],
            ['course_id' => 3, 'student_id' => 2],
            ['course_id' => 4, 'student_id' => 2],
            ['course_id' => 5, 'student_id' => 3],
            ['course_id' => 6, 'student_id' => 3],
            ['course_id' => 7, 'student_id' => 4],
            ['course_id' => 8, 'student_id' => 4],
            ['course_id' => 9, 'student_id' => 5],
            ['course_id' => 10, 'student_id' => 5],
            ['course_id' => 1, 'student_id' => 6],
            ['course_id' => 3, 'student_id' => 6],
            ['course_id' => 2, 'student_id' => 7],
            ['course_id' => 4, 'student_id' => 7],
            ['course_id' => 5, 'student_id' => 8],
            ['course_id' => 6, 'student_id' => 8],
            ['course_id' => 7, 'student_id' => 9],
            ['course_id' => 8, 'student_id' => 9],
            ['course_id' => 9, 'student_id' => 10],
            ['course_id' => 10, 'student_id' => 10],
        ];

        foreach ($courseStudentData as $data) {
            DB::table('course_student')->insert($data);
        }
    }
}
