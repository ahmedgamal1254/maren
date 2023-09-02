<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\ResponseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    use ResponseRequest;
    public function index(){
        $lessons=DB::table("lessons")->select("*")->
        where("school_grade_id","=",Auth::guard('api')->user()->school_grade_id)->get();

        return $this->make_response($lessons,200);
    }

    public function show($id){
        $lesson=DB::table("lessons")->select("*")->
        where("school_grade_id","=",Auth::guard('api')->user()->school_grade_id)->where("id","=",$id)->first();

        return $this->make_response($lesson,200);
    }
}
