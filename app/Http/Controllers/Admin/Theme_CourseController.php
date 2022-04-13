<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Categorie;
use App\Models\Theme_course;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theme_courses = Theme_Course::latest()->paginate(5);
        return view('admin.theme_courses.index',compact('theme_courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $theme_courses = Theme_Course::all();

        $courses = Course::all();
        return view('admin.theme_courses.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $theme_course
     * @return \Illuminate\Http\Response
     */
    public function show(Theme_Course $theme_course)
    {
        return view('admin.theme_courses.show',compact('theme_course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme_Course  $theme_course
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme_Course $theme_course)
    {
        $courses = Course::all();
        return view('admin.theme_courses.edit',compact('theme_course','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme_Course  $theme_course
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme_Course  $theme_course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme_Course $theme_course)
    {
        $theme_course->delete();
        return redirect()->route('theme_courses.index')
                        ->with('success','Тема курса удалена успешно');
    }
}
