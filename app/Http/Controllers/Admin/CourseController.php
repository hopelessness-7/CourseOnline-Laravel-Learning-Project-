<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function index()
    {
        $courses = Course::latest()->paginate(5);
        return view('admin.courses.index',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        // $courses = Course::all();

        $categories = Categorie::all();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $course = new Course;

        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->categorie_id = $request->input('categorie_id');

        $course->save();

        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        $course->users()->sync($user);

        return redirect()->route('courses.index')
                        ->with('success','Курс успешно создан');
    }

    public function show($id)
    {
        $course = Course::find($id);
        $records = DB::table('course_user')->select('id', 'user_id', 'course_id')->get();
        return view('admin.courses.show',compact('course', 'records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(Course $course)
    {
        $categories = Categorie::all();
        return view('admin.courses.edit',compact('course','categories'));
    }

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

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
                        ->with('success','Категория удалена успешно');
    }
}
