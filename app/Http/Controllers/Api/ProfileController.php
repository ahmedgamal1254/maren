<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ResponseRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ResponseRequest;
    public function index(){
        $profile=DB::table('users')->join("school_grades","school_grades.id","=","users.school_grade_id")
        ->join("class_studies","class_studies.id","=","group_id")
        ->select("users.*","school_grades.name as school_grade","class_studies.group_name as group")
        ->where("users.id","=",Auth::guard("api")->user()->id)->first();

        $exams=DB::table("exam_student")->join("exams","exams.id","=","exam_student.exam_id")
        ->select("exams.code","exams.duration","exams.date_exam as exam_day","exam_student.degree as degree","exam_student.total as total_degree")
        ->where("exam_student.user_id","=",Auth::guard("api")->user()->id)->get();

        $data["profile"]=$profile;
        $data["exams"]=$exams;

        return $this->make_response($data,200);
    }
}
