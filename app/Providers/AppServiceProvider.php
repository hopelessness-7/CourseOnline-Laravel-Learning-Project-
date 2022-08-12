<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Theme_Course;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot(Request $request)
    {
        Paginator::useBootstrap();
        // Формирование нашего меню
        $dataCategorieAll = DB::table('categories')->select('id', 'title')->get();
        view()->share('website_name', $dataCategorieAll);

        $dataCourseAll = DB::table('courses')->select('id','title', 'categorie_id', 'description')->get();
        view()->share('website', $dataCourseAll);

        $dataThemeCourseAll = DB::table('theme_courses')->select('id','title', 'course_id')->get();
        view()->share('them', $dataThemeCourseAll);

        $dataLessonAll = DB::table('lessons')->select('id','title', 'theme_course_id', 'description')->get();
        view()->share('les', $dataLessonAll);

        $dataRecordAll = DB::table('course_user')->select('id', 'user_id', 'course_id')->get();
        view()->share('records', $dataRecordAll);

        $dataUserAll = DB::table('users')->select('id', 'name', 'email')->get();
        view()->share('usered', $dataUserAll);

        $dataTaskAll = DB::table('records')->select('id', 'user_id', 'lesson_id', 'status', 'reply')->get();
        view()->share('zapis', $dataTaskAll);

    }
}
