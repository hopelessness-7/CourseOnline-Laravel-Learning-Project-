<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\Theme_courseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserCourseController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/course/{id}', [CourseController::class, 'show']);

Route::get('/user/course/preview/{id}', [UserCourseController::class, 'preview']);
Route::get('/user/myCourse/{id}', [UserCourseController::class, 'show']);
Route::get('/user/course/{id}', [UserCourseController::class, 'create'])->name('record');
Route::get('/user/course/theme/{id}', [UserCourseController::class, 'themes'])->name('theme');
Route::get('/user/course/{c_id}/theme/{t_id}/lesson/{id}', [UserCourseController::class, 'themes'])->name('lesson');

Route::get('/course/user/{id}', [UserCourseController::class, 'removeUser'])->name('delete');
Route::get('/record', [UserCourseController::class, 'teacherUserRecords'])->name('show');
Route::post('/create', [UserCourseController::class, 'store'])->name('create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
    // Route::resource('roles', RoleController::class);
    Route::prefix('admin')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategorieController::class);
        Route::resource('courses', CourseController::class)->except(['show']);
        Route::resource('theme_courses', Theme_courseController::class);
        Route::resource('lessons', LessonController::class);
    });
});

Route::prefix('user')->group(function () {
    Route::get('course', [UserCourseController::class, 'index']);

});
