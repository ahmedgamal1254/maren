@extends('layouts.guest')

@section("login")
    <div class="card" style="width: 50%;margin:auto;padding:100px 50px;">
        <form method="POST" action="{{ route('save_school_grade') }}">
            @csrf

            <div class="form-group position-relative has-icon-left mb-0">
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

            </div>

            <div class="form-group position-relative has-icon-left mb-0">
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

            </div>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل اسم المجموعة الدراسية</label>
                <select name="group_id" id="" class="form-control form-control-lg">
                    <option value="">أدخل اسم المجموعة الدراسية</option>
                    @forelse ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                    @empty
                    <option value="0">لا توجد مجموعات دراسية بعد</option>
                    @endforelse
                </select>

                <span class="text-danger"> </span>

            </fieldset>

            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
    </div>
@endsection
