<?php

namespace App\Http\Controllers;

use App\Traits\ResponseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionSearchController extends Controller
{
    use ResponseRequest;

    public function filter(Request $request){
        $query=$this->query();
        $questions=$query->orderByDesc("id")->paginate(100);

        $school_grades=DB::table("school_grades")->get();
        $units=DB::table("units")->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        if($request->has('name') and strlen($request->input("name"))>0 and !$request->has("school_grade") and
        !$request->has("unit")){
            $questions=$query->where("questions.name","LIKE","%". $request->input("name") ."%")->orderByDesc("id")->paginate(100);
        }elseif(strlen($request->input("name"))>0 and $request->has("school_grade") and !$request->has("unit")){
            $questions=$query->where("questions.name","LIKE","%". $request->input("name") ."%")
            ->where("questions.school_grade_id","=",$request->input("school_grade"))->orderByDesc("id")->paginate(100);
        }elseif(strlen($request->input("name"))>0 and $request->has("unit") and !$request->has("school_grade")){
            $questions=$query->where("questions.name","LIKE","%". $request->input("name") ."%")
            ->where("questions.unit_id","=",$request->input("unit"))->orderByDesc("id")->paginate(100);
        }elseif(strlen($request->input("name"))>0 and $request->has("unit") and $request->has("school_grade")){
            $questions=$query->where("questions.name","LIKE","%". $request->input("name") ."%")->
            where("questions.unit_id","=",$request->input("unit"))
            ->where("questions.school_grade_id","=",$request->input("school_grade"))->orderByDesc("id")->paginate(100);
        }elseif(strlen($request->input("name"))==0 and $request->input("unit")>0 and $request->input("school_grade")>0){
            $questions=$query->where("questions.unit_id","=",$request->input("unit"))
            ->where("questions.school_grade_id","=",$request->input("school_grade"))->orderByDesc("id")->paginate(100);
        }elseif(strlen($request->input("name"))==0 and $request->input("unit")>0 and $request->input("school_grade") == 0){
            $questions=$query->where("questions.unit_id","=",$request->input("unit"))
            ->orderByDesc("id")->paginate(100);
        }elseif(strlen($request->input("name"))==0 and !$request->has("unit") and $request->has("school_grade")){
            $questions=$query->where("questions.school_grade_id","=",$request->input("school_grade"))->orderByDesc("id")->paginate(100);
        }elseif(strlen($request->input("name"))==0 and $request->input("unit")==0 and $request->input("school_grade")>0){
            $questions=$query->where("questions.school_grade_id","=",$request->input("school_grade"))->orderByDesc("id")->paginate(100);
        }

        return view("Teacher.questions.search",compact("questions",'school_grades','units'));
    }

    public function query(){
        $query=DB::table('questions')
        ->join('school_grades', 'questions.school_grade_id', '=', 'school_grades.id')
        ->join('subjects', 'questions.subject_id', '=', 'subjects.id')
        ->join('units', 'questions.unit_id', '=', 'units.id')
        ->select('questions.*', 'subjects.title as subject_name','units.title as unit_name', 'school_grades.name as school_grade')
        ->where("questions.teacher_id","=",Auth::guard('teacher')->user()->id);

        return $query;
    }
}

