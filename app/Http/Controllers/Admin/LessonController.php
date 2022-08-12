<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Categorie;
use App\Models\Theme_Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class LessonController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:lesson-list|lesson-create|lesson-edit|lesson-delete', ['only' => ['index','show']]);
         $this->middleware('permission:lesson-create', ['only' => ['create','store']]);
         $this->middleware('permission:lesson-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:lesson-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $lessons = Lesson::latest()->paginate(5);
        return view('admin.lessons.index',compact('lessons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $theme_courses = Theme_Course::all();
        return view('admin.lessons.create', compact('theme_courses'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Lesson::create($request->all());

        return redirect()->route('lessons.index')
                        ->with('success','Тема курса успешно создана');
    }

    public function show(Lesson $lesson)
    {
        return view('admin.lessons.show',compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        $theme_courses = Theme_Course::all();
        return view('admin.lessons.edit',compact('lesson','theme_courses'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $lesson->update($request->all());

        return redirect()->route('lessons.index')
                        ->with('success','Урок изменён успешно');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')
                        ->with('success','Урок удален успешно');
    }
}
