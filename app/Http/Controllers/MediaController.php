<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\Upload;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    use Upload;
    public function index()
    {
        $books=DB::table('media')
            ->join('school_grades', 'media.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'media.subject_id', '=', 'subjects.id')
            ->select('media.*', 'subjects.title as subject_name', 'school_grades.name as school_grade')
            ->where("media.teacher_id","=",Auth::guard('teacher')->user()->id)
            ->get();

        return view("Teacher.books.index",compact("books"));
    }

    public function create()
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subjects=DB::table("subjects")->where("deleted_at","=",null)->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        return view("Teacher.books.add",compact("school_grades","subjects"));
    }
    public function store(StoreMediaRequest $request)
    {
        $file=Null;
        if($request->file("pdf")){
            // image upload name must img
            $file=$this->pdf_upload($request,'books');
        }

        $book=new Media();
        $book->title=$request->title;
        $book->description=$request->description;
        $book->media_url=$file;
        $book->school_grade_id=$request->school_grade_id;
        $book->subject_id=$request->subject_id;
        $book->url=$request->url;
        $book->teacher_id=Auth::guard('teacher')->user()->id;
        $book->date_show=$request->date_show;
        $book->save();

        return redirect()->route("books")->with('message','تم اضافة الكتاب بنجاح');
    }
    public function show($id)
    {
        $book=DB::table('media')
            ->join('school_grades', 'media.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'media.subject_id', '=', 'subjects.id')
            ->select('media.*', 'subjects.title as subject_name', 'school_grades.name as school_grade')
            ->where('media.id','=',$id)
            ->first();

        return view("Teacher.books.show",compact("book"));
    }
    public function edit($id)
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subjects=DB::table("subjects")->where("deleted_at","=",null)->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();
        $book=Media::findOrFail($id);

        return view("Teacher.books.edit",compact("school_grades","subjects","book"));
    }
    public function update(UpdateMediaRequest $request)
    {
        $book=Media::find($request->id);
        $book->title=$request->title;
        $book->description=$request->description;
        $book->school_grade_id=$request->school_grade_id;
        $book->subject_id=$request->subject_id;
        $book->teacher_id=Auth::guard('teacher')->user()->id;
        $book->save();

        return redirect()->route("books")->with('message','تم الحفظ بنجاح');
    }
    public function destroy(Media $media)
    {
        return redirect()->back()->with("message","تمت العملية بنجاح");
    }

    public function download($id){

    }
}
