<?php

namespace App\Http\Controllers;

use App\Models\ClassStudy;
use App\Http\Requests\StoreClassStudyRequest;
use App\Http\Requests\UpdateClassStudyRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes=DB::select('SELECT class_studies.*,subjects.title as subject_name,
        school_grades.name as scholl_grade,count(users.id) as students from class_studies
        INNER JOIN subjects on subjects.id=class_studies.subject_id INNER JOIN users on users.group_id=class_studies.id
        INNER JOIN school_grades on school_grades.id=class_studies.school_grade_id
        where users.teacher_id = ? group by(class_studies.id)',[Auth::guard('teacher')->user()->id]);

        return view("Teacher.classes.index",compact("classes"));
    }

    public function students($group_id){
        $students=DB::table('users')
        ->join('school_grades', 'users.school_grade_id', '=', 'school_grades.id')
        ->join('class_studies', 'users.group_id', '=', 'class_studies.id')
        ->select('users.*', 'class_studies.group_name as subject_name', 'school_grades.name as school_grade')
        ->where("users.group_id","=",$group_id)
        ->where("users.teacher_id","=",Auth::guard("teacher")->user()->id)
        ->get();

        return view("Teacher.students.index",compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subjects=DB::table("subjects")->where("deleted_at","=",null)->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        return view("Teacher.classes.add",compact("school_grades","subjects"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassStudyRequest $request)
    {
        $class_study=new ClassStudy();
        $class_study->group_name=$request->name;
        $class_study->group_time=$request->start_time;
        $class_study->description=$request->description;
        $class_study->school_grade_id=$request->school_grade_id;
        $class_study->subject_id=$request->subject_id;
        $class_study->teacher_id=Auth::guard('teacher')->user()->id;
        $class_study->save();

        return redirect()->route('class')->with('message','تم اضافة جروب جديد بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $class=DB::select('SELECT class_studies.*,subjects.title as subject_name,school_grades.name as scholl_grade from class_studies
        INNER JOIN subjects on subjects.id=class_studies.subject_id
        INNER JOIN school_grades on school_grades.id=class_studies.school_grade_id where class_studies.id=?',[$id]);

        $class=$class[0];
        return view("Teacher.classes.show",compact("class"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $class=DB::table('class_studies')->find($id);
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subjects=DB::table("subjects")->where("deleted_at","=",null)->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        return view("Teacher.classes.edit",compact("class","school_grades","subjects"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassStudyRequest $request)
    {
        $class_study=ClassStudy::find($request->id);
        $class_study->group_name=$request->name;
        $class_study->group_time=$request->start_time;
        $class_study->description=$request->description;
        $class_study->school_grade_id=$request->school_grade_id;
        $class_study->subject_id=$request->subject_id;
        $class_study->save();

        return redirect()->route('class');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ClassStudy::find($id)->delete();

        return redirect()->route("class");
    }
}
