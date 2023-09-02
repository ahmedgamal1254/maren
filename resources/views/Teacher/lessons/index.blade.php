@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الدروس الخاص بنا</div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>عنوان الدرس</th>
                        <th>وصف الدرس</th>
                        <th>رابط الدرس</th>
                        <th>اسم الوحدة</th>
                        <th>المرحلة الدراسية</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->description }}</td>
                        <td>
                            @if ($lesson->video_url and $lesson->img_caption)
                                <a href="{{ route("lesson.show",['id'=>$lesson->id]) }}" ><img class="img-thumbnail" style="width: 150px;height:150px;" src="{{ asset("app/".$lesson->img_caption) }}" alt=""></a>
                            @endif
                        </td>
                        <td>{{ $lesson->unit_name }}</td>
                        <td>{{ $lesson->school_grade }}</td>
                        <td>
                            <x-operation
                                :edit="route('lesson.edit',['id'=>$lesson->id])"
                                :view="route('lesson.show',['id'=>$lesson->id])"
                                :delete="route('lesson.destroy',['id'=>$lesson->id])"
                                :id="$lesson->id"
                                >
                            </x-operation>
                            <a href="{{ route("files.index",["id"=>$lesson->id]) }}" class="btn btn-primary"><i class="fa fa-video"></i></a>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد دروس بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("lesson.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة درس جديد</a>
            </div>
        </div>
    </div>
</div>
@endsection

