@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الطلاب</div>
        <div class="card" style="padding: 20px;">
            <form action="{{ route("students.filter") }}" method="get">
                <div class="row">
                    <div class="col-6">
                        <select style="width: 100%;" name="school_grade" class="form-select form-select-sm" id="search_school_grade" aria-label=".form-select-sm example">
                            <option selected value="0">اختر الصف الدراسى</option>
                            @forelse ($school_grades as $school_grade)
                                <option value="{{ $school_grade->id }}">{{ $school_grade->name }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>

                    <div class="col-6">
                        <select style="width: 100%;" name="group" class="form-select form-select-sm" id="search_school_grade" aria-label=".form-select-sm example">
                            <option selected value="0">اختر المجموعة الدراسية</option>
                            @forelse ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>

                    <div class="col-12">
                        <input class="form-control" name="name" list="datalistOptions" id="search_student" placeholder="ابحث بالاسم عن الطالب">
                    </div>

                    <div class="col-6" style="margin-top: 15px;">
                        <button type="submit" class="btn btn-primary">تطبيق</button>
                    </div>
                </div>
            </form>
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
                                {{-- :delete="route('students.destroy',['id'=>$student->id])" --}}
                                :id="$student->id"
                                >
                            </x-operation>
                            <button type="button" class="btn btn-black" data-toggle="modal" data-target="#user_{{ $student->id }}">
                                <i class="fa fa-user-graduate"></i>
                            </button>
                            <div class="modal fade" id="user_{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="user" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل نقاط الطالب</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" class="points">
                                                <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                <div class="mb-3">
                                                    <label for="number" class="form-label">تعديل نقاط الطالب {{ $student->name }}</label>
                                                    <input type="number" name="point" class="form-control" id="number" placeholder="تعديل نقاط الطالب">
                                                </div>
                                                <button type="submit" class="btn btn-success">خفظ</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا يوجد طلاب بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("students.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة طالب جديد</a>
            </div>
        </div>

        {{ $students->links() }}

    </div>
</div>
@endsection

@section("script")
    <script src="{{ asset("assets/js/ajax_student.js") }}"></script>
@endsection
