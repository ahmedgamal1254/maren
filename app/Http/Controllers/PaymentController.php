<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Teacher;
use App\Models\User;
use App\Traits\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    use Upload;
    public function index()
    {
        $payments=DB::table("payments")->select("users.name as username","payments.*")
        ->join("users","users.id","=","payments.user_id")
        ->where("payments.status","=",1)
        ->where("payments.teacher_id","=",Auth::guard("teacher")->user()->id)->paginate(50);

        return view("Teacher.payments.index",compact("payments"));
    }

    public function create($id)
    {
        $teacher_toggle=Teacher::where("id","!=",$id)->first();
        $teacher=Teacher::where("id","=",$id)->first();
        $teacher_id=$id;

        return view("student.payments.add",compact("teacher_id","teacher","teacher_toggle"));
    }

    public function store(StorePaymentRequest $request)
    {
        $file=Null;

        if($request->file("img")){
            // image upload name must img
            $file=$this->image_upload($request,'payments');
        }

        $payment=new Payment();
        $payment->image_url=$file;
        $payment->teacher_id=$request->teacher_id;
        $payment->user_id=Auth::user()->id;
        $payment->status=1;
        $payment->save();

        return redirect()->route("student_teacher",[$request->teacher_id])->with('message','تم رفع الايصال بنجاح');
    }

    public function show($id)
    {
        $payment=DB::table("payments")->select("users.name as username","users.id as user_id","payments.*")
        ->join("users","users.id","=","payments.user_id")
        ->where("payments.status","=",1)->where("payments.id","=",$id)
        ->where("payments.teacher_id","=",Auth::guard("teacher")->user()->id)->first();

        return view("Teacher.payments.show",compact("payment"));
    }

    public function points_update(UpdatePaymentRequest $request)
    {
        if($request->points != null){
            $user=User::find($request->user_id);
            $user->active_points+=$request->points;
            $user->all_points+=$request->point;
            $user->save();


            $payment=Payment::find($request->payment_id);
            $payment->status=0;
            $payment->save();

            return redirect()->route("all_payments")->with("data","تم التعديل بنجاح");
        }else{
            return redirect()->route("all_payments")->with("data","لم يتم ادخال بيانات");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        return redirect()->back()->with("message","تمت العملية بنجاح");
    }
}
