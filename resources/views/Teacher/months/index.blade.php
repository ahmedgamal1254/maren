@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الشهور المتاحة للعرض</div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>الشهر</th>
                        <th>الاسم</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($months as $item)
                    <tr>
                        <td>{{ $item->month_date }}</td>
                        <td>{{ date("F",strtotime($item->month_date)) }}</td>
                        <td>
                           @if ($item->status==1)
                            <input type="checkbox" class="check_1 check" id="{{ $item->month_date }}" />
                            <label for="{{ $item->month_date }}" class="check_1_label label_check">{{ $item->id }}</label>
                           @else
                           <input type="checkbox" class="check_2 check" checked id="{{ $item->month_date }}" />
                           <label for="{{ $item->month_date }}" class="check_1_label label_check">{{ $item->id }}</label>
                           @endif
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد كتب دراسية بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("refresh_months") }}" class="btn btn-primary"><i class="fa fa-plus"></i>تحديث</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var checks = document.getElementsByClassName("check");
    var labels = document.getElementsByClassName("label_check");
    Array.from(labels).forEach(function(element) {
      element.addEventListener('click', function (){
        var id=element.innerHTML
        $.ajax({
                url: "/teacher/set_state/months/"+id,
                type: 'GET',
                success: function(data) {
                    // Set the options that I want
                    swal(data["msg"]);
                    // console.log(data)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle any errors
                    console.log('Error:', textStatus, errorThrown);
                }
        });
      });
    });
</script>
@endsection
