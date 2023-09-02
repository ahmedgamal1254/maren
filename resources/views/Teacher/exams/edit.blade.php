@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الامتحانات الدراسية</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("exam.update") }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $exam->id }}" name="id">
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="code"
                       class="form-control form-control-lg input-lg"
                       value="{{ $exam->code }}" id="" placeholder="أدخل كود الامتحان">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل مدة الامتحان</label>
                <select name="duration" id="" class="form-control form-control-lg">
                    <option value="{{ $exam->duration }}">أدخل مدة الامتحان</option>
                    <option value="30">30 دقيقة</option>
                    <option value="15">15 دقيقة</option>
                    <option value="45">45 دقيقة</option>
                    <option value="60">60 دقيقة</option>
                    <option value="90">90 دقيقة</option>
                    <option value="120">120 دقيقة</option>
                </select>

                <span class="text-danger"> </span>

            </fieldset>


            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="date_show">وقت عرض الامتحان</label>
                <small>أدحل الشهر والسنة المراد عرض فيهم الامتحان</small>
                <input class="form-control form-control-lg" value="{{ $exam->date_exam }}" id="date_show" name="date_exam" type="date">

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="date_show">ميعاد عرض الامتحان</label>
                <small>أدحل وقت بداية الامتحان</small>
                <input class="form-control form-control-lg" value="{{ $exam->start_time }}" id="date_show" name="start_time" type="time">

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="date_show">ميعاد نهاية عرض الامتحان</label>
                <small>أدحل وقت انتهاء الامتحان</small>
                <input class="form-control form-control-lg" value="{{ $exam->end_time }}" id="date_show" name="end_time" type="time">

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل اسم المرحلة الدراسية</label>
                <select name="school_grade_id" id="" class="form-control form-control-lg">
                    <option value="{{ $exam->school_grade_id }}">أدخل اسم المرحلة الدراسية</option>
                    @forelse ($school_grades as $school_grade)
                    <option value="{{ $school_grade->id }}">{{ $school_grade->name }}</option>
                    @empty
                    <option value="0">لا توجد مراحل دراسية بعد</option>
                    @endforelse
                </select>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل اسم المادة الدراسية</label>
                <select name="subject_id" id="" class="form-control form-control-lg">
                    <option value="{{ $exam->subject_id }}">أدخل اسم المادة الدراسية</option>
                    @forelse ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                    @empty
                    <option value="0">لا توجد مواد دراسية بعد</option>
                    @endforelse
                </select>

                <span class="text-danger"> </span>

            </fieldset>

            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>
</div>
@endsection
