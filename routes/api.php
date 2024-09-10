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
Route::prefix('courses/{course}')->group(function () {
    // Assign a student to a course
    Route::post('/students', [StudentCourseController::class, 'assignStudentToCourse']);
});

// Routes for managing student relationships
Route::prefix('students/{student}')->group(function () {
    // Get courses assigned to a student
    Route::get('/courses', [StudentCourseController::class, 'getStudentCourses']);

    // Update courses assigned to a student (partial update)
    Route::patch('/courses', [StudentCourseController::class, 'updateStudentCourses']);

    // Remove specific courses from a student
    Route::delete('/courses', [StudentCourseController::class, 'removeCourses']);

    // Remove all courses from a student
    Route::delete('/courses/all', [StudentCourseController::class, 'removeAllCourses']);
});

// Get all students and their courses
Route::get('/allstudents/courseslist
', [StudentCourseController::class, 'getAllStudentsWithCourses']);
