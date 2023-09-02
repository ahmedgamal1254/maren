<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Month_User,
    User,
    Teacher
};

class StudentController extends Controller
{
    public function index(){
        $teachers=DB::table('teachers')
        ->join('subjects','teachers.subject_id','=','subjects.id')
        ->select("teachers.*","subjects.title as subject_name")
        ->get();

        return view("student.dashboard",compact("teachers"));
    }

    public function add(){
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subjects=DB::table("subjects")->where("deleted_at","=",null)->get();
        $groups=DB::table("class_studies")->where("deleted_at","=",null)->get();

        return view("auth.register_socialite",compact("school_grades","subjects","groups"));
    }

    public function store(Request $request){

        $user=User::find(Auth::user()->id);
        $user->school_grade_id=$request->school_grade_id;
        $user->subject_id=$request->subject_id;
        $user->group_id=$request->group_id;
        $user->save();

        return redirect()->route("student_dashboard")->with('message',"تم حفظ البيانات بنجاح");
    }

    public function teacher(Request $request,$id){
        $teacher_toggle=Teacher::where("id","!=",$request->id)->first();
        $teacher=Teacher::where("id","=",$request->id)->first();

        // get all months which allowed to show from auth student
        $months=DB::select('SELECT months.month_date,months.id,months.status FROM months WHERE status=0 and teacher_id=?;',
        [$request->id]);
        $months_availble=DB::select('SELECT m.month_date,m.id, mu.lock, mu.points_paid,mu.user_id FROM months m
        LEFT JOIN month_student mu ON m.id = mu.month_id WHERE m.status = 0 and mu.user_id=? and mu.teacher_id = ?;',
        [Auth::user()->id,$teacher->id]);

        $months=array_merge_recursive($months_availble,$months);  // merge two array all months and months which student participant for it
        $months = collect($months)->unique('id')->values()->all(); // extract all months with unique id

        return view("student.teacher",compact("teacher_toggle","teacher","months"));
    }


    /***
     * user auth can unlock month if
     * he paid required points
     * steps
     * check user auth points if greater than 100 complete process
     * decreament 100 points from user auth
     * make month unlocked and add it to table month_user
    */
    public function unlock_month(Request $request){
        if(isset($request->month_id) && isset($request->teacher_id)){
            $monthId = $request->input('month_id');
            $teacherId = $request->input('teacher_id');
            if(!is_null($monthId) & !is_null($teacherId)){
                // check if points greater than 100
                if(Auth::user()->active_points >= 100){
                    $months=DB::table("month_student")->where("user_id","=",Auth::user()->id)->
                    where("month_id","=",$request->month_id)->where("teacher_id","=",$request->teacher_id)->count();

                    if($months<=0){
                        // update user
                        $id=Auth::user()->id;
                        $user=User::find($id);
                        $user->active_points=Auth::user()->active_points-100;
                        $user->save();

                        // month user
                        $month_user=new Month_User();
                        $month_user->user_id=$id;
                        $month_user->month_id=$request->month_id;
                        $month_user->teacher_id=$request->teacher_id;
                        $month_user->lock=1; // 1 month unlocked
                        $month_user->points_paid;
                        $month_user->save();

                        // months avaiable
                        $months_availble=DB::select('SELECT m.month_date,m.id, mu.lock, mu.points_paid,mu.user_id FROM months m
                            LEFT JOIN month_student mu ON m.id = mu.month_id
                            WHERE m.status = 0 and mu.user_id=?;',[Auth::user()->id]);

                        return response([
                            "status" => 200,
                            "msg" => "مبروك لقد تم فتح مجتويات الشهر يمكنك التصفح الان",
                            "success"=>true,
                            "points" =>Auth::user()->active_points-100,
                            "months" => $months_availble,
                            "swal" => "swal2-success"
                        ]);
                    }else{
                        return response([
                            "status" => 200,
                            "swal" => "swal2-info",
                            "msg" => "مبروك لقد تم شراء محتويات هذا الشهر من قبل",
                            // "success"=>true,
                        ]);
                    }
                }else{
                    return response([
                        "status"=>200,
                        "msg" => "عفوا أنت لا تملك النقاط الكافية لفتح الشهر",
                        "swal" => "swal2-error"
                    ]);
                }
            }
            else{
                return response([
                    "status"=>201,
                    "msg" => "عفوا هذا المحتوى  خاطئ",
                    "swal" => "swal2-error"
                ]);
            }
        }else{
           return response([
                    "status"=>200,
                    "msg" => "عفوا هذا غير صحيح ربما تكون مشترك فى الكورس من قبل",
                    "swal" => "swal2-error"
                ]);
        }
    }
}
