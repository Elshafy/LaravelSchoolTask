<?php

use App\Http\Controllers\Admin\RegisterController as AdminRegisterController;
use App\Http\Controllers\Admin\SessionsController as AdimnSessionsController;
use App\Http\Controllers\Admin\SchoolController as AdminschoolController;
use App\Http\Controllers\AnalyiseController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SessionsController;
// use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WorkController;
use App\Models\test;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('welcome');
})->middleware('auth');

//admin session
Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminRegisterController::class, 'create'])->middleware('guest');
    Route::post('/register', [AdminRegisterController::class, 'store'])->middleware('guest');

    Route::get('/login', [AdimnSessionsController::class, 'create'])->middleware('guest');
    Route::post('/login', [AdimnSessionsController::class, 'store'])->middleware('guest');
    Route::get('/logout', [AdimnSessionsController::class, 'destroy'])->middleware('auth');
    Route::get('/index', [AdminschoolController::class, 'index'])->middleware('auth');
});


//teacher session
Route::prefix('teacher')->group(function () {
    //! AUTHNTICAT TEACHER
    Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

    Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
    Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

    Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth:teacher');
    Route::middleware(['can:teacher-admin', 'auth:teacher'])->group(function () {

        ################SCHOOL ROUT#################################
        Route::get('index', [SchoolController::class, 'index']);
        Route::get('school/edit/{school}', [SchoolController::class, 'edit']);
        Route::post('school/edit/{school}', [SchoolController::class, 'update']);

        ################TEACHER ROUT#################################
        Route::prefix('/school-teacher/{id}')->group(function () {
            Route::get('/index', [TeacherController::class, 'index']);
            Route::get('/create', [TeacherController::class, 'create']);
            Route::post('/create', [TeacherController::class, 'store']);
            Route::get('/edit/{teacher}', [TeacherController::class, 'edit']);
            Route::post('/edit/{teacher}', [TeacherController::class, 'update']);
            Route::post('/delete/{teacher}', [TeacherController::class, 'destroy']);
        });

        #########################################assign TEACHER##############################
        Route::get('/assign-teacher/{id}/index', [SectionController::class, 'index']);
        Route::get('/assign-teacher/{id}', [SectionController::class, 'edit']);
        Route::post('/assign-teacher/{id}', [SectionController::class, 'update']);
        #########################################assign NUMBER OF STUDENT##############################
        Route::get('/assign-num-student/{id}/index/{section}', [BranchController::class, 'index']);
        Route::get('/assign-num-student/{id}/edit/{section}', [BranchController::class, 'edit']);
        Route::post('/assign-num-student/{id}/edit/{section}', [BranchController::class, 'update']);
        ######################################### WORK OF PERIODES##############################
        Route::get('/work-peroiod/{id}/index/{sid}/{pid}', [WorkController::class, 'index']);
        Route::get('/work-peroiod/{id}/edit/{sid}/{pid}', [WorkController::class, 'edit']);
        Route::post('/work-peroiod/{id}/edit/{sid}/{pid}', [WorkController::class, 'update']);
        ######################################### TEST OF PERIODES##############################
        Route::get('/test-peroiod/{id}/index/{sid}/{pid}', [TestController::class, 'index']);
        Route::get('/test-peroiod/{id}/edit/{sid}/{pid}', [TestController::class, 'edit']);
        Route::post('/test-peroiod/{id}/edit/{sid}/{pid}', [TestController::class, 'update']);
        ######################################### ANALYSIS OF TEST##############################
        Route::get('/test-analyse/{id}/index/{idb}/{idp}', [AnalyiseController::class, 'index']);
        Route::get('/test-analyse/{id}/edit/{idb}/{idp}', [AnalyiseController::class, 'edit']);
        Route::post('/test-analyse/{id}/edit/{idb}/{idp}', [AnalyiseController::class, 'update']);
    });
});
