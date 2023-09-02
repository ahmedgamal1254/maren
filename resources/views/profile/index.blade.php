@extends("layouts_teacher_view.main-profile")

@section("content")
    <div class="app-content content">
        <div class="container">
            <div class="main">
                <h2 style="text-align: right;"> الملف الشخصى :- {{ $student->name }} </h2>
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-pen fa-xs edit"></i>
                        <table>
                            <tbody>
                                <tr>
                                    <td>الاسم</td>
                                    <td>:</td>
                                    <td>{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>البروفايل</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        @if (Auth::guard('web')->user()->profile)
                                            <img src="{{ asset("app/". Auth::guard('web')->user()->profile) }}" alt="" style="width:250px;height:250px;" class="img-fluid rounded img-thumbnail">
                                        @else
                                            <img src="{{ asset("assets/imgs/img/people.png") }}" alt="" class="img-fluid rounded img-thumbnail">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>البريد الالكترونى</td>
                                    <td>:</td>
                                    <td>{{ $student->email }}</td>
                                </tr>
                                <tr>
                                    <td>رقم الهاتف</td>
                                    <td>:</td>
                                    <td>{{ $student->phonenumber }}</td>
                                </tr>
                                <tr>
                                    <td>الصف الدراسيى</td>
                                    <td>:</td>
                                    <td>{{ $student->school_grade }}</td>
                                </tr>
                                <tr>
                                    <td>المجموعة</td>
                                    <td>:</td>
                                    <td>{{ $student->subject_name }}</td>
                                </tr>
                                <tr>
                                    <td>النقاط الحالية</td>
                                    <td>:</td>
                                    <td>{{ $student->active_points }}</td>
                                </tr>
                                <tr>
                                    <td>مجموع النقاط</td>
                                    <td>:</td>
                                    <td>{{ $student->all_points }}</td>
                                </tr>
                                <tr>
                                    <td>تم التسجيل</td>
                                    <td>:</td>
                                    <td>{{ $diff = Carbon\Carbon::parse($student->created_at)->diffForHumans(Carbon\Carbon::now()) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <a class="btn btn-primary" href="{{ route("profile.edit") }}">تعديل البيانات الاساسية</a>
            
                <div class="card" style="padding: 25px;">
                    <p>امتحانات الطالب اللتى تم تأديتها</p>
                    <div class="row">
                        @forelse ($exams as $exam)
                            <button type="button" style="margin-right: 5px;" class="btn btn-secondary" data-toggle="tooltip" data-placement="top"
                            title="{{ round($exam->degree/$exam->total,2)*100 }}%">
                                {{$exam->code}}
                            </button>
                        @empty
            
                        @endforelse
                    </div>
                </div>
            </div>
           </div>
    </div>
@endsection
