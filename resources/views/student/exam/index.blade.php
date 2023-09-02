@extends("student.layouts.master")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div class="card" style="width: 100%;padding:20px 5px;">
            <p style="font-size: 18px;" class="text-center">الامتحانات</p>
        </div>
        <div class="row">
            <x:exam-component
            :data='$data'
            ></x:exam-component>
        </div>
    </div>
</div>
@endsection
