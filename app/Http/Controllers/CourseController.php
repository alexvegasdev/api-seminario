<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    /**
     * Display a listing of courses.
     * 
     * @return JsonResponse Returns a collection of courses (title, description).
     */
    public function index(): JsonResponse
    {
        try {
            $courses = Course::all(['id','title', 'description','poster']);
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
     * Store a newly created course in the database.
     * 
     * @param Request $request.
     * @return JsonResponse Returns the created course (title, description).
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $course = Course::create($request->only(['title', 'description','poster']));
            return new JsonResponse(
                data: $course->only(['id','title', 'description']),
                status: Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                data: ['error' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Display the specified course.
     * 
     * @param Course $course.
     * @return JsonResponse Returns the specified course (title, description).
     */
    public function show(Course $course): JsonResponse
    {
        try {
            return new JsonResponse(
                data: $course->only(['id','title', 'description','poster']),
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
     * Update the specified course in the database.
     * 
     * @param Request $request.
     * @param Course $course.
     * @return JsonResponse Returns the updated course (title, description).
     */
    public function update(Request $request, Course $course): JsonResponse
    {
        try {
            $course->update($request->only(['title', 'description','poster']));
            return new JsonResponse(
                data: $course->only(['id','title', 'description','poster']),
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
     * Remove the specified course from the database.
     * 
     * @param Course $course.
     * @return JsonResponse Returns a success message on deletion.
     */
    public function destroy(Course $course): JsonResponse
    {
        try {
            $course->delete();
            return new JsonResponse(
                data: ['message' => 'Course deleted successfully'],
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
