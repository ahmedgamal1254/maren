<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Traits\ResponseRequest;
class UnitController extends Controller
{
    use ResponseRequest;
    public function index()
    {
        $units=DB::table('units')
            ->join('school_grades', 'units.school_grade_id', '=', 'school_grades.id')
            ->select('units.*', 'school_grades.name as school_grade')
            ->where("units.teacher_id","=",Auth::guard('teacher')->user()->id)
            ->get();
        return view("Teacher.units.index",compact('units'));
    }

    public function search(Request $request){
        $units=DB::table("units")->where("title","LIKE","%". $request->input("search") ."%")->get();

        return $this->make_response($units,200);
    }

    public function create()
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();

        return view("Teacher.units.add",compact("school_grades"));
    }

    public function store(StoreUnitRequest $request)
    {
        $unit=new Unit();
        $unit->title=$request->title;
        $unit->description=$request->description;
        $unit->school_grade_id=$request->school_grade_id;
        $unit->subject_id=Auth::guard('teacher')->user()->subject_id;
        $unit->teacher_id=Auth::guard('teacher')->user()->id;
        $unit->save();

        return redirect()->route("units")->with('message','تم اضافة  الفصل (الوحدة) بنجاح');
    }

    public function show($id)
    {
        $unit=DB::table('units')
            ->join('school_grades', 'units.school_grade_id', '=', 'school_grades.id')
            ->select('units.*','school_grades.name as school_grade')
            ->where('units.id','=',$id)
            ->first();

        return view("Teacher.units.show",compact("unit"));
    }

    public function edit($id)
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();

        $unit=Unit::findOrFail($id);

        return view("Teacher.units.edit",compact("school_grades","unit"));
    }

    public function update(UpdateUnitRequest $request)
    {
        $unit=Unit::find($request->id);
        $unit->title=$request->title;
        $unit->description=$request->description;
        $unit->school_grade_id=$request->school_grade_id;
        $unit->subject_id=Auth::guard('teacher')->user()->subject_id;
        $unit->teacher_id=Auth::guard('teacher')->user()->id;
        $unit->save();

        return redirect()->route("units")->with('message','تم حفظ  الفصل (الوحدة) بنجاح');
    }

    public function destroy($id)
    {
        return redirect()->back()->with("message","تمت العملية بنجاح");
    }
}
