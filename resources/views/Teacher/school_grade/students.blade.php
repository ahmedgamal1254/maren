@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الطلاب</div>
        <div class="card" style="margin:50px 25px;">
            <input type="text" name="" class="form-control" id="search_students" placeholder="البحث عن الطلاب بالاسم">
        </div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>الطالب</th>
                        <th>رقم الهاتف</th>
                        <th>الصف الدراسى</th>
                        <th>المجموعة الدراسية</th>
                        <th>وقت الاضافة</th>
                        <th>مجموع النقاط</th>
                        <th>النقاط الحالية</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody id="search_part">
                    @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->phonenumber }}</td>
                        <td>{{ $student->school_grade }}</td>
                        <td>{{ $student->subject_name }}</td>
                        <td>{{ $diff = Carbon\Carbon::parse($student->created_at)->diffForHumans(Carbon\Carbon::now()) }}</td>
                        <td>{{ $student->all_points }}</td>
                        <td>{{ $student->active_points }}</td>
                        <td>
                            <x-operation
                                :edit="route('students.edit',['id'=>$student->id])"
                                :view="route('students.show',['id'=>$student->id])"
                                :delete="route('subject.destroy',['id'=>$student->id])"
                                >
                            </x-operation>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا بوجد طلاب بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("students.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة طالب جديد</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
    <script src="{{ asset("assets/js/ajax_student.js") }}"></script>
@endsection
