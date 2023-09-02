<?php
use App\Http\Controllers\{
    ProfileController,
    SchoolGradeController,
    SubjectController,
    GroupController,
    ExamController,
    LessonController,
    PostController,
    TeacherController,
    MediaController,
    MonthController,
    QuestionController,
    QuestionExamController,
    Month\IndexController,
    PaymentController,
    QuestionFilterController,
    QuestionSearchController,
    UnitController
};

use App\Http\Controllers\Teacher\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Teacher\StudentTeacherController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\ClassStudy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\SocilaiteController;
use App\Http\Controllers\Month\ExamController as MonthExamController;
use App\Http\Controllers\Video\UploadController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/',[StudentController::class,'index']);
});

require __DIR__.'/auth.php';

// Auth Socilaite App Twitter and Google, facebook
Route::name('socilaite.')->controller(SocilaiteController::class)->group(function (){
    Route::get("auth/{provider}/login",'login')->name('social_login');
    Route::get("{provider}/redirect",'redirect')->name('redirect');
});

Route::middleware(['guest:teacher','guest'])->group(function () {
    Route::get("teacher/login",[AuthenticatedSessionController::class,'create'])->name("teacher.login");
    Route::post("teacher/store",[AuthenticatedSessionController::class,'store'])->name("teacher.store");
});

// teacher dashboard
Route::middleware(['teacher'])->group(function () {
    Route::get('/teacher',[TeacherController::class,'index'])->name("teacher");
    Route::get('/teacher/profile/',[TeacherController::class,'profile'])->name("teacher.profile");
    Route::post('/teacher/upload/image',[TeacherController::class,'ajax_uplade_image'])->name("ajax_upload_image");

    Route::post("teacher/destroy",[AuthenticatedSessionController::class,'destroy'])->name("teacher.destroy");
    Route::get("teacher/posts/show/{id}",[AuthenticatedSessionController::class,'show'])->name("posts.show");
    Route::get("teacher/posts/edit/{id}",[AuthenticatedSessionController::class,'show'])->name("posts.edit");
    Route::post("teacher/posts/post",[AuthenticatedSessionController::class,'show'])->name("posts.destroy");
});

// school grade
Route::middleware(['teacher'])->group(function () {
    Route::get("teachers/school_grade",[SchoolGradeController::class,'index'])->name("school_grade");
    Route::get("teachers/school_grade/{school_grade_id}/users",[SchoolGradeController::class,'students'])->name("school_grade.students");
    Route::get("teachers/school_grade/{school_grade_id}/groups",[SchoolGradeController::class,'groups'])->name("school_grade.groups");
    Route::get("teachers/school_grade/edit/{id}",[SchoolGradeController::class,'edit'])->name("school_grade.edit");
    Route::post("teachers/school_grade/update",[SchoolGradeController::class,'update'])->name("school_grade.update");
    Route::get("teachers/school_grade/show/{id}",[SchoolGradeController::class,'show'])->name("school_grade.show");
    Route::get("teachers/school_grade/add",[SchoolGradeController::class,'create'])->name("school_grade.add");
    Route::post("teachers/school_grade/store",[SchoolGradeController::class,'store'])->name("school_grade.store");
    Route::get("teachers/school_grade/delete/{id}",[SchoolGradeController::class,'destroy'])->name("school_grade.destroy");
});

// Subject
Route::middleware(['teacher'])->group(function () {
    Route::get("teachers/subject",[SubjectController::class,'index'])->name("subject");
    Route::get("teachers/subject/edit/{id}",[SubjectController::class,'edit'])->name("subject.edit");
    Route::post("teachers/subject/update",[SubjectController::class,'update'])->name("subject.update");
    Route::get("teachers/subject/show/{id}",[SubjectController::class,'show'])->name("subject.show");
    Route::get("teachers/subject/add",[SubjectController::class,'create'])->name("subject.add");
    Route::post("teachers/subject/store",[SubjectController::class,'store'])->name("subject.store");
    Route::get("teachers/subject/delete/{id}",[SubjectController::class,'destroy'])->name("subject.destroy");
});

// classes
Route::middleware(['teacher'])->group(function () {
    Route::get("teachers/class",[GroupController::class,'index'])->name("class");
    Route::get("teachers/groups/{group_id}/users",[GroupController::class,'students'])->name("group.students");
    Route::get("teachers/class/edit/{id}",[GroupController::class,'edit'])->name("class.edit");
    Route::post("teachers/class/update",[GroupController::class,'update'])->name("class.update");
    Route::get("teachers/class/show/{id}",[GroupController::class,'show'])->name("class.show");
    Route::get("teachers/class/add",[GroupController::class,'create'])->name("class.add");
    Route::post("teachers/class/store",[GroupController::class,'store'])->name("class.store");
    Route::get("teachers/class/delete/{id}",[GroupController::class,'destroy'])->name("class.destroy");
});

