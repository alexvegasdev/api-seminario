<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['firstname' => 'John', 'lastname' => 'Doe', 'email' => 'john.doe@example.com'],
            ['firstname' => 'Jane', 'lastname' => 'Smith', 'email' => 'jane.smith@example.com'],
            ['firstname' => 'Paul', 'lastname' => 'Johnson', 'email' => 'paul.johnson@example.com'],
            ['firstname' => 'Emma', 'lastname' => 'Brown', 'email' => 'emma.brown@example.com'],
            ['firstname' => 'Mark', 'lastname' => 'White', 'email' => 'mark.white@example.com'],
            ['firstname' => 'Lucy', 'lastname' => 'Taylor', 'email' => 'lucy.taylor@example.com'],
            ['firstname' => 'Mike', 'lastname' => 'Davis', 'email' => 'mike.davis@example.com'],
            ['firstname' => 'Anna', 'lastname' => 'Wilson', 'email' => 'anna.wilson@example.com'],
            ['firstname' => 'Tom', 'lastname' => 'Moore', 'email' => 'tom.moore@example.com'],
            ['firstname' => 'Sophie', 'lastname' => 'Clark', 'email' => 'sophie.clark@example.com']
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
