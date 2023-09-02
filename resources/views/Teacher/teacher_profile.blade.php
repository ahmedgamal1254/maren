@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
<!-- Main -->
<div class="main">
    <h2>الملف الشخصى</h2>
    <div class="card">
        <div class="card-body">
            <i class="fa fa-pen fa-xs edit"></i>
            <table>
                <tbody>
                    <tr>
                        <td>الاسم</td>
                        <td>:</td>
                        <td>{{ Auth::guard('teacher')->user()->name }}</td>
                    </tr>
                    <tr>
                        <td>
                            @if (Auth::guard('teacher')->user()->img_url)
                                <img src="{{ asset("app/". Auth::guard('teacher')->user()->img_url) }}" alt="" class="img-fluid rounded img-thumbnail">
                            @else
                                <img src="{{ asset("assets/imgs/img/people.png") }}" alt="" class="img-fluid rounded img-thumbnail">
                            @endif
                        </td>
                        <td></td>
                        <td>
                            <form action="{{ route("ajax_upload_image") }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::guard('teacher')->user()->id }}">
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                    <label for="img">تغيير صورة البروفايل</label>
                                    <input class="form-control form-control-lg" name="img" type="file">

                                    <span class="text-danger"> </span>

                                </fieldset>
                                <button type="submit" class="btn btn-primary">تغيير</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>البريد الالكترونى</td>
                        <td>:</td>
                        <td>{{ Auth::guard('teacher')->user()->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End -->
</div>
@endsection

@section("script")
<script>
// $(document).ready(function () {
//     $("#upload_image").submit(function (e) {
//         e.preventDefault();

//         $.ajax({
//             url: "{{ route('ajax_upload_image') }}",
//             type: 'POST',
//             data:{
//                 "_token": "{{ csrf_token() }}",
//                 'teacher_id': {{ Auth::guard("teacher")->user()->id }},
//             },
//             success: function(data) {
//                 // Set the options that I want
//                 console.log(data)
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 // Handle any errors
//                 console.log('Error:', textStatus, errorThrown);
//             }
//         });
//     })
//     var element = document.getElementById("upload_image");
//     element.addEventListener('submit', function (e){
//         e.preventDefault();


//     });
// })
<script>
@endsection
