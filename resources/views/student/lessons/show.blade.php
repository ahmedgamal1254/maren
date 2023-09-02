@extends("student.layouts.master")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div class="card" style="width: 100%;padding:20px 5px;">
            <p style="font-size: 18px;" class="text-center">درس :- {{ $data["lesson"]->title }}</p>
        </div>

        <div class="card-body">
            <h5 class="card-title">{{ $data["lesson"]->title }}</h5>
            <p class="card-text">{{ $data["lesson"]->description }}</p>
            <div class="embed-responsive embed-responsive-4by3">
            {!! $data["lesson"]->video_url !!}
            </div>
        </div>
    </div>
</div>
@endsection
