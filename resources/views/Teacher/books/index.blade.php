@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الكتب الدراسية الخاصة بالحصص والمواد</div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>اسم الكتاب</th>
                        <th>وصف الكتاب</th>
                        <th>رابط الكتاب</th>
                        <th>اسم المادة</th>
                        <th>المرحلة الدراسية</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ url("app/".$item->url) }}" frameborder="0">رابط الكتاب</a>
                        </td>
                        <td>{{ $item->subject_name }}</td>
                        <td>{{ $item->school_grade }}</td>
                        <td>
                            <x-operation
                                :edit="route('book.edit',['id'=>$item->id])"
                                :view="route('book.show',['id'=>$item->id])"
                                :delete="route('book.destroy',['id'=>$book->id])"
                                :id="$book->id"
                                >
                            </x-operation>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد كتب دراسية بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("book.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة كتاب دراسى جديد</a>
            </div>
        </div>
    </div>
</div>
@endsection
