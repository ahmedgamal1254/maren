<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\DB;
use App\Traits\ResponseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MediaController extends Controller
{
    use ResponseRequest;
    public function index(){
        $books=DB::table("media")->select("*")->
        where("school_grade_id","=",Auth::guard('api')->user()->school_grade_id)->get();

        return $this->make_response(BookResource::collection($books),200);
    }

    public function show($id){
        $book=DB::table("media")->select("*")->
        where("school_grade_id","=",Auth::guard('api')->user()->school_grade_id)->where("id","=",$id)->first();

        return $this->make_response(new BookResource($book),200);
    }
}
