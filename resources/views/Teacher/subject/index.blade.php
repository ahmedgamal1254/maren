@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المواد الدراسية</div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>اسم المادة</th>
                        <th>وصف المادة</th>
                        <th>المرحلة الدراسية</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->title }}</td>
                        <td>{{ $subject->description }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>
                            <x-operation
                                :edit="route('subject.edit',['id'=>$subject->id])"
                                :view="route('subject.show',['id'=>$subject->id])"
                                :delete="route('subject.destroy',['id'=>$subject->id])"
                                :id="$subject->id"
                                >
                            </x-operation>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد مواد دراسية بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("subject.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة مادة دراسية جديدة</a>
            </div>
        </div>
    </div>
</div>
@endsection
