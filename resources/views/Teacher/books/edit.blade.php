@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">ألكتب {{ $book->title }}</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("book.update") }}" method="book">
            @csrf
            <input type="hidden" name="id" value="{{ $book->id }}">
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="title"
                       class="form-control form-control-lg input-lg"
                       value="{{ $book->title }}" id="email" placeholder="أدخل اسم ألكتاب">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل وصف الكتاب</label>
                <textarea type="text" name="description" id="desc" cols="30" rows="10"
                       class="form-control form-control-lg input-lg"
                       id="email" placeholder="أدخل وصف الماد">{{ $book->description }}</textarea>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="pdf">رابط الكتاب</label>
                <input class="form-control form-control-lg" id="url" name="url" value="{{ $book->url }}" type="text">

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="date_show">وقت عرض الكتاب</label>
                <small>أدحل الشهر والسنة المراد عرض فيهم الكتاب</small>
                <input class="form-control form-control-lg" value="{{ $book->date_show }}" id="date_show" name="date_show" type="date">

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل اسم المرحلة الدراسية</label>
                <select name="school_grade_id" id="" class="form-control form-control-lg">
                    <option value="{{ $book->school_grade_id }}">أدخل اسم المرحلة الدراسية</option>
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
                    <option value="{{ $book->subject_id }}">أدخل اسم المادة الدراسية</option>
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
