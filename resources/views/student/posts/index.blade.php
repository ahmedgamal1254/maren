@extends("student.layouts.master")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div class="card" style="width: 100%;padding:20px 5px;">
            <p style="font-size: 18px;" class="text-center">الفيديوهات</p>
        </div>
        <div class="row">
            @forelse ($data["posts"] as $post)
            <div class="col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset("app/".$post->image_url) }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ $post->description }}</p>
                      <a href="{{ route("posts_student_teacher.id",["teacher_id"=>$data["teacher_id"]
                      ,"month_id"=>$data["month_id"],"id"=>$post->id]) }}" class="card-link">مشاهدة البوست</a>
                    </div>
                </div>
            </div>
            @empty
                <div class="alert alert-danger">لا توجد منشورات بعد</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
