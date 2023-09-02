<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Traits\Upload;

class LessonController extends Controller
{
    use Upload;
    public function index()
    {
        $lessons=DB::table('lessons')
            ->join('school_grades', 'lessons.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'lessons.subject_id', '=', 'subjects.id')
            ->join('units', 'lessons.unit_id', '=', 'units.id')
            ->select('lessons.*', 'subjects.title as subject_name',"units.title as unit_name", 'school_grades.name as school_grade')
            ->where("lessons.teacher_id","=",Auth::guard('teacher')->user()->id)
            ->get();

        return view("Teacher.lessons.index",compact("lessons"));
    }

    public function create()
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $units=DB::table("units")->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        return view("Teacher.lessons.add",compact("school_grades","units"));
    }

    public function store(StoreLessonRequest $request)
    {
        $file=Null;
        if($request->file("img")){
            // image upload name must img
            $file=$this->image_upload($request,'captions');
        }

        $lesson=new Lesson();
        $lesson->title=$request->title;
        $lesson->description=$request->description;
        $lesson->school_grade_id=$request->school_grade_id;
        $lesson->unit_id=$request->subject_id;
        $lesson->img_caption=$file;
        $lesson->subject_id=Auth::guard('teacher')->user()->subject_id;
        $lesson->teacher_id=Auth::guard('teacher')->user()->id;
        $lesson->date_show=$request->date_show;
        $lesson->save();

        return redirect()->route("lessons")->with('message','تم اضافة الدرس بنجاح من فضلك قم برفعم الغيديو للدرس');
    }

    public function show($id)
    {
        $lesson=DB::table('lessons')
            ->join('school_grades', 'lessons.school_grade_id', '=', 'school_grades.id')
            ->leftJoin('units', 'lessons.unit_id', '=', 'units.id')
            ->select('lessons.*', 'units.title as unit_name', 'school_grades.name as school_grade')
            ->where('lessons.id','=',$id)
            ->first();

        return view("Teacher.lessons.show",compact("lesson"));
    }

    public function edit($id)
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $units=DB::table("units")->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();
        $lesson=Lesson::findOrFail($id);

        return view("Teacher.lessons.edit",compact("school_grades","units","lesson"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request)
    {
        $file=Null;
        if($request->file("img")){
            // image upload name must img
            $file=$this->image_upload($request,'captions');

            $lesson=Lesson::find($request->id);
            $lesson->title=$request->title;
            $lesson->description=$request->description;
            $lesson->img_caption=$file;
            $lesson->school_grade_id=$request->school_grade_id;
            $lesson->unit_id=$request->unit_id;
            $lesson->subject_id=Auth::guard('teacher')->user()->subject_id;
            $lesson->date_show=$request->date_exam;
            $lesson->save();

        }else{
            $lesson=Lesson::find($request->id);
            $lesson->title=$request->title;
            $lesson->description=$request->description;
            $lesson->school_grade_id=$request->school_grade_id;
            $lesson->unit_id=$request->unit_id;
            $lesson->subject_id=Auth::guard('teacher')->user()->subject_id;
            $lesson->date_show=$request->date_exam;
            $lesson->save();
        }


        return redirect()->route("lessons")->with('message','تم التعديل على الدرس بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Lesson::find($id)->delete();

        return redirect()->route("lessons")->with('message','تم حذف الدرس بنجاح');
    }
}
