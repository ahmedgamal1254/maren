@extends("layouts_teacher_view.main")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="alert">قم برفع ايصال الدفع الخاص بك</div>
            <form action="{{ route("payments.store",[$teacher_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $teacher_id }}" name="teacher_id">
                <fieldset class="form-group position-relative has-icon-left mb-0">
                    <label for="">أرفع صورة اثبات الدفع</label>
                    <input class="form-control form-control-lg" id="img" name="img" type="file">

                    <span class="text-danger"> </span>

                </fieldset>

                <button type="submit" class="btn btn-success">ارسال</button>
            </form>
        </div>
    </div>
</div>
@endsection
