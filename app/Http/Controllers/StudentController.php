<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }
}
