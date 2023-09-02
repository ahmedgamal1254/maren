@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الوحدات الدراسية للمادة </div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>اسم الوحدة</th>
                        <th>وصف الوحدة</th>
                        <th>المرحلة الدراسية</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($units as $unit)
                    <tr>
                        <td>{{ $unit->title }}</td>
                        <td>{{ $unit->description }}</td>
                        <td>{{ $unit->school_grade }}</td>
                        <td>
                            <x-operation
                                :edit="route('unit.edit',['id'=>$unit->id])"
                                :view="route('unit.show',['id'=>$unit->id])"
                                :delete="route('unit.destroy',['id'=>$unit->id])"
                                :id="$unit->id"
                                >
                            </x-operation>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد وحدات دراسية بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("unit.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة وحدة دراسية جديدة</a>
            </div>
        </div>
    </div>
</div>
@endsection
