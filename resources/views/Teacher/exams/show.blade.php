@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">كود الامتحان {{ $exam->code }}</div>

        <a href="{{ route("exams") }}" class="btn btn-primary">Show All <i class="fa fa-eye"></i></a>

        <div class="card" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">مدة الامتحان :- {{ $exam->duration }}</h5>
              <p class="card-text">ميعاد الامتحان :- {{ $exam->date_exam }}</p>
              <p class="card-text">اسم المرحلة الدراسية :- {{ $exam->school_grade }}</p>
              <p class="card-text">اسم المادة الدراسية :- {{ $exam->subject_name }}</p>
              <x-operation
                :edit="route('exam.edit',['id'=>$exam->id])"
                :delete="route('exam.destroy',['id'=>$exam->id])"
                >
                </x-operation>
            </div>
        </div>

        <div class="card" style="width: 100%">
            <div class="card-body">
                <h5 class="card-title">
                    أسئلة الامتحان
                </h5>
            </div>
        </div>
        @forelse ($questions as $question)
        <div class="row" style="flex-direction: column;">
            <div class="card" style="    padding: 20px;font-size: 18px;">
                <p class="card-text">{{ $question->name }}</p>
                <div class="form-group row" style="flex-direction: column;">
                    @foreach (explode(',',$question->chooses) as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                {{ $item }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @empty
            <div class="alert alert-primary">لا توجد أسئلة مضافة لهذا الامتحان بعض</div>
        @endforelse
        </div>
        {{ $questions->links() }}
        <div class="card">
            <a href="{{ route("add_questions",["id"=>$exam->id]) }}" class="btn btn-primary" style="display: inline-block;">اضافة أسئلة ل الامتحان</a>
        </div>
    </div>
</div>
@endsection
