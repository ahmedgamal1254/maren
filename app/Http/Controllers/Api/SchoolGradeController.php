<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ResponseRequest;


class SchoolGradeController extends Controller
{
    use ResponseRequest;

    public function index(){
        $school_grades=DB::table("school_grades")->select("id","name")->get();

        return $this->make_response($school_grades,200);
    }
}
