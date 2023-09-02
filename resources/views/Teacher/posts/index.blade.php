@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">البوستات الدراسية الخاصة بالحصص والمواد</div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>عنوان المنشور</th>
                        <th>وصف المنشور</th>
                        <th>صورة المنشور</th>
                        <th>اسم المادة</th>
                        <th>المرحلة الدراسية</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            @if ($post->image_url)
                            <img src="{{ asset("app/". $post->image_url) }}" width="100" height="100" alt="">
                            @else
                            <img src="" alt="">
                            @endif
                        </td>
                        <td>{{ $post->subject_name }}</td>
                        <td>{{ $post->school_grade }}</td>
                        <td>
                            <x-operation
                                :edit="route('post.edit',['id'=>$post->id])"
                                :view="route('post.show',['id'=>$post->id])"
                                :delete="route('post.destroy',['id'=>$post->id])"
                                :id="$post->id"
                                >
                            </x-operation>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد منشورات دراسية بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("post.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة منشور جديد</a>
            </div>
        </div>
    </div>
</div>
@endsection
