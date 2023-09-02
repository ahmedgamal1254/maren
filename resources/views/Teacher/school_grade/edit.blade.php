@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المراحل الدراسية</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("school_grade.update") }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $schoolgrade->id }}">

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="name"
                       class="form-control form-control-lg input-lg"
                       value="{{ $schoolgrade->name }}" id="email" placeholder="أدخل اسم المرحلة">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل وصف المرحلة</label>
                <textarea type="text" name="description" id="desc" cols="30" rows="10"
                       class="form-control form-control-lg input-lg"
                       id="email" placeholder="أدخل وصف المرحلة">{{ $schoolgrade->description }}</textarea>

                <span class="text-danger"> </span>

            </fieldset>

            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>
</div>
@endsection
