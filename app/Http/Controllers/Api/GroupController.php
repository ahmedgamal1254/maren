<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\ResponseRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    use ResponseRequest;
    public function index(){
        $school_grades=DB::table("class_studies")->select("id","group_name")->get();

        return $this->make_response($school_grades,200);
    }
}
