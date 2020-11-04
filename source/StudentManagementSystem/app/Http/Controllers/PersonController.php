<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function students() {
        return response()->json(Student::all());
    }

    public function teachers() {
        return response()->json(Teacher::all());
    }
}
