<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;
use App\Models\Course;
use App\Models\Theme_Course;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // Формирование нашего меню
        $dataCategorieAll = DB::table('categories')->select('id', 'title')->get();
        view()->share('website_name', $dataCategorieAll);

        $dataCourseAll = DB::table('courses')->select('id','title', 'categorie_id')->get();
        view()->share('website', $dataCourseAll);

        $dataThemeCourseAll = DB::table('theme_courses')->select('id','title', 'course_id')->get();
        view()->share('them', $dataThemeCourseAll);

        $dataLessonAll = DB::table('lessons')->select('id','title', 'theme_course_id', 'description')->get();
        view()->share('les', $dataLessonAll);

        $dataRecordAll = DB::table('course_user')->select('id', 'user_id', 'course_id')->get();
        view()->share('records', $dataRecordAll);
    }
}
