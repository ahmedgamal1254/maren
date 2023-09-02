<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Traits\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    use Upload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=DB::table('posts')
            ->join('school_grades', 'posts.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'posts.subject_id', '=', 'subjects.id')
            ->select('posts.*', 'subjects.title as subject_name', 'school_grades.name as school_grade')
            ->where("posts.teacher_id","=",Auth::guard('teacher')->user()->id)
            ->orderByDesc("id")->take(5)->get();

        $lessons=DB::table('lessons')
            ->join('school_grades', 'lessons.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'lessons.subject_id', '=', 'subjects.id')
            ->select('lessons.*', 'subjects.title as subject_name', 'school_grades.name as school_grade')
            ->where("lessons.teacher_id","=",Auth::guard("teacher")->user()->id)
            ->orderByDesc("id")->take(5)->get();

        $exams=DB::table('exams')
            ->join('school_grades', 'exams.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->select('exams.*', 'subjects.title as subject_name', 'school_grades.name as school_grade')
            ->where("exams.teacher_id","=",Auth::guard("teacher")->user()->id)
            ->orderByDesc("id")->take(5)->get();

        return view("Teacher.dashboard",compact("posts","lessons","exams"));
    }

    public function profile(){
        return view("Teacher.teacher_profile");
    }

    public function ajax_uplade_image(Request $request){
        $file=Null;
        if($request->file("img")){
            // image upload name must img
            $file=$this->image_upload($request,'teachers');

            $teacher=Teacher::find($request->id);
            $teacher->img_url=$file;
            $teacher->save();
        }

        return redirect()->route("teacher.profile");
    }
}
