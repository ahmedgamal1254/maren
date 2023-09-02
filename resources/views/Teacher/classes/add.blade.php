@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المجوعات الدراسية</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("class.store") }}" method="post">
            @csrf
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل اسم المجموعة الدراسية</label>
                <input type="text" name="name"
                       class="form-control form-control-lg input-lg"
                       value="{{ old("name") }}" id="" placeholder="مثل السبت والاربعاء">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>
                <span class="text-danger"> </span>
            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل ميعاد المجموعة الدراسية</label>
                <input type="time" name="start_time"
                       class="form-control form-control-lg input-lg"
                       value="{{ old("start_time") }}" id="" placeholder="12:00 PM مثال">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>
                <span class="text-danger"> </span>
            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل وصف  المجموعة الدراسية</label>
                <textarea type="time" name="description"
                    class="form-control form-control-lg input-lg"
                    placeholder="أدخل وصف المجموعة">{{ old("description") }}</textarea>
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>
                <span class="text-danger"> </span>
            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل اسم المرحلة الدراسية</label>
                <select name="school_grade_id" id="" class="form-control form-control-lg">
                    <option value="">أدخل اسم المرحلة الدراسية</option>
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
                    <option value="">أدخل اسم المادة الدراسية</option>
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
