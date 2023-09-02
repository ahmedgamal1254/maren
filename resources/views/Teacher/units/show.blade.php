@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الوحدة الدراسية</div>

        <div class="card" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">اسم الوحدة :- {{ $unit->title }}</h5>
              <p class="card-text">وصف الوحدة :- {{ $unit->description }}</p>
              <p class="card-text">اسم المرحلة الدراسية :- {{ $unit->school_grade }}</p>
              <x-operation
                :edit="route('unit.edit',['id'=>$unit->id])"
                :delete="route('unit.destroy',['id'=>$unit->id])"
                >
                </x-operation>
            </div>
        </div>

        <a href="{{ route("units") }}" class="btn btn-primary">Show All <i class="fa fa-eye"></i></a>
    </div>
</div>
@endsection
