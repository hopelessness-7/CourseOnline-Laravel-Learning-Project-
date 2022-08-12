<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Theme_Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Record;
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

    public function create($id, Request $request)
    {
        $course = Course::find($id); //Получаем ID курса, на который хотим записаться

        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        foreach ($course->theme_courses as $theme_course) { //Если пользователь подписался, создаём для него бланки для ответов с нулевыми значениями.
            foreach ($theme_course->lessons as $lesson) {
                DB::table('records')->insert([
                    [
                        'user_id' => $user,
                        'lesson_id' => $lesson->id,
                        'status' => '0'
                    ]
                ]);
            }
        }

        $course->users()->attach($user);

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
        $user = User::find($id);

        $records = DB::table('course_user')->select('id', 'user_id', 'course_id')->get();

        foreach ($records as $record) {
            if ($user->id == $record->user_id) {
                $course = $record->course_id;
            }
        }

        $user->courses()->detach($course);

        return redirect()->route('courses.index')
                    ->with('success','Пользователь снят с курса');
    }

    public function teacherUserRecords()
    {
        $usersAll = User::all();

        $courses = Course::all();


        return view('admin.courses.records',compact('courses','usersAll'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'course_id' => 'required',
            // 'user_id' => 'required',
        ]);

        $records = DB::table('course_user')->select('id', 'user_id', 'course_id')->get();

        $course_id = $request->input('course_id');

        $user_id = $request->input('selectUsers');

        foreach ($user_id as $key => $user) {
            DB::table('course_user')->insert([
                [
                    'course_id' => $course_id,
                    'user_id' => $user
                ]
            ]);
        }
        return redirect()->route('courses.index')
                         ->with('success','Пользователь добавлен');
    }
}
