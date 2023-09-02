@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">عنزان السؤال {{ $question->name }}</div>

        <div class="card" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">عنوان السؤال :- {{ $question->name }}</h5>
              <p class="card-text">وصف السؤال :- {{ $question->description }}</p>
              <p class="card-text">اسم المرحلة الدراسية :- {{ $question->school_grade }}</p>
              <p class="card-text">اسم الوحدة الدراسية :- {{ $question->unit_name }}</p>
                <h5 class="card-title">عنوان السؤال :- {{ $question->name }}</h5>
                <p class="card-text">اجابات السؤال</p>
                @forelse (explode(",",$question->chooses) as $item)
                   <div class="form-control">
                    <input type="radio" name="chooses" id="{{ $item }}">
                    <label for="{{ $item }}">{{ $item }}</label>
                   </div>
                @empty

                @endforelse
                <br>
                <div class="row">
                    <span>الاجابة الصحيحة</span>
                    <div class="form-control">
                        <input type="radio" name="answer" disabled id="{{ $question->answer }}">
                        <label for="{{ $question->answer }}" >{{ $question->answer }}</label>
                    </div>
                </div>
                <br>
                <x-operation
                :edit="route('question.edit',['id'=>$question->id])"
                :delete="route('question.destroy',['id'=>$question->id])"
                >
                </x-operation>
            </div>
        </div>

        <a href="{{ route("questions") }}" class="btn btn-primary">Show All <i class="fa fa-eye"></i></a>
    </div>
</div>
@endsection
