@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المراحلة الدراسية</div>

        <div class="card" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">اسم المادة :- {{ $subject->title }}</h5>
              <p class="card-text">وصف المادة :- {{ $subject->description }}</p>
              <p class="card-text">اسم المرحلة الدراسية :- {{ $subject->name }}</p>
              <x-operation
                :edit="route('school_grade.edit',['id'=>$subject->id])"
                :delete="route('school_grade.destroy',['id'=>$subject->id])"
                >
                </x-operation>
            </div>
        </div>

        <a href="{{ route("subject") }}" class="btn btn-primary">Show All <i class="fa fa-eye"></i></a>
    </div>
</div>
@endsection
