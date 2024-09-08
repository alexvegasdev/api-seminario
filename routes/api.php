<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentCourseController;
use Illuminate\Support\Facades\Route;

// Resource routes for students
Route::resource('/students', StudentController::class);

// Resource routes for courses
Route::resource('/courses', CourseController::class);

// Additional routes for managing student-course relationships
Route::prefix('students/{student}')->group(function () {
    // Assign courses to a student
    Route::post('/courses', [StudentCourseController::class, 'assignCourses']);

    // Get courses assigned to a student
    Route::get('/courses', [StudentCourseController::class, 'getStudentCourses']);

    // Update courses assigned to a student (partial update)
    Route::patch('/courses', [StudentCourseController::class, 'updateStudentCourses']);

    // Remove specific courses from a student
    Route::delete('/courses', [StudentCourseController::class, 'removeCourses']);

    // Remove all courses from a student
    Route::delete('/courses/all', [StudentCourseController::class, 'removeAllCourses']);
});

// Get all the students and their courses
Route::get('/allstudents/courses', [StudentCourseController::class, 'getAllStudentsWithCourses']);