<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Theme_course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCourseController extends Controller
{

    public function preview($id)
    {
        $course = Course::find($id);
        return view('user.courses.preview', compact('course'));
    }

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

    public function themes($c_id,$t_id,$id)
    {
        $lesson = Lesson::find($id);

        $t = Theme_course::find($t_id);

        $c = Course::find($c_id);

        return view('user.lessons.index', compact('lesson'));
    }

    public function removeUser($id)
    {
        $course = Course::find($id);

        $records = DB::table('course_user')->select('id', 'user_id', 'course_id')->get();

        foreach ($records as $record) {
            if ($course->id == $record->course_id) {
                $user = $record->user_id;
            }
        }

        $course->users()->detach($user);

        return redirect()->route('courses.index')
                    ->with('success','Пользователь снят с курса');
    }

    public function teacherUserRecords()
    {
        $users = User::all();
        $courses = Course::all();
        return view('admin.courses.records',compact('courses','users'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'course_id' => 'required',
            'user_id' => 'required',
        ]);

        $records = DB::table('course_user')->select('id', 'user_id', 'course_id')->get();

        $course_id = $request->input('course_id');
        $user_id = $request->input('user_id');

        DB::table('course_user')->insert([
            ['course_id' => $course_id, 'user_id' => $user_id]
        ]);


        return redirect()->route('courses.index')
                        ->with('success','Пользователь добавлен');
    }
}
