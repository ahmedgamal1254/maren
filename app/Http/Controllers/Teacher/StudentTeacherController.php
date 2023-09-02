<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Traits\ResponseRequest;

class StudentTeacherController extends Controller
{
    use ResponseRequest;
    public function index(){
        $students=DB::table('users')
            ->join('school_grades', 'users.school_grade_id', '=', 'school_grades.id')
            ->join('class_studies', 'users.group_id', '=', 'class_studies.id')
            ->select('users.*', 'class_studies.group_name as subject_name', 'school_grades.name as school_grade')
            ->orderByDesc("created_at")
            ->paginate(5);

        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $groups=DB::table("class_studies")->where("deleted_at","=",null)->get();

        return view("Teacher.students.index",compact("students","school_grades","groups"));
    }

    public function search(Request $request){
        $students=DB::table('users')
        ->join('school_grades', 'users.school_grade_id', '=', 'school_grades.id')
        ->join('class_studies', 'users.group_id', '=', 'class_studies.id')
        ->select('users.*', 'class_studies.group_name as subject_name', 'school_grades.name as school_grade')
        ->where('users.name','LIKE','%'.$request->query("search").'%')
        ->orderByDesc("created_at")
        ->get();

        return response([
            "data" => $students,
            'success' => true,
            'status'=>200
        ]);
    }

    public function filter(Request $request){
        $query=DB::table('users')
        ->join('school_grades', 'users.school_grade_id', '=', 'school_grades.id')
        ->join('class_studies', 'users.group_id', '=', 'class_studies.id')
        ->select('users.*', 'class_studies.group_name as subject_name', 'school_grades.name as school_grade');

        if($request->has('name') and strlen($request->input("name"))>0 and $request->input("school_grade")==0 and
        $request->input("group") == 0){
            $students=$query->where("users.name","LIKE","%". $request->input("name") ."%")->orderByDesc("id")->paginate(100);

            return view("Teacher.students.filter",compact("students"));
        }elseif(strlen($request->input("name"))>0 and $request->input("school_grade")>0 and $request->input("group") == 0){
            $students=$query->where("users.name","LIKE","%". $request->input("name") ."%")
            ->where("users.school_grade_id","=",$request->input("school_grade"))->orderByDesc("id")->paginate(100);

            return view("Teacher.students.filter",compact("students"));
        }elseif(strlen($request->input("name"))>0 and $request->input("group")>0 and $request->input("school_grade")==0){
            $students=$query->where("users.name","LIKE","%". $request->input("name") ."%")
            ->where("users.group_id","=",$request->input("group"))->orderByDesc("id")->paginate(100);

            return view("Teacher.students.filter",compact("students"));
        }elseif(strlen($request->input("name"))>0 and $request->input("group")>0 and $request->input("school_grade")>0){
            $students=$query->where("users.name","LIKE","%". $request->input("name") ."%")->
            where("users.group_id","=",$request->input("group"))
            ->where("users.school_grade_id","=",$request->input("school_grade"))->orderByDesc("id")->paginate(100);

            return view("Teacher.students.filter",compact("students"));
        }elseif(strlen($request->input("name"))==0 and $request->input("group")>0 and $request->input("school_grade") > 0){
            $students=$query->where("users.group_id","=",$request->input("group"))
            ->where("users.school_grade_id","=",$request->input("school_grade"))->orderByDesc("id")->paginate(100);

            return view("Teacher.students.filter",compact("students"));
        }elseif(strlen($request->input("name"))==0 and $request->input("group")>0 and $request->input("school_grade") == 0){
            $students=$query->where("users.group_id","=",$request->input("group"))
            ->orderByDesc("id")->paginate(100);

            return  view("Teacher.students.filter",compact("students"));
        }elseif(strlen($request->input("name"))==0 and $request->input("group")==0 and $request->input("school_grade")>0){
            $students=$query->where("users.school_grade_id","=",$request->input("school_grade"))->orderByDesc("id")->paginate(100);

            return  view("Teacher.students.filter",compact("students"));
        }
    }

    public function students_points(){
        $students=DB::table('users')
            ->join('school_grades', 'users.school_grade_id', '=', 'school_grades.id')
            ->join('class_studies', 'users.group_id', '=', 'class_studies.id')
            ->select('users.*', 'class_studies.group_name as subject_name', 'school_grades.name as school_grade')
            ->orderByDesc("users.all_points")
            ->paginate(5);

        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $groups=DB::table("class_studies")->where("deleted_at","=",null)->get();

        return view("Teacher.students.points",compact("students","school_grades","groups"));
    }

    public function add_student(){
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $groups=DB::table("class_studies")->where("deleted_at","=",null)->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        return view("Teacher.students.add",compact('school_grades','groups'));
    }

    public function save_student(Request $request){
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phonenumber' => $request->phonenumber,
            'subject_id' => Auth::guard("teacher")->user()->subject_id,
            'school_grade_id' => $request->school_grade_id,
            'teacher_id' => Auth::guard("teacher")->user()->id,
            'group_id' => $request->group_id
        ]);

        return redirect()->route("teacher");
    }

    public function edit_student($id){
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $groups=DB::table("class_studies")->where("deleted_at","=",null)->where("teacher_id","=",Auth::guard("teacher")->user()->id)->get();

        $student=User::find($id);
        return view("Teacher.students.edit",compact("student",'school_grades',"groups"));
    }


    public function update_student(Request $request){
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required','email'],
        ]);

        $pass='';
        if($request->password == null){
            $pass=$request->password_id;
        }else{
            $pass=$request->password;
        }


        $user=User::find($request->id);
        $user->update([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phonenumber' => $request->phonenumber,
            'subject_id' => Auth::guard("teacher")->user()->subject_id,
            'school_grade_id' => $request->school_grade_id,
            'teacher_id' => Auth::guard("teacher")->user()->id,
            'group_id' => $request->group_id
        ]);

        return redirect()->route("teacher");
    }

    public function show($id){
        $student=DB::table('users')
            ->join('school_grades', 'users.school_grade_id', '=', 'school_grades.id')
            ->join('class_studies', 'users.group_id', '=', 'class_studies.id')
            ->select('users.*', 'class_studies.group_name as subject_name', 'school_grades.name as school_grade')
            ->where("users.id","=",$id)
            ->first();

        $exams=DB::table('exam_student')->join("exams","exams.id","=","exam_student.exam_id")
        ->select("exams.code","exam_student.degree","exam_student.total")->where("exam_student.user_id","=",$id)->get();
        return view("Teacher.students.show",compact("student","exams"));
    }

    public function update_points(Request $request){
        if($request->point != null){
            $user=User::find($request->user_id);
            $user->active_points+=$request->point;
            $user->all_points+=$request->points;
            $user->save();

            return $this->make_response([
                "data"=>"تم التعديل بنجاح"
            ],200);
        }else{
            return $this->make_response([
                "data"=>"لم يتم ادخال بيانات"
            ],200);
        }
    }
}
