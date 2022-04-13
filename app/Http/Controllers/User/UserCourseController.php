<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Theme_course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function index()
    {
        return view('user.courses.index');
    }

    public function create($id)
    {

        $course = Course::find($id);

        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        $course->users()->sync($user);

        return view('user.courses.show', compact('course'));
    }

    public function show($id)
    {
        $course = Course::find($id);
        return view('user.courses.show', compact('course'));
    }

    public function themes($id)
    {
        $themes = Theme_course::find($id);
        return view('user.lessons.index', compact('themes'));
    }
}
