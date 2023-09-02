@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المنشور {{ $book->title }}</div>

        <div class="card" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">عنوان الكتاب :- {{ $book->title }}</h5>
              <p class="card-text">وصف الكتاب :- {{ $book->description }}</p>
              <p class="card-text">اسم المرحلة الدراسية :- {{ $book->school_grade }}</p>
              <p class="card-text">اسم المادة الدراسية :- {{ $book->subject_name }}</p>
                <p>وقت عرض الكتاب :-
                    {{ Carbon\Carbon::createFromDate($book->date_show)->monthName }}
                    {{ Carbon\Carbon::createFromDate($book->date_show)->year }}
                </p>
              <x-operation
                :edit="route('book.edit',['id'=>$book->id])"
                :delete="route('book.destroy',['id'=>$book->id])"
                >
                </x-operation>
            </div>
        </div>

        <div class="card">
            <a href="{{ $book->url }}" class="btn btn-primary">عرض الكتاب</a>
        </div>

        <a href="{{ route("books") }}" class="btn btn-primary">Show All <i class="fa fa-eye"></i></a>
    </div>
</div>
@endsection
