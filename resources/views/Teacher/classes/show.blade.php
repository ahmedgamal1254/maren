@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المراحلة الدراسية</div>

        <div class="card">
            <div class="card-body">
              <h5 class="card-title"> ميعاد المجموعة :- {{ $class->group_time }}</h5>
              <p class="card-text"> اسم المجموعة :- {{ $class->group_name }}</p>
              <p class="card-text">اسم المادة :- {{ $class->subject_name }}</p>
              <p class="card-text">المرحلة الدراسية :- {{ $class->scholl_grade }}</p>
              <x-operation
                :edit="route('class.edit',['id'=>$class->id])"
                :delete="route('class.destroy',['id'=>$class->id])"
                >
                </x-operation>
            </div>
        </div>

        <a href="{{ route("class") }}" class="btn btn-primary">Show All <i class="fa fa-eye"></i></a>
    </div>
</div>
@endsection