// posts
Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/posts",[PostController::class,'index'])->name("posts");
    Route::get("teacher/post/edit/{id}",[PostController::class,'edit'])->name("post.edit");
    Route::post("teacher/post/update",[PostController::class,'update'])->name("post.update");
    Route::get("teacher/post/show/{id}",[PostController::class,'show'])->name("post.show");
    Route::get("teacher/post/add",[PostController::class,'create'])->name("post.add");
    Route::post("teacher/post/store",[PostController::class,'store'])->name("post.store");
    Route::get("teacher/post/delete/{id}",[PostController::class,'destroy'])->name("post.destroy");
});

// lessons
Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/lessons",[LessonController::class,'index'])->name("lessons");
    Route::get("teacher/lesson/edit/{id}",[LessonController::class,'edit'])->name("lesson.edit");
    Route::post("teacher/lesson/update",[LessonController::class,'update'])->name("lesson.update");
    Route::get("teacher/lesson/show/{id}",[LessonController::class,'show'])->name("lesson.show");
    Route::get("teacher/lesson/add",[LessonController::class,'create'])->name("lesson.add");
    Route::post("teacher/lesson/store",[LessonController::class,'store'])->name("lesson.store");
    Route::get("teacher/lesson/delete/{id}",[LessonController::class,'destroy'])->name("lesson.destroy");
});

// units
Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/units",[UnitController::class,'index'])->name("units");
    Route::get("teacher/unit/edit/{id}",[UnitController::class,'edit'])->name("unit.edit");
    Route::get("teacher/units/search",[UnitController::class,'search'])->name("unit.search");
    Route::post("teacher/unit/update",[UnitController::class,'update'])->name("unit.update");
    Route::get("teacher/unit/show/{id}",[UnitController::class,'show'])->name("unit.show");
    Route::get("teacher/unit/add",[UnitController::class,'create'])->name("unit.add");
    Route::post("teacher/unit/store",[UnitController::class,'store'])->name("unit.store");
    Route::get("teacher/unit/delete/{id}",[UnitController::class,'destroy'])->name("unit.destroy");
});

// books and summaries
Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/books",[MediaController::class,'index'])->name("books");
    Route::get("teacher/book/edit/{id}",[MediaController::class,'edit'])->name("book.edit");
    Route::post("teacher/book/update",[MediaController::class,'update'])->name("book.update");
    Route::get("teacher/book/show/{id}",[MediaController::class,'show'])->name("book.show");
    Route::get("teacher/book/add",[MediaController::class,'create'])->name("book.add");
    Route::post("teacher/book/store",[MediaController::class,'store'])->name("book.store");
    Route::get("teacher/book/delete/{id}",[MediaController::class,'destroy'])->name("book.destroy");
});

// questions
Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/questions",[QuestionController::class,'index'])->name("questions");
    Route::get("teacher/question/edit/{id}",[QuestionController::class,'edit'])->name("question.edit");
    Route::post("teacher/question/update",[QuestionController::class,'update'])->name("question.update");
    Route::get("teacher/question/show/{id}",[QuestionController::class,'show'])->name("question.show");
    Route::get("teacher/question/add",[QuestionController::class,'create'])->name("question.add");
    Route::post("teacher/question/store",[QuestionController::class,'store'])->name("question.store");
    Route::get("teacher/question/delete/{id}",[QuestionController::class,'destroy'])->name("question.destroy");
    Route::get("teacher/question/search",[QuestionFilterController::class,'filter']);
    Route::get("teacher/questions/search",[QuestionSearchController::class,'filter'])->name("search_questins");
    Route::get("teacher/question/search/name",[QuestionFilterController::class,'filter_name']);
});

// Exams
Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/exams",[ExamController::class,'index'])->name("exams");
    Route::get("teacher/exam/edit/{id}",[ExamController::class,'edit'])->name("exam.edit");
    Route::post("teacher/exam/update",[ExamController::class,'update'])->name("exam.update");
    Route::get("teacher/exam/show/{id}",[ExamController::class,'show'])->name("exam.show");
    Route::get("teacher/exam/add",[ExamController::class,'create'])->name("exam.add");
    Route::post("teacher/exam/store",[ExamController::class,'store'])->name("exam.store");
    Route::get("teacher/exam/delete/{id}",[ExamController::class,'destroy'])->name("exam.destroy");
});

// Exam and Questions
Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/exam/{id}/questions",[QuestionExamController::class,'create'])->name("add_questions");
    Route::post("teacher/exam/store/questions",[QuestionExamController::class,'store'])->name("store_questions");
    Route::post("teacher/exam/questions/store",[QuestionExamController::class,'store_ajax'])->name("store_ajax_student");
    Route::post("teacher/exam/question/store",[QuestionExamController::class,'store_ajax_question'])->name("store_ajax_question");
});

