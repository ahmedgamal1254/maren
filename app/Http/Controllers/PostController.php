<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use Upload;

    public function index()
    {
        $posts=DB::table('posts')
            ->join('school_grades', 'posts.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'posts.subject_id', '=', 'subjects.id')
            ->select('posts.*', 'subjects.title as subject_name', 'school_grades.name as school_grade')
            ->where("posts.teacher_id","=",Auth::guard('teacher')->user()->id)
            ->get();

        return view("Teacher.posts.index",compact("posts"));
    }

    public function create()
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subjects=DB::table("subjects")->where("deleted_at","=",null)->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        return view("Teacher.posts.add",compact("school_grades","subjects"));
    }

    public function store(Request $request)
    {
        $file=Null;
        if($request->file("img")){
            // image upload name must img
            $file=$this->image_upload($request,'posts');
        }

        $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->image_url=$file;
        $post->school_grade_id=$request->school_grade_id;
        $post->subject_id=$request->subject_id;
        $post->teacher_id=Auth::guard('teacher')->user()->id;
        $post->save();

        return redirect()->route("posts")->with('message','تم اضافة المنشور بنجاح');
    }

    public function show($id)
    {
        $post=DB::table('posts')
            ->join('school_grades', 'posts.school_grade_id', '=', 'school_grades.id')
            ->join('subjects', 'posts.subject_id', '=', 'subjects.id')
            ->select('posts.*', 'subjects.title as subject_name', 'school_grades.name as school_grade')
            ->where('posts.id','=',$id)
            ->first();

        return view("Teacher.posts.show",compact("post"));
    }

    public function edit($id)
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subjects=DB::table("subjects")->where("deleted_at","=",null)->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();
        $post=Post::findOrFail($id);

        return view("Teacher.posts.edit",compact("school_grades","subjects","post"));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $file=Null;
        if($request->file("img")){
            // image upload name must img
            $file=$this->image_upload($request,'posts');

            $post=Post::find($request->id);
            $post->title=$request->title;
            $post->description=$request->description;
            $post->image_url=$file;
            $post->school_grade_id=$request->school_grade_id;
            $post->subject_id=$request->subject_id;
            $post->teacher_id=Auth::guard('teacher')->user()->id;
            $post->save();

        }else{
            $post=Post::find($request->id);
            $post->title=$request->title;
            $post->description=$request->description;
            $post->school_grade_id=$request->school_grade_id;
            $post->subject_id=$request->subject_id;
            $post->teacher_id=Auth::guard('teacher')->user()->id;
            $post->save();
        }

        return redirect()->route("posts")->with('message','تم الحفظ بنجاح');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route("posts");
    }
}
