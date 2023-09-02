<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Exam extends Component
{
    public $user_id,$exam_id;
    public function render()
    {
        $questions=DB::table("question_exams")->join("questions","questions.id","=","question_exams.question_id")
        ->join("exams","exams.id","=","question_exams.exam_id")
        ->select("questions.name","questions.chooses","questions.answer")->get();

        $data["count"]=count($questions);
        $data["questions"]=$questions;

        return view('livewire.exam',compact("data"));
    }

    public function send_exam(){
        return dd("ahmed");
    }
}
