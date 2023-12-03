<?php

namespace App\Http\Controllers;

use App\Models\StudentCrud;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

        $students = StudentCrud::all();
        return view('welcome', Compact('students'));
    }
    public function store(Request $request){

        $student = new StudentCrud();

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->save();


        return $student;




    }
}
