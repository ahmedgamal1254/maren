@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الكتب الدراسية الخاصة بالحصص والمواد</div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>كود الامتحان</th>
                        <th>ميعاد الامتحان</th>
                        <th>مدة الامتحان</th>
                        <th>اسم المادة</th>
                        <th>المرحلة الدراسية</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($exams as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->date_exam }}</td>
                        <td>
                           {{ $item->duration }}
                        </td>
                        <td>{{ $item->subject_name }}</td>
                        <td>{{ $item->school_grade }}</td>
                        <td>
                            <x-operation
                                :edit="route('exam.edit',['id'=>$item->id])"
                                :view="route('exam.show',['id'=>$item->id])"
                                :delete="route('exam.destroy',['id'=>$exam->id])"
                                :id="$exam->id"
                                >
                            </x-operation>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد امتحانات دراسية بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("exam.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة امتحان جديد</a>
            </div>
        </div>
    </div>
</div>
@endsection
