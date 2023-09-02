@extends("Teacher.layouts.main")
@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المجموعات الدراسية</div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>ميعاد المجموعة</th>
                        <th>اسم المجموعة</th>
                        <th>المرحلة الدراسية</th>
                        <th>الطلاب</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classes as $class)
                    <tr>
                        <td>{{ $class->group_time }}</td>
                        <td>{{ $class->group_name }}</td>
                        <td>{{ $class->scholl_grade }}</td>
                        <td>
                            <span>{{ $class->students }}</span>
                            | <a href="{{ route("group.students",["group_id"=>$class->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <x-operation
                                :edit="route('class.edit',['id'=>$class->id])"
                                :view="route('class.show',['id'=>$class->id])"
                                :delete="route('class.destroy',['id'=>$class->id])"
                                :id="$class->id"
                                >
                            </x-operation>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد مجموعات دراسية بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("class.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة مجموعة دراسية جديدة</a>
            </div>
        </div>
    </div>
</div>
@endsection
