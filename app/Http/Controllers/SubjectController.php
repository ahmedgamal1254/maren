<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\Upload;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    use Upload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=DB::select("SELECT subjects.* , school_grades.name from subjects
        INNER join school_grades on school_grades.id=subjects.school_grade_id
        where subjects.deleted_at is null and subjects.teacher_id = ?",[Auth::guard('teacher')->user()->id]);

        return view("Teacher.subject.index",compact("subjects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        return view("Teacher.subject.add",compact("school_grades"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $subject=new Subject();
        $subject->title=$request->title;
        $subject->description=$request->description;
        $subject->school_grade_id=$request->school_grade_id;
        $subject->teacher_id=Auth::guard('teacher')->user()->id;
        $subject->save();

        return redirect()->route("subject")->with('message','تم اضافة المادة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subject=DB::select("SELECT subjects.* , school_grades.name from subjects
        INNER join school_grades on school_grades.id=subjects.school_grade_id where subjects.id = ? and subjects.deleted_at is null",[$id]);

        $subject=$subject[0];
        return view("Teacher.subject.show",compact("subject"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subject=Subject::find($id);

        toastr()->success("تم حفظ البيانات بنجاح");

        return view("Teacher.subject.edit",compact("subject","school_grades"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject=Subject::find($request->id);
        $subject->title=$request->title;
        $subject->description=$request->description;
        $subject->school_grade_id=$request->school_grade_id;
        $subject->teacher_id=Auth::guard('teacher')->user()->id;
        $subject->save();

        return redirect()->route("subject")->with('message','تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();

        return redirect()->route("subject")->with('message','تم حذف  المادة بنجاح');
    }
}
