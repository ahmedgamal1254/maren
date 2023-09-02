<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Traits\Upload;

class ProfileController extends Controller
{
    use Upload;
    public function index(){
        $student=DB::table('users')
            ->join('school_grades', 'users.school_grade_id', '=', 'school_grades.id')
            ->join('class_studies', 'users.group_id', '=', 'class_studies.id')
            ->select('users.*', 'class_studies.group_name as subject_name', 'school_grades.name as school_grade')
            ->where("users.id","=",Auth::user()->id)
            ->first();

        $exams=DB::table('exam_student')->join("exams","exams.id","=","exam_student.exam_id")
        ->select("exams.code","exam_student.degree","exam_student.total")->where("exam_student.user_id","=",Auth::user()->id)->get();
        
        return view("profile.index",compact("student","exams"));
    }
    public function edit(Request $request): View
    {
        $student=DB::table('users')
        ->join('school_grades', 'users.school_grade_id', '=', 'school_grades.id')
        ->join('class_studies', 'users.group_id', '=', 'class_studies.id')
        ->select('users.*', 'class_studies.group_name as subject_name', 'school_grades.name as school_grade')
        ->where("users.id","=",Auth::user()->id)
        ->first();

        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $groups=DB::table("class_studies")->get();

        return view("profile.edit",compact("student","school_grades","groups"));
    }

    public function store(Request $request){
        $file=Null;
        if($request->file("img")){
            // image upload name must img
            $file=$this->image_upload($request,'users');

            $user=user::find($request->id);
            $user->email=$request->email;
            $user->name=$request->username;
            $user->profile=$file;
            $user->school_grade_id=$request->school_grade_id;
            $user->save();

        }else{
            $user=user::find($request->id);
            $user->email=$request->email;
            $user->name=$request->username;
            $user->profile=$file;
            $user->school_grade_id=$request->school_grade_id;
            $user->save();

        }

        return redirect()->route("user-profile");
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function profile_public($id){
        $user=DB::table("users")->select("users.*","school_grades.name as grade_name")
            ->join("school_grades","school_grades.id","=","users.school_grade_id")
            ->where("users.id","=",$id)->first();

        
        return view("public_profile",compact("user"));
    }
}
