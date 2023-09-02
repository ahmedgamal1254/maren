@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">اثبات الدفع للطالب  {{ $payment->username }}</div>

        <div class="card" style="width: 100%">
            <div class="card-body">
                @if ($payment->image_url)
                    <img src="{{ asset("app/". $payment->image_url) }}" alt="">
                @else
                    <img src="" alt="">
                @endif
            </div>
        </div>

        <form action="{{ route("points_update") }}" method="post">
            @csrf
            <input type="hidden" value="{{ $payment->user_id }}" name="user_id">
            <input type="hidden" name="payment_id" value="{{ $payment->id }}">
            <input type="text" class="form-control" placeholder="أدخل نقاط للطالب" name="points" />
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
    </div>
</div>
@endsection
