@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المنشور {{ $post->title }}</div>

        <div class="card" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">عنوان المنشور :- {{ $post->title }}</h5>
              <p class="card-text">وصف المنشور :- {{ $post->description }}</p>
              <p class="card-text">اسم المرحلة الدراسية :- {{ $post->school_grade }}</p>
              <p class="card-text">اسم المادة الدراسية :- {{ $post->subject_name }}</p>
              <x-operation
                :edit="route('post.edit',['id'=>$post->id])"
                :delete="route('post.destroy',['id'=>$post->id])"
                >
                </x-operation>
            </div>
        </div>

        <a href="{{ route("posts") }}" class="btn btn-primary">Show All <i class="fa fa-eye"></i></a>
    </div>
</div>
@endsection
