<?php

namespace App\Http\Controllers\Month;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;

class IndexController extends Controller
{
    public function index(Request $request,$teacher_id,$id){
        // check if auth id and month id identical
        // if not return user to dashboard
        $value=DB::table('month_student')->where("user_id","=",Auth::user()->id)->where("month_id","=",$id)->count();

        if($value > 0){
            $month=DB::table("months")->where("id","=",$id)->first();

            // extract year and month
            $month_date=explode("-",$month->month_date);

            // year and month
            $year=$month_date[0];
            $month_num=$month_date[1];

            // lessons
            $lessons=DB::select('SELECT * FROM lessons WHERE year(date_show) = ?
            AND month(date_show) = ? AND school_grade_id = ? AND teacher_id=?;',[$year,$month_num,Auth::user()->school_grade_id,$teacher_id]);

            // media
            $videos=DB::select('SELECT * FROM media WHERE year(date_show) = ? AND month(date_show) = ?
            AND school_grade_id = ? AND teacher_id=?;',
            [$year,$month_num,Auth::user()->school_grade_id,$teacher_id]);

            // return $teacher
            $teacher=Teacher::where("id","=",$teacher_id)->first();

            // array of data (lessons , videos , exams , month , teacher_id , month_id)
            $data["lessons"]=$lessons;
            $data["videos"]=$videos;
            $data["month"]=$month;
            $data["teacher_id"]=$teacher_id;
            $data["month_id"]=$id;

            return view("student.month",compact("data","teacher"));
        }else{
            return redirect()->route("student_dashboard");
        }
    }

    public function lessons($teacher_id,$id){
        // check if auth id and month id identical
        // if not return user to dashboard
        $value=DB::table('month_student')->where("user_id","=",Auth::user()->id)->where("month_id","=",$id)->count();

        if($value > 0){
            $month=DB::table("months")->where("id","=",$id)->first();

            // extract year and month
            $month_date=explode("-",$month->month_date);

            // year and month
            $year=$month_date[0];
            $month_num=$month_date[1];

            // lessons
            $lessons=DB::table("lessons")->select('lessons.*')->whereYear('date_show','=',$year)
            ->whereMonth('date_show','=',$month_num)->where('school_grade_id','=',Auth::user()->school_grade_id)
            ->where('teacher_id','=',$teacher_id)->get();

            // return $teacher
            $teacher=Teacher::where("id","=",$teacher_id)->first();

            // array of data (lessons , videos , exams , month , teacher_id , month_id)
            $data["lessons"]=$lessons;
            $data["month"]=$month;
            $data["teacher_id"]=$teacher_id;
            $data["month_id"]=$id;

            return view("student.lessons.index",compact("data","teacher"));
        }else{
            return redirect()->route("student_dashboard");
        }
    }

    public function books($teacher_id,$id){
        // check if auth id and month id identical
        // if not return user to dashboard
        $value=DB::table('month_student')->where("user_id","=",Auth::user()->id)->where("month_id","=",$id)->count();

        if($value > 0){
            $month=DB::table("months")->where("id","=",$id)->first();

            // extract year and month
            $month_date=explode("-",$month->month_date);

            // year and month
            $year=$month_date[0];
            $month_num=$month_date[1];

            // lessons
            $books=DB::table("media")->select('media.*')->whereYear('date_show','=',$year)
            ->whereMonth('date_show','=',$month_num)->where('school_grade_id','=',Auth::user()->school_grade_id)
            ->where('teacher_id','=',$teacher_id)->get();

            // return $teacher
            $teacher=Teacher::where("id","=",$teacher_id)->first();

            // array of data (lessons , videos , exams , month , teacher_id , month_id)
            $data["books"]=$books;
            $data["month"]=$month;
            $data["teacher_id"]=$teacher_id;
            $data["month_id"]=$id;

            return view("student.books.index",compact("data","teacher"));
        }else{
            return redirect()->route("student_dashboard");
        }
    }

    public function lesson_show($teacher_id,$id,$lesson_id){
        // check if auth id and month id identical
        // if not return user to dashboard
        $value=DB::table('month_student')->where("user_id","=",Auth::user()->id)->where("month_id","=",$id)->count();

        if($value > 0){
            $month=DB::table("months")->where("id","=",$id)->first();

            // extract year and month
            $month_date=explode("-",$month->month_date);

            // year and month
            $year=$month_date[0];
            $month_num=$month_date[1];

            // lessons
            $lesson=DB::table("lessons")->select('lessons.*')->whereYear('date_show','=',$year)
            ->whereMonth('date_show','=',$month_num)->where('school_grade_id','=',Auth::user()->school_grade_id)
            ->where('teacher_id','=',$teacher_id)->where('id','=',$lesson_id)->first();

            // return $teacher
            $teacher=Teacher::where("id","=",$teacher_id)->first();


            // array of data (lessons , videos , exams , month , teacher_id , month_id)
            $data["lesson"]=$lesson;
            $data["month"]=$month;
            $data["teacher_id"]=$teacher_id;
            $data["month_id"]=$id;

            return view("student.lessons.show",compact("data","teacher"));
        }else{
            return redirect()->route("student_dashboard");
        }
    }

    public function posts($teacher_id,$month_id){
        // posts
        $posts=DB::table("posts")->select('posts.*')->where('school_grade_id','=',Auth::user()->school_grade_id)
        ->where('teacher_id','=',$teacher_id)->get();

        // return $teacher
        $teacher=Teacher::where("id","=",$teacher_id)->first();

        // array of data (lessons , videos , exams , month , teacher_id , month_id)
        $data["posts"]=$posts;
        $data["teacher_id"]=$teacher_id;
        $data["month_id"]=$month_id;

        return view("student.posts.index",compact("data","teacher"));
    }

    public function show_post($teacher_id,$month_id,$id){
        // post
        $post=DB::table("posts")->select('posts.*')->where('school_grade_id','=',Auth::user()->school_grade_id)
        ->where('teacher_id','=',$teacher_id)->where("id","=",$id)->first();

        // return $teacher
        $teacher=Teacher::where("id","=",$teacher_id)->first();

        // array of data (lessons , videos , exams , month , teacher_id , month_id)
        $data["post"]=$post;
        $data["teacher_id"]=$teacher_id;
        $data["month_id"]=$month_id;

        // return $data;
        return view("student.posts.show",compact("data","teacher"));
    }
}
