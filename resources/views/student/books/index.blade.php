@extends("student.layouts.master")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div class="card" style="width: 100%;padding:20px 5px;">
            <p style="font-size: 18px;" class="text-center">الكتب</p>
        </div>
        <div class="row">
            @forelse ($data["books"] as $item)
            <div class="col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->title }}</h5>
                      {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                      <p class="card-text">{{ $item->description }}</p>
                      <a href="{{ asset("app/".$item->media_url) }}" download class="card-link">تنزيل الكتاب</a>
                      {{-- <a href="#" class="card-link">Another link</a> --}}
                    </div>
                </div>
            </div>
            @empty
                <div class="alert alert-danger">لا توجد كتب بعد</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
