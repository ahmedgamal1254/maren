@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">البوستات الدراسية الخاصة بالحصص والمواد</div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>الطالب</th>
                        <th>اثبات الدفع</th>
                        <th>
                            مشاهدة
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                    <tr>
                        <td>{{ $payment->username }}</td>
                        <td>
                            @if ($payment->image_url)
                            <img src="{{ asset("app/". $payment->image_url) }}" width="100" height="100" alt="">
                            @else
                            <img src="" alt="">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route("single_payment",[$payment->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد مدفوعات بعد</div>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