// months
Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/show/months",[MonthController::class,'index'])->name("show_months");
    Route::get("teacher/set_state/months/{id}",[MonthController::class,'set_state'])->name("state");
    Route::get("teacher/refreach/months",[MonthController::class,'migrate_months'])->name("refresh_months");
});

// students
Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/student/add",[StudentTeacherController::class,'add_student'])->name("students.add");
    Route::post("teacher/student/store",[StudentTeacherController::class,'save_student'])->name("students.store");
    Route::get("teacher/student/edit/{id}",[StudentTeacherController::class,'edit_student'])->name("students.edit");
    Route::post("teacher/student/update",[StudentTeacherController::class,'update_student'])->name("students.update");
    Route::get("teacher/students",[StudentTeacherController::class,'index'])->name("students");
    Route::get("teacher/students/search",[StudentTeacherController::class,'search'])->name("students.search");
    Route::get("teacher/students/filter",[StudentTeacherController::class,'filter'])->name("students.filter");
    Route::get("teacher/students/points",[StudentTeacherController::class,'students_points'])->name("students.points");
    Route::post("teacher/student/point",[StudentTeacherController::class,'update_points'])->name("update.points");
});

// public profile
Route::get("student/{id}",[StudentTeacherController::class,'show'])->name("students.show");

/***
 * Routes for students
 * Auth General
 * Dashboard
 * Teacher and Toggle between him
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[StudentController::class,'index'])->name('student_dashboard');
    Route::get('/dashboard/student/teacher/{id}',[StudentController::class,'teacher'])->name('student_teacher');
    Route::get('/dashboard/student/subjects/update',[StudentController::class,'add'])->name("student.add_subjects");
    Route::post('/student/store/subjects',[StudentController::class,'store'])->name("save_school_grade");
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/unlock',[StudentController::class,'unlock_month'])->name('unlock_month');
});


/**
 * Books,Posts,Exams,Videos
 * for student and select teacher
 * example
 * student ==> ahmed
 * teacher ==> ali from id
*/
// months home page
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/teacher/{teacher_id}/month/{id}',[IndexController::class,'index'])->name("month_page");
    Route::get('/dashboard/teacher/{teacher_id}/month/{id}/lessons',[IndexController::class,'lessons'])->name("month_page_lessons");
    Route::get('/dashboard/teacher/{teacher_id}/month/{id}/lesson/{lesson_id}',[IndexController::class,'lesson_show'])
    ->name("month_page_lessons.id");
    Route::get('/dashboard/teacher/{teacher_id}/month/{id}/books',[IndexController::class,'books'])->name("month_page_books");
    Route::get('/dashboard/teacher/{teacher_id}/month/{month_id}/posts',[IndexController::class,'posts'])
    ->name("posts_student_teacher");
    Route::get('/dashboard/teacher/{teacher_id}/month/{month_id}/post/{id}',[IndexController::class,'show_post'])
    ->name("posts_student_teacher.id");
});

// exam pages
Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard/teacher/{teacher_id}/month/{id}/exams',[MonthExamController::class,'exams'])->name("month_page_exam");
    Route::get('/dashboard/teacher/{teacher_id}/month/{month_id}/exam/{id}',[MonthExamController::class,'show_exam'])->name("month_page_exam.id");
    Route::post('/dashboard/teacher/exam/correct',[MonthExamController::class,'send_exam'])->name("exam_correct");
    Route::get('/dashboard/teacher/exam/result',[MonthExamController::class,'result'])->name("exam_result");
    Route::get('/dashboard/tacher/{teacher_id}/month/{month_id}/exam/result/{id}',[MonthExamController::class,'results'])->name("exam_results");
});

Route::middleware(['auth'])->group(function () {

});

// public profile
Route::get('public/profile/{id}/user',[ProfileController::class,'profile_public'])->name("public_profile");

Route::middleware(['teacher'])->group(function (){
    Route::get('/teacher/video/{id}/file-upload', [UploadController::class, 'index'])->name('files.index');
    Route::post('file-upload/upload-large-files', [UploadController::class, 'upload'])->name('chunk.store');
});

// User Profile
Route::middleware(['auth'])->group(function () {
    Route::get("/profile",[ProfileController::class,'index'])->name("user-profile");
    Route::get("/profile/edit",[ProfileController::class,'edit'])->name("profile.edit");
    Route::post("/profile/store",[ProfileController::class,'store'])->name("profile.store");
});


// payment users and teacher
Route::middleware(['auth'])->group(function (){
    Route::get('/student/teacher/{id}/payment',[PaymentController::class,'create'])->name("payments");
    Route::post('/student/teacher/{id}/payment/store',[PaymentController::class,'store'])->name("payments.store");
});

Route::middleware(['teacher'])->group(function () {
    Route::get("teacher/payments",[PaymentController::class,'index'])->name("all_payments");
    Route::get("teacher/payments/show/{id}",[PaymentController::class,'show'])->name("single_payment");
    Route::post("teacher/student/payment/store",[PaymentController::class,'points_update'])->name("points_update");
});
