@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المراحل الدراسية</div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>اسم المرحلة</th>
                        <th>المجموعات</th>
                        <th>الطلاب</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($school_grades as $school_grade)
                    <tr>
                        <td>{{ $school_grade->name }}</td>
                        <td>
                            <span>{{ $school_grade->group_count }}</span>
                            | <a href="{{ route("school_grade.groups",["school_grade_id"=>$school_grade->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <span>{{ $school_grade->user_count }}</span>
                            | <a href="{{ route("school_grade.students",["school_grade_id"=>$school_grade->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <x-operation
                                :edit="route('school_grade.edit',['id'=>$school_grade->id])"
                                :view="route('school_grade.show',['id'=>$school_grade->id])"
                                :delete="route('school_grade.destroy',['id'=>$school_grade->id])"
                                :id="$school_grade->id"
                                >
                            </x-operation>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد مراحل دراسية بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("school_grade.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة مرحلة دراسية جديدة</a>
            </div>
        </div>
    </div>
</div>
@endsection
