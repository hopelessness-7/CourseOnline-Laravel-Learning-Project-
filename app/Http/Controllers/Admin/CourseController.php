<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CourseController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','show']]);
         $this->middleware('permission:course-create', ['only' => ['create','store']]);
         $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(5);
        return view('admin.courses.index',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $courses = Course::all();

        $categories = Categorie::all();
        return view('admin.courses.create', compact('categories'));
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

        Course::create($request->all());

        return redirect()->route('courses.index')
                        ->with('success','Курс успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('admin.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Categorie::all();
        return view('admin.courses.edit',compact('course','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
                        ->with('success','Категория изменена успешно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
                        ->with('success','Категория удалена успешно');
    }
}
