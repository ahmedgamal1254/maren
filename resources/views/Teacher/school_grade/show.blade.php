@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">المراحلة الدراسية</div>

        <div class="card" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">{{ $school_grade->name }}</h5>
              <p class="card-text">{{ $school_grade->description }}</p>
              <x-operation
                :edit="route('school_grade.edit',['id'=>$school_grade->id])"
                :delete="route('school_grade.destroy',['id'=>$school_grade->id])"
                >
                </x-operation>
            </div>
        </div>

        <a href="{{ route("school_grade") }}" class="btn btn-primary">Show All <i class="fa fa-eye"></i></a>
    </div>
</div>
@endsection
