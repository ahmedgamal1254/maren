<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class RegisteredUserController extends Controller
{
    public function create(): View
    {
        $school_grades=DB::table("school_grades")->where("deleted_at","=",null)->get();
        $subjects=DB::table("subjects")->where("deleted_at","=",null)->get();
        $groups=DB::table("class_studies")->where("deleted_at","=",null)->get();

        return view('auth.register',compact("school_grades","subjects","groups"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'school_grade_id' => $request->school_grade_id,
            'subject_id' => $request->subject_id,
            'group_id' => $request->group_id
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/dashboard');
    }
}
