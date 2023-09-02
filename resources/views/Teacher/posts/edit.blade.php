@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المنشور {{ $post->title }}</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("post.update") }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $post->id }}">
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="title"
                       class="form-control form-control-lg input-lg"
                       value="{{ $post->title }}" id="email" placeholder="أدخل اسم المادة">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل وصف المادة</label>
                <textarea type="text" name="description" id="desc" cols="30" rows="10"
                       class="form-control form-control-lg input-lg"
                       id="email" placeholder="أدخل وصف الماد">{{ $post->description }}</textarea>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0" style="margin:50px 0px;">
                @if ($post->image_url)
                <img src="http://teacher-app.test:90/app/public/{{ $post->image_url }}" width="200" height="200" alt="" srcset="">
                @endif
                <br>
                <label for="img">تعديل صورة للبوست</label>
                <input class="form-control form-control-lg" id="img" name="img" type="file">

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل اسم المرحلة الدراسية</label>
                <select name="school_grade_id" id="" class="form-control form-control-lg">
                    <option value="{{ $post->school_grade_id }}">أدخل اسم المرحلة الدراسية</option>
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
                    <option value="{{ $post->subject_id }}">أدخل اسم المادة الدراسية</option>
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
