<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use App\Models\Category;
use App\Models\Teacher;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $students = Student::where('featured',true)->inRandomOrder()->limit(3)->get();
        $courses = Course::all();
        $categories = Category::all();
        $teachers = Teacher::all();
        $all_students = Student::all();
        return view('home',compact('students','courses','categories','teachers', 'all_students'));
    }
}
