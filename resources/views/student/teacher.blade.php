@extends("layouts_teacher_view.main")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div id="crypto-stats-3" class="row">
                <div class="col-xl-3 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="fa fa-blog" title="BTC"></i></h1>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <a href="#">
                                            <h4>المنشورات</h4>
                                            <h6 class="text-muted">المنشورات</h6>
                                        </a>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>
                                            <a href="">
                                                {{ \App\Models\Post::where('teacher_id',"=",$teacher->id)->count() }}
                                            </a>
                                        </h4>
                                        {{-- <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="fa fa-book" title="BTC"></i></h1>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <a href="#">
                                            <h4>الكتب</h4>
                                            <h6 class="text-muted">الكتب</h6>
                                        </a>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>
                                            <a href="">
                                                {{ \App\Models\Media::where('teacher_id',"=",$teacher->id)->count() }}
                                            </a>
                                        </h4>
                                        {{-- <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <a href=""><h1><i class="fa fa-school" title="ETH"></i></h1></a>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <a href=""><h4>الدروس</h4></a>
                                        <a href=""><h6 class="text-muted">الدروس</h6></a>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4><a href="">
                                            {{ \App\Models\Lesson::where('teacher_id',"=",$teacher->id)->count() }}</a></h4>
                                        {{-- <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="fa fa-user-graduate" title="XRP"></i></h1>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4>الاسئلة</h4>
                                        <h6 class="text-muted">الاسئلة</h6>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>{{ \App\Models\Question::where('teacher_id',"=",$teacher->id)->count() }}</h4>
                                        {{-- <h6 class="danger"><i class="la la-arrow-down"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header row">
        </div>
        <div class="row">
            <h1 class="text-center">الجدول الزمنى للامتحانات والفيديوهات والكتب</h1>
        </div>

        <div class="container">

            <div class="row">
                @foreach ($months as $item)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="icon">
                                {{-- <a href="{{ route("unlock_month",["id"=>$item->id]) }}"> --}}

                                @if (isset($item->lock))
                                    <i class="fa-solid fa-unlock lock"></i>
                                @else
                                    <i class="fa-solid fa-lock lock" data-id="{{ $item->id }}"
                                        data-teacher_id="{{ $teacher->id }}"></i>
                                @endif
                                {{-- </a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">
                            <div class="">
                                {{ date('F',strtotime($item->month_date)) }}
                            </div>
                            </h5>
                        <p class="card-text">
                            <div class="">
                                Start:
                                <span class="">
                                    {{ $item->month_date }}
                                </span>
                            </div>
                        </p>
                            @if (isset($item->lock))
                                <a href="{{ route("month_page",["teacher_id"=>$teacher->id,"id"=>$item->id]) }}"
                                    class="btn btn-primary">فتح</a>
                            @else

                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var icons = document.getElementsByClassName("lock");
    Array.from(icons).forEach(function(element) {
      element.addEventListener('click', function (){
        var month_id=element.getAttribute("data-id");
        var teacher_id=element.getAttribute("data-teacher_id");

        url=''
        if(month_id == null && teacher_id == null){
            url="/dashboard/unlock"
        }else{
            url="/dashboard/unlock?month_id="+month_id+"&teacher_id="+teacher_id
        }
        var sure=window.confirm("أنت على وشك شراء محتوى هذا الشهر ");
        if(sure == true){
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    if(data["success"]){
                        element.classList.remove("fa-lock")
                        element.classList.add("fa-unlock")

                        document.getElementById("active_points").innerHTML=data["points"];
                        swal(data["msg"]);
                        document.getElementsByClassName("swal2-success")[0].style.display="block"
                    }else if(data["swal"] == "swal2-error"){
                        swal(data["msg"]);
                        document.getElementsByClassName("swal2-error")[0].style.display="block"
                    }else if(data["swal"] == "swal2-info"){
                        swal(data["msg"]);
                        document.getElementsByClassName("swal2-info")[0].style.display="block"
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle any errors
                    console.log('Error:', textStatus, errorThrown);
                }
            });
        }else{
            swal("تم الغاء الشراء بنجاح");
        }
      });
    });
</script>
@endsection
