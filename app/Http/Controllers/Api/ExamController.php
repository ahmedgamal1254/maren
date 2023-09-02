<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ResponseRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\{ExamStudent,Question_Exam_Student};
class ExamController extends Controller
{
    use ResponseRequest;

    public function index(){
        $exams=DB::table('exams')->where("school_grade_id","=",Auth::guard('api')->user()->school_grade_id)->get();

        return $this->make_response($exams,200);
    }

    public function show($id){
        $questions=DB::table("question_exams")->join("questions","questions.id","=","question_exams.question_id")
            ->join("exams","exams.id","=","question_exams.exam_id")
            ->select("questions.name","questions.id","questions.chooses","questions.answer","exams.teacher_id as teacher_id")
            ->where("question_exams.exam_id","=",$id)->get();

            $data["count"]=count($questions);
        $data["questions"]=$questions;
        $data["exam_id"]=$id;

        return $this->make_response($data,200);
    }

    public function send_exam(Request $request){
        // extract all request which pattern question
        foreach($request->all() as $key => $value){
            if(str_contains($key, 'answer')){
                $questionId = substr($key, strlen('question_answer_'));

                $question=$this->count_question($request->exam_id,$questionId);

                if($question == 0){
                    //store question and answer in Question_Exam_Student
                    $question_exam_student=new Question_Exam_Student();
                    $question_exam_student->exam_id=$request->exam_id;
                    $question_exam_student->user_id=Auth::guard('api')->user()->id;
                    $question_exam_student->student_answer=$value;
                    $question_exam_student->question_id =$questionId;
                    $question_exam_student->teacher_id=$request->teacher_id;
                    $question_exam_student->school_grade_id=Auth::guard('api')->user()->school_grade_id;
                    $question_exam_student->save();
                }else{
                    $question_exam_student=Question_Exam_Student::find($question);
                    $question_exam_student->exam_id=$request->exam_id;
                    $question_exam_student->user_id=Auth::guard('api')->user()->id;
                    $question_exam_student->student_answer=$value;
                    $question_exam_student->question_id =$questionId;
                    $question_exam_student->teacher_id=$request->teacher_id;
                    $question_exam_student->school_grade_id=Auth::guard('api')->user()->school_grade_id;
                    $question_exam_student->save();
                }
            }
        }

        // collect degree
        $exam_student=DB::table("question_exam_students")->join("questions","questions.id","=","question_exam_students.question_id")
        ->select("questions.answer","question_exam_students.student_answer")
        ->where("question_exam_students.exam_id","=",$request->exam_id)
        ->where("question_exam_students.user_id","=",Auth::guard('api')->user()->id)->get();

        // return response($exam_student);
        $degree=0;
        foreach ($exam_student as $value) {
            if($value->answer==$value->student_answer){
                $degree+=1;
            }
        }


        // store or update degre of exam
        $student_degree=DB::table('exam_student')->where("user_id","=",Auth::guard('api')->user()->id)
        ->where("exam_id","=",$request->exam_id)->first();

        if($student_degree == null){
            $exam=new ExamStudent();
            $exam->user_id=Auth::guard('api')->user()->id;
            $exam->exam_id=$request->exam_id;
            $exam->status=0;
            $exam->degree=$degree;
            $exam->total=count($exam_student);
            $exam->save();
        }

        $data["status"]=true;
        $data["congrats"]="تم اجراء الامتحان بنجاح";
        $data["degree"]=$degree;
        $data["total"]=count($exam_student);
        $data["percent"]=round(($degree/count($exam_student))*100,2);
        $data["teacher_id"]=$request->teacher_id;

        return $this->make_response($data,200);
    }

    public function count_question($exam_id,$question_id){
        $question=Question_Exam_Student::where("exam_id","=",$exam_id)->where("question_id","=",$question_id)
        ->where("user_id","=",Auth::guard('api')->user()->id)->first();

        if($question == null){
            return 0;
        }else{
            return $question->id;
        }
    }


    public function show_exam_results($id){
        $questions=DB::table('question_exam_students')->join('questions','questions.id',"=","question_exam_students.question_id")
        ->join("users","users.id","=","question_exam_students.user_id")
        ->select('questions.id','question_exam_students.student_answer',
        'question_exam_students.exam_id', 'questions.name','questions.answer','questions.chooses','users.id as user_id')
        ->where("users.id","=",Auth::guard('api')->user()->id)->where('question_exam_students.exam_id',"=",$id)->get();

        return $this->make_response($questions,200);
    }
}
