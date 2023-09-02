<?php

namespace App\Http\Controllers;

use App\Models\SchoolGrade;
use App\Http\Requests\StoreSchoolGradeRequest;
use App\Http\Requests\UpdateSchoolGradeRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SchoolGradeController extends Controller
{
    public function index()
    {
        $school_grades= DB::select("SELECT school_grades.id, school_grades.name, COUNT(DISTINCT users.id) AS user_count, COUNT(DISTINCT class_studies.id) AS group_count
        FROM school_grades
        LEFT JOIN users ON users.school_grade_id = school_grades.id
        LEFT JOIN class_studies ON class_studies.school_grade_id = school_grades.id
        GROUP BY school_grades.id;");
 
        return view("Teacher.school_grade.index",compact("school_grades"));
    }

    public function students($school_grade_id){
        $students=DB::table('users')
        ->join('school_grades', 'users.school_grade_id', '=', 'school_grades.id')
        ->join('class_studies', 'users.group_id', '=', 'class_studies.id')
        ->select('users.*', 'class_studies.group_name as subject_name', 'school_grades.name as school_grade')
        ->where("users.school_grade_id","=",$school_grade_id)
        ->where("users.teacher_id","=",Auth::guard("teacher")->user()->id)
        ->get();

        return view("Teacher.school_grade.students",compact("students"));
    }

    public function groups($school_grade_id){

        $classes=DB::select('SELECT class_studies.*,subjects.title as subject_name,
        school_grades.name as scholl_grade,count(users.id) as students from class_studies
        INNER JOIN subjects on subjects.id=class_studies.subject_id INNER JOIN users on users.group_id=class_studies.id
        INNER JOIN school_grades on school_grades.id=class_studies.school_grade_id
        where class_studies.teacher_id = ? and class_studies.school_grade_id=? group by(class_studies.id) ',
        [Auth::guard('teacher')->user()->id,$school_grade_id]);

        return view("Teacher.classes.index",compact("classes"));
    }

    public function create()
    {
        return view("Teacher.school_grade.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolGradeRequest $request)
    {
        $school_grade=new SchoolGrade();
        $school_grade->name=$request->name;
        $school_grade->description=$request->description;
        $school_grade->teacher_id=Auth::guard('teacher')->user()->id;
        $school_grade->save();

        return redirect()->route("school_grade")->with('message','تم اضافة صف دراسى بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $school_grade=SchoolGrade::findorFail($id);
        return view("Teacher.school_grade.show",compact("school_grade"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $schoolgrade=SchoolGrade::find($id);
        return view("Teacher.school_grade.edit",compact("schoolgrade"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolGradeRequest $request, SchoolGrade $schoolGrade)
    {
        $school_grade=SchoolGrade::find($request->id);
        $school_grade->name=$request->name;
        $school_grade->description=$request->description;
        $school_grade->teacher_id=Auth::guard('teacher')->user()->id;
        $school_grade->save();

        return redirect()->route("school_grade")->with('message','تم حفظ الصف الدراسى بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SchoolGrade::find($id)->delete();

        return redirect()->route("school_grade")->with('message','تم حذف الصف الدراسى بنجاح');
    }
}
