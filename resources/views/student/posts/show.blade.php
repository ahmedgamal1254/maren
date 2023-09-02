@extends("student.layouts.master")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div class="card" style="width: 100%;padding:20px 5px;">
            <p style="font-size: 18px;" class="text-center">منشور :- {{ $data["post"]->title }}</p>
        </div>

        <div class="card-body">
            <h5 class="card-title">{{ $data["post"]->title }}</h5>
            <p class="card-text">{{ $data["post"]->description }}</p>
            <img class="card-img-top" src="{{ asset("app/".$data["post"]->image_url) }}" alt="Card image cap">
        </div>
    </div>
</div>
@endsection
