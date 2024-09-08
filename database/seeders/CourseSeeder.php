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
            ['title' => 'Mathematics', 'description' => 'Basic principles of mathematics.', 'poster'=>'https://i.pinimg.com/474x/fd/69/fa/fd69fae47efb2e2a6d3d8891a1db071c.jpg'],
            ['title' => 'Physics', 'description' => 'Introduction to physics concepts.', 'poster'=>'https://images.cdn3.buscalibre.com/fit-in/360x360/77/9b/779be24d5f78c7f182b72f90cb287018.jpg'],
            ['title' => 'Chemistry', 'description' => 'Fundamentals of chemical reactions.', 'poster'=>'https://i.pinimg.com/originals/61/03/b8/6103b8be2eba799e741433dddd037a59.jpg'],
            ['title' => 'Biology', 'description' => 'Exploring biological systems and life.', 'poster'=>'https://i.pinimg.com/originals/1e/08/a2/1e08a2bd6acf19fd9530717d84a4a86c.jpg'],
            ['title' => 'History', 'description' => 'Overview of world history.', 'poster'=>'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/history-book-cover-design-template-0e3961aae83cdeab2d3b120dd2d7063c_screen.jpg?ts=1692216756'],
            ['title' => 'Literature', 'description' => 'Analysis of literary works.', 'poster'=>'https://i.pinimg.com/736x/1e/4d/90/1e4d90d5f40f1bf9bb592742b309023e.jpg'],
            ['title' => 'Art', 'description' => 'Introduction to art techniques.', 'poster'=>'https://m.media-amazon.com/images/I/61fRtStU3GL._AC_UF894,1000_QL80_.jpg'],
            ['title' => 'Music', 'description' => 'Basics of music theory and practice.', 'poster'=>'https://static.vecteezy.com/system/resources/previews/002/127/666/original/music-theory-book-cover-mockup-template-illustration-free-vector.jpg'],
            ['title' => 'Philosophy', 'description' => 'Foundations of philosophical thought.', 'poster'=>'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1602360349i/55619676.jpg'],
            ['title' => 'Programming', 'description' => 'Introduction to programming with Python.', 'poster'=>'https://images.booksense.com/images/015/116/9781801116015.jpg'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
