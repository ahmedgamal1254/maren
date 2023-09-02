<?php

use App\Http\Middleware\AuthMobileTeacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthMobileController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\LessonController as ApiLessonController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\PostController as ApiPostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SchoolGradeController;
use App\Http\Controllers\Api\TeacherAuthMobileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
*/
Route::get("school_grades",[SchoolGradeController::class,'index']);
Route::get("groups",[GroupController::class,'index']);

Route::group([
    'middleware' => 'auth_user',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/logout', [AuthMobileController::class, 'logout']);
    Route::post('/refresh', [AuthMobileController::class, 'refresh']);
    Route::get('/user-profile', [AuthMobileController::class, 'userProfile']);
});

Route::group([
    'middleware' => 'auth_user',
], function ($router) {
    Route::get('/posts', [ApiPostController::class, 'index']);
    Route::get('/post/{id}', [ApiPostController::class, 'show']);
});

Route::group([
    'middleware' => 'auth_user',
], function ($router) {
    Route::get('/lessons', [ApiLessonController::class, 'index']);
    Route::get('/lesson/{id}', [ApiLessonController::class, 'show']);
});

Route::group([
    'middleware' => 'auth_user',
], function ($router) {
    Route::get('/books', [MediaController::class, 'index']);
    Route::get('/book/{id}', [MediaController::class, 'show']);
});

Route::group([
    'middleware' => 'auth_user',
], function ($router) {
    Route::get('/exams', [ExamController::class, 'index']);
    Route::get('/exam/{id}', [ExamController::class, 'show']);
    Route::post('/send_exam', [ExamController::class, 'send_exam']);
    Route::get('/exam/{id}/show_results', [ExamController::class, 'show_exam_results']);
});

Route::group([
    'middleware' => 'auth_user'
], function ($router){
    Route::get("/profile",[ProfileController::class,'index']);
});

Route::group([
    'prefix' => 'auth'
],function ($router) {
    Route::post('/login', [AuthMobileController::class, 'login']);
    Route::post('/register', [AuthMobileController::class, 'register']);
});

// teacher dashboard
Route::group([
    'middleware' => 'auth:api_teacher',
    'prefix' => 'auth-teacher'

], function ($router) {
    Route::post('/login', [TeacherAuthMobileController::class, 'login']);
    Route::post('/logout', [TeacherAuthMobileController::class, 'logout']);
    Route::post('/refresh', [TeacherAuthMobileController::class, 'refresh']);
    Route::get('/user-profile', [TeacherAuthMobileController::class, 'userProfile']);
});

Route::group([
    'middleware' =>'guest:api_teacher',
    'prefix' => 'auth-teacher'
],function ($router) {
    Route::post('/login', [TeacherAuthMobileController::class, 'login']);
});
