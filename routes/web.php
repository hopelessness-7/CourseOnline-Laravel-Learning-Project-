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

// Route::get('/course/{id}', [CourseController::class, 'show']);

Auth::routes();

Route::middleware(['role:admin|teacher'])->prefix('admin')->group(function () {

    Route::get('/dashboardAdmin', function () {
        return view('layouts.adminPanel');
    });

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategorieController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('theme_courses', Theme_courseController::class);
    Route::resource('lessons', LessonController::class);
});

Route::middleware(['role:user'])->prefix('user')->group(function () {

    Route::get('/dashboardUser', function () {
        return view('layouts.userPanel');
    });
    Route::get('/course/preview/{id}', [UserCourseController::class, 'preview']);
    Route::get('/myCourse/{id}', [UserCourseController::class, 'show']);
    Route::get('/course/{id}', [UserCourseController::class, 'create'])->name('record');
    Route::get('/course/theme/{id}', [UserCourseController::class, 'themes'])->name('theme');
    Route::get('/course/{c_id}/theme/{t_id}/lesson/{id}', [UserCourseController::class, 'themes'])->name('lesson');

});

