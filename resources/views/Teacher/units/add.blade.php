@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المواد الدراسية</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("unit.store") }}" method="post">
            @csrf
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="title"
                       class="form-control form-control-lg input-lg"
                       value="{{ old("title") }}" placeholder="أدخل اسم الوحدة">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل وصف الوحدة</label>
                <textarea type="text" name="description" id="desc" cols="30" rows="10"
                       class="form-control form-control-lg input-lg"
                       value="{{ old("description") }}" id="email" placeholder="أدخل وصف الوحدة"></textarea>

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

            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>
</div>
@endsection
