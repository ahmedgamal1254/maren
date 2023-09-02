<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams=DB::table('exams')
            ->join('school_grades', 'exams.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->select('exams.*', 'subjects.title as subject_name', 'school_grades.name as school_grade')
            ->where("exams.teacher_id","=",Auth::guard('teacher')->user()->id)
            ->get();
        return view("Teacher.exams.index",compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $units=DB::table("units")->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        return view("Teacher.exams.add",compact("school_grades","units"));
    }

    public function store(StoreExamRequest $request)
    {
        // return $request->all();
        $data='';
        foreach ($request->all() as $key => $value) {
            if(str_contains($key, 'unit')){
                $data.=$value;
                $data.=',';
            }
        }

        $exam=new Exam();
        $exam->code=$request->code;
        $exam->duration=$request->duration;
        $exam->date_exam=$request->date_exam;
        $exam->start_time=$request->time_start;
        $exam->end_time=$request->time_end;
        $exam->school_grade_id=$request->school_grade_id;
        $exam->subject_id=Auth::guard('teacher')->user()->subject_id;
        $exam->units_id=substr($data,0,strlen($data)-1);
        $exam->teacher_id=Auth::guard('teacher')->user()->id;
        $exam->save();

        return redirect()->route("exams")->with('message','تم اضافة الامتحان بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $exam=DB::table('exams')
            ->join('school_grades', 'exams.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->select('exams.*', 'subjects.title as subject_name', 'school_grades.name as school_grade')
            ->where('exams.id','=',$id)
            ->first();

        $questions=DB::table('question_exams')
        ->join('exams', 'question_exams.exam_id', '=', 'exams.id')
        ->join('questions', 'question_exams.question_id', '=', 'questions.id')
        ->select('questions.*','exams.id','exams.code')
        ->where('exams.id','=',$id)
        ->paginate(5);

        return view("Teacher.exams.show",compact("exam","questions"));
    }

    public function edit($id)
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subjects=DB::table("subjects")->where("deleted_at","=",null)->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        $exam=Exam::findOrFail($id);

        return view("Teacher.exams.edit",compact("school_grades","subjects","exam"));
    }

    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $exam=Exam::find($request->id);
        $exam->code=$request->code;
        $exam->duration=$request->duration;
        $exam->date_exam=$request->date_exam;
        $exam->start_time=$request->start_time;
        $exam->end_time=$request->end_time;
        $exam->school_grade_id=$request->school_grade_id;
        $exam->subject_id=$request->subject_id;
        $exam->teacher_id=Auth::guard('teacher')->user()->id;
        $exam->save();

        return redirect()->route("exams")->with('message','تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        return redirect()->back()->with("message","تمت العملية بنجاح");
    }
}
