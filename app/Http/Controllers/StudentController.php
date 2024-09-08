<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     * 
     * @return JsonResponse Returns a collection of students (id, firstname, lastname, email).
     */
    public function index(): JsonResponse
    {
        try {
            $students = Student::all(['id', 'firstname', 'lastname', 'email']);
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
     * Store a newly created student in the database.
     * 
     * @param Request $request.
     * @return JsonResponse Returns the created student (id, firstname, lastname, email).
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $student = Student::create($request->only(['firstname', 'lastname', 'email']));
            return new JsonResponse(
                data: $student->only(['id', 'firstname', 'lastname', 'email']),
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
     * Display the specified student.
     * 
     * @param Student $student.
     * @return JsonResponse Returns the specified student (id, firstname, lastname, email).
     */
    public function show(Student $student): JsonResponse
    {
        try {
            return new JsonResponse(
                data: $student->only(['id', 'firstname', 'lastname', 'email']),
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
     * Update the specified student in the database.
     * 
     * @param Request $request.
     * @param Student $student.
     * @return JsonResponse Returns the updated student (id, firstname, lastname, email).
     */
    public function update(Request $request, Student $student): JsonResponse
    {
        try {
            $student->update($request->only(['firstname', 'lastname', 'email']));
            return new JsonResponse(
                data: $student->only(['id', 'firstname', 'lastname', 'email']),
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
     * Remove the specified student from the database.
     * 
     * @param Student $student.
     * @return JsonResponse Returns a success message on deletion.
     */
    public function destroy(Student $student): JsonResponse
    {
        try {
            $student->delete();
            return new JsonResponse(
                data: ['message' => 'Student deleted successfully'],
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
