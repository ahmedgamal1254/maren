@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الدرسات الدراسية</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("lesson.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="title" value="{{ old("title") }}"
                class="form-control form-control-lg input-lg" id="email" placeholder="أدخل عنوان الدرس">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل وصف الدرس</label>
                <textarea type="text" name="description" id="desc" cols="30" rows="10"
                       class="form-control form-control-lg input-lg"
                       value="" id="email" placeholder="أدخل وصف الدرس">{{ old("description") }}</textarea>

                <span class="text-danger"> </span>

            </fieldset>

            {{-- <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="img">أدخل رابط الدرس</label>
                <input class="form-control form-control-lg" id="img" name="video_url" type="text">

                <span class="text-danger"> </span>

            </fieldset> --}}

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="">أرفع صورة مصغرة للفيديو</label>
                <input class="form-control form-control-lg" id="img" name="img" type="file">

                <span class="text-danger"> </span>

            </fieldset>


            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="date_exam">وقت عرض الفيديو/الدرس</label>
                <small>أدحل الشهر والسنة المراد عرض فيهم الدرس</small>
                <input class="form-control form-control-lg" value="{{ old("date_show") }}" id="date_exam" name="date_show" type="date">

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
                <label for="desc">أدخل اسم الوحدة</label>
                <select name="subject_id" id="" class="form-control form-control-lg">
                    <option value="">أدخل اسم الوحدة</option>
                    @forelse ($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                    @empty
                    <option value="0">لا توجد مواد وحدات دراسية بعد</option>
                    @endforelse
                </select>

                <span class="text-danger"> </span>

            </fieldset>

            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>
</div>
@endsection
