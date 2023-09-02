<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class MonthController extends Controller
{
    public function index(){
        $months=DB::table("months")->where("teacher_id","=",Auth::guard("teacher_id"))->get();

        return view("teacher.months.index",compact("months"));
    }

    public function set_state($id){
        $month=DB::table("months")->where("id","=",$id)->first();
        $status=0;
        if($month->status == 1){
            $status=0;
        }else{
            $status=1;
        }

        DB::update('update months set status = ? where id = ?', [$status,$id]);

        return response([
            'status' => 200,
            'msg' => 'تم التعديل بنجاح',
            "months" => DB::table('months')->get(),
        ]);
    }

    /***
     * refresh to add months which it display videos and books, exams
     * if it found any months not update , it add it system
     *
     */
    public function migrate_months(){
        $lessons=DB::table("lessons")->orderByDesc("created_at")->take(200)->get();
        $exams=DB::table("exams")->orderByDesc("date_exam")->take(200)->get();
        $media=DB::table("media")->orderByDesc("created_at")->take(200)->get();


        // add exam months
        foreach ($exams as $value) {
            $dateValue=$value->date_exam;
            $year = date('Y',strtotime($dateValue));
            $monthNo = date('m',strtotime($dateValue));

            try {
                DB::insert('insert into months (month_date,teacher_id) values (?,?)',
                [$year."-".$monthNo,Auth::guard("teacher")->user()->id]);
            } catch (\Throwable $th) {

            }
        }

        // add lessons
        foreach ($lessons as $value) {
            $dateValue=$value->date_show;
            $year = date('Y',strtotime($dateValue));
            $monthNo = date('m',strtotime($dateValue));

            try {
                DB::insert('insert into months (month_date,teacher_id) values (?,?)',
                [$year."-".$monthNo,Auth::guard("teacher")->user()->id]);
            } catch (\Throwable $th) {

            }
        }

        // add media
        foreach ($media as $value) {
            $dateValue=$value->date_show;
            $year = date('Y',strtotime($dateValue));
            $monthNo = date('m',strtotime($dateValue));
            $monthName = date('F',strtotime($dateValue));

            try {
                DB::insert('insert into months (month_date,year,month,month_name,teacher_id) values (?,?,?,?,?)',
                [$year."-".$monthNo,$year,$monthNo,$monthName,Auth::guard("teacher")->user()->id]);
            } catch (\Throwable $th) {

            }
        }


        return redirect()->route("show_months")->with('message','تم التحديث بنجاح');
    }
}
