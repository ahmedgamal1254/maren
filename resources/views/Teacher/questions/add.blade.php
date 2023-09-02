@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الاسئلة الدراسية</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("question.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="title"
                       class="form-control form-control-lg input-lg"
                       id="email" value="{{ old("title") }}" placeholder="أدخل عنوان السؤال">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل وصف السؤال</label>
                <textarea type="text" value="{{ old("description") }}" name="description" id="desc" cols="30" rows="10"
                       class="form-control form-control-lg input-lg"
                       value="" id="email" placeholder="أدخل وصف السؤال"></textarea>

                <span class="text-danger"> </span>

            </fieldset>



            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل نوع السؤال</label>
                <select name="type_question" id="" class="form-control form-control-lg">
                    <option value="اختيارات">اختيارات</option>
                    <option value="مقالى">مقالى</option>
                    <option value="صح وخطأ">صخ وخطأ</option>
                </select>

                <span class="text-danger"> </span>

            </fieldset>

            <div class="form-group">
                <label style="color: black;font-size:20px;margin-bottom:10px;">الاختيارات </label>
                <textarea type="text" value="{{ old("chooses") }}"" name="chooses" id="desc" cols="30" rows="10"
                class="form-control form-control-lg input-lg"
                value="" id="email" placeholder="أدخل الاختيارات للسؤال مثل صح,خطأ"></textarea>
            </div>

            @if (Session::has("message"))
                <div class="alert alert-danger">{{ Session::get("message") }}</div>
            @endif
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="answer"
                       class="form-control form-control-lg input-lg"
                       value="{{ old("answer") }}" id="" placeholder="أدخل اجابة السؤال">
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
                <label for="desc">أدخل اسم الوحدة الدراسية</label>
                <select name="unit_id" id="" class="form-control form-control-lg">
                    <option value="">أدخل اسم الوحدة الدراسية</option>
                    @forelse ($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->title }}</option>
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
