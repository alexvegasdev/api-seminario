<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['title' => 'Mathematics', 'description' => 'Basic principles of mathematics.'],
            ['title' => 'Physics', 'description' => 'Introduction to physics concepts.'],
            ['title' => 'Chemistry', 'description' => 'Fundamentals of chemical reactions.'],
            ['title' => 'Biology', 'description' => 'Exploring biological systems and life.'],
            ['title' => 'History', 'description' => 'Overview of world history.'],
            ['title' => 'Literature', 'description' => 'Analysis of literary works.'],
            ['title' => 'Art', 'description' => 'Introduction to art techniques.'],
            ['title' => 'Music', 'description' => 'Basics of music theory and practice.'],
            ['title' => 'Philosophy', 'description' => 'Foundations of philosophical thought.'],
            ['title' => 'Programming', 'description' => 'Introduction to programming with Python.'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
