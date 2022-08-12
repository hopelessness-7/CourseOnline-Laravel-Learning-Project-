<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Categorie;
use App\Models\Theme_Course;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class Theme_CourseController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:theme_course-list|theme_course-create|theme_course-edit|theme_course-delete', ['only' => ['index','show']]);
         $this->middleware('permission:theme_course-create', ['only' => ['create','store']]);
         $this->middleware('permission:theme_course-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:theme_course-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $theme_courses = Theme_Course::latest()->paginate(5);
        return view('admin.theme_courses.index',compact('theme_courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.theme_courses.create', compact('courses'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Theme_Course::create($request->all());

        return redirect()->route('theme_courses.index')
                        ->with('success','Тема курса успешно создана');
    }

    public function show(Theme_Course $theme_course)
    {
        return view('admin.theme_courses.show',compact('theme_course'));
    }

    public function edit(Theme_Course $theme_course)
    {
        $courses = Course::all();
        return view('admin.theme_courses.edit',compact('theme_course','courses'));
    }

    public function update(Request $request, Theme_Course $theme_course)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $theme_course->update($request->all());

        return redirect()->route('theme_courses.index')
                        ->with('success','Тема курса изменена успешно');
    }

    public function destroy(Theme_Course $theme_course)
    {
        $theme_course->delete();
        return redirect()->route('theme_courses.index')
                        ->with('success','Тема курса удалена успешно');
    }
}
