<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index()
    {
        $questions=DB::table('questions')
        ->join('school_grades', 'questions.school_grade_id', '=', 'school_grades.id')
        ->join('units', 'questions.unit_id', '=', 'units.id')
        ->select('questions.*', 'units.title as unit_name', 'school_grades.name as school_grade')
        ->where("questions.teacher_id","=",Auth::guard('teacher')->user()->id)
        ->orderByDesc("id")
        ->paginate(4);

        $school_grades=DB::table("school_grades")->get();
        $units=DB::table("units")->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        return view("Teacher.questions.index",compact('questions','school_grades','units'));
    }

    public function create()
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $units=DB::table("units")->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        return view("Teacher.questions.add",compact('school_grades','units'));
    }

    public function store(StoreQuestionRequest $request)
    {
        // check if answer in chooses or not
        /***
         * if answer in chooses allow to him
         *
         */
        $chooses=explode(",",$request->chooses);
        if(in_array($request->answer,$chooses)){
            Question::create([
                'name' => $request->title,
                'type' => $request->type_question,
                'title' => $request->title,
                'description' => $request->description,
                'chooses' => $request->chooses,
                'answer' => $request->answer,
                'subject_id' => Auth::guard("teacher")->user()->subject_id,
                'school_grade_id' => $request->school_grade_id,
                'unit_id' => $request->unit_id,
                'teacher_id' => Auth::guard("teacher")->user()->id
            ]);

            return redirect()->route("questions")->with('message','تم اضافة السؤال بنجاح');

        }else{
            return back()->with("warning","عفوا الاجابة المدخلة ليست من ضمن الاختيارات");
        }
    }

    public function show($id)
    {
        $question=DB::table('questions')
        ->join('school_grades', 'questions.school_grade_id', '=', 'school_grades.id')
        ->join('units', 'questions.unit_id', '=', 'units.id')
        ->select('questions.*', 'units.title as unit_name', 'school_grades.name as school_grade')
        ->where('questions.id','=',$id)
        ->first();

        return view("Teacher.questions.show",compact("question"));
    }

    public function edit($id)
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $units=DB::table("units")->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        $question=DB::table('questions')
        ->join('school_grades', 'questions.school_grade_id', '=', 'school_grades.id')
        ->join('units', 'questions.unit_id', '=', 'units.id')
        ->select('questions.*', 'units.title as unit_name', 'school_grades.name as school_grade')
        ->where('questions.id','=',$id)
        ->first();

        return view("Teacher.questions.edit",compact("question","school_grades","units"));
    }

    public function update(UpdateQuestionRequest $request)
    {
        $chooses=explode(",",$request->chooses);
        if(in_array($request->answer,$chooses)){
            $question=Question::find($request->id);

            $question->update([
                'name' => $request->title,
                'type' => $request->type_question,
                'title' => $request->title,
                'description' => $request->description,
                'chooses' => $request->chooses,
                'answer' => $request->answer,
                'subject_id' => Auth::guard("teacher")->user()->subject_id,
                'school_grade_id' => $request->school_grade_id,
                'unit_id' => $request->unit_id,
                'teacher_id' => Auth::guard("teacher")->user()->id
            ]);

            return redirect()->route("questions")->with('message','تم الحفظ بنجاح');

        }else{
            return back()->with("warning","عفوا الاجابة المدخلة ليست من ضمن الاختيارات");
        }
    }

    public function destroy(Question $question)
    {
        return redirect()->back()->with("message","تمت العملية بنجاح");
    }
}
