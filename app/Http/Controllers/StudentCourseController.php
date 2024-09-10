<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StudentCourseController extends Controller
{
    /**
     * Get all students and their courses.
     * 
     * @return JsonResponse Returns a list of students with their assigned courses.
     */
    public function getAllStudentsWithCourses(): JsonResponse
    {
        try {
            // Get all students with their courses
            $students = Student::with('courses:id,title')->get(['id', 'firstname', 'lastname', 'email']);

            // Transform the data into the desired format
            $result = $students->map(function ($student) {
                return [
                    'id' => $student->id,
                    'name' => $student->firstname . ' ' . $student->lastname,
                    'email'=>$student->email,
                    'courses' => $student->courses->pluck('title')->toArray(),
                ];
            });

            return new JsonResponse(
                data: $result,
                status: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                data: ['error' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Get the courses assigned to a student.
     * 
     * @param Student $student.
     * @return JsonResponse Returns a list of courses for the student.
     */
    public function getStudentCourses(Student $student): JsonResponse
    {
        try {
            $courses = $student->courses()->get(['courses.id as id', 'title', 'description', 'poster']);
            foreach ($courses as $course) {
                $course->makeHidden(['pivot']);
            }

            return new JsonResponse(
                data: $courses,
                status: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                data: ['error' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Assign a student to a course.
     * 
     * @param Request $request.
     * @param Course $course.
     * @return JsonResponse Returns the course's students after assignment.
     */
    public function assignStudentToCourse(Request $request, Course $course): JsonResponse
    {
        try {
            // Validate request
            $request->validate([
                'student_id' => 'required|exists:students,id',
            ]);

            // Attach the student to the course
            $course->students()->attach($request->student_id);

            // Get the updated list of students for the course
            $students = $course->students()->get(['students.id as id', 'firstname', 'lastname']);
            
            return new JsonResponse(
                data: $students,
                status: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                data: ['error' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Update the courses assigned to a student.
     * 
     * @param Request $request.
     * @param Student $student.
     * @return JsonResponse Returns the updated list of student's courses.
     */
    public function updateStudentCourses(Request $request, Student $student): JsonResponse
    {
        try {
            // Use sync() to update the list of courses assigned to the student
            $student->courses()->sync($request->course_ids);

            // Get the updated list of courses
            $updatedCourses = $student->courses()->get(['courses.id as id', 'title', 'description','poster']);
            foreach ($updatedCourses as $course) {
                $course->makeHidden(['pivot']);
            }

            return new JsonResponse(
                data: $updatedCourses,
                status: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                data: ['error' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Remove specific courses from a student.
     * 
     * @param Request $request.
     * @param Student $student.
     * @return JsonResponse Returns a success message after removal.
     */
    public function removeCourses(Request $request, Student $student): JsonResponse
    {
        try {
            // Detach the specific courses from the student
            $student->courses()->detach($request->course_ids);

            return new JsonResponse(
                data: ['message' => 'Course or courses removed successfully'],
                status: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                data: ['error' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Remove all courses from a student.
     * 
     * @param Student $student.
     * @return JsonResponse Returns a success message after removing all courses.
     */
    public function removeAllCourses(Student $student): JsonResponse
    {
        try {
            // Detach all courses from the student
            $student->courses()->detach();

            return new JsonResponse(
                data: ['message' => 'All courses removed from the student'],
                status: Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                data: ['error' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
