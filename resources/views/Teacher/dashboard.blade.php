@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div id="crypto-stats-3" class="row">
                <div class="col-xl-2 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="fa fa-blog" title="BTC"></i></h1>
                                    </div>
                                    <div class="col-8 pl-2">
                                        <a href="{{ route("lessons") }}">
                                            <h4>المنشورات</h4>
                                            <h6 class="text-muted">المنشورات</h6>
                                        </a>
                                    </div>
                                    <div class="col-12 text-right">
                                        <h4><a href="{{ route("posts") }}">
                                            {{ \App\Models\Post::where('subject_id',"=",Auth::guard('teacher')->user()->subject_id)->count() }}</a></h4>
                                        {{-- <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="btc-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <a href="{{ route("lessons") }}"><h1><i class="fa fa-school" title="ETH"></i></h1></a>
                                    </div>
                                    <div class="col-8 pl-2">
                                        <a href="{{ route("lessons") }}"><h4>الدروس</h4></a>
                                        <a href="{{ route("lessons") }}"><h6 class="text-muted">الدروس</h6></a>
                                    </div>
                                    <div class="col-12 text-right">
                                        <h4><a href="{{ route("lessons") }}">
                                            {{ \App\Models\Lesson::where('subject_id',"=",Auth::guard('teacher')->user()->subject_id)->count() }}</a></h4>
                                        {{-- <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="btc-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="fa fa-user-graduate" title="XRP"></i></h1>
                                    </div>
                                    <div class="col-8 pl-2">
                                        <h4>الاسئلة</h4>
                                        <h6 class="text-muted">الاسئلة</h6>
                                    </div>
                                    <div class="col-12 text-right">
                                        <h4>{{ \App\Models\Question::where('subject_id',"=",Auth::guard('teacher')->user()->subject_id)->count() }}</h4>
                                        {{-- <h6 class="danger"><i class="la la-arrow-down"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="btc-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="fa fa-user-graduate" title="XRP"></i></h1>
                                    </div>
                                    <div class="col-8 pl-2">
                                        <h4>الطلاب</h4>
                                        <h6 class="text-muted">الطلاب</h6>
                                    </div>
                                    <div class="col-12 text-right">
                                        <h4>{{ \App\Models\User::where('subject_id',"=",Auth::guard('teacher')->user()->subject_id)->count() }}</h4>
                                        {{-- <h6 class="danger"><i class="la la-arrow-down"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="btc-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="fa fa-book" title="BTC"></i></h1>
                                    </div>
                                    <div class="col-8 pl-2">
                                        <a href="{{ route("lessons") }}">
                                            <h4>الكتب</h4>
                                            <h6 class="text-muted">الكتب</h6>
                                        </a>
                                    </div>
                                    <div class="col-12 text-right">
                                        <h4><a href="{{ route("books") }}">
                                            {{ \App\Models\Media::where('subject_id',"=",Auth::guard('teacher')->user()->subject_id)->count() }}</a></h4>
                                        {{-- <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="btc-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <a href="{{ route("exams") }}"><h1><i class="fa fa-school" title="ETH"></i></h1></a>
                                    </div>
                                    <div class="col-8 pl-2">
                                        <a href="{{ route("exams") }}"><h4>الامتحانات</h4></a>
                                        <a href="{{ route("exams") }}"><h6 class="text-muted">الامتحانات</h6></a>
                                    </div>
                                    <div class="col-12 text-right">
                                        <h4><a href="{{ route("exams") }}">
                                            {{ \App\Models\Exam::where('subject_id',"=",Auth::guard('teacher')->user()->subject_id)->count() }}</a></h4>
                                        {{-- <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="btc-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Candlestick Multi Level Control Chart -->
            <div class="row match-height">
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">المنشورات</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">المنشورات الدراسية</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>العنوان</th>
                                        <th>المرحلة الدراسية</th>
                                        <th>التعديلات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as $post)
                                            <tr class="bg-success bg-lighten-5">
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->school_grade }}</td>
                                                <td>
                                                    <x-operation
                                                        :edit="route('post.edit',['id'=>$post->id])"
                                                        :view="route('post.show',['id'=>$post->id])"
                                                        :delete="route('posts.destroy',['id'=>$post->id])"
                                                        :id="$post->id"
                                                        ></x-operation>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">الدروس</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">دروس المراحل الدراسية</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>عنوان الفيديو</th>
                                        <th>التعديلات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($lessons as $lesson)
                                            <tr class="bg-success bg-lighten-5">
                                                <td>{{ $lesson->title }}</td>
                                                <td><a href="{{ $lesson->video_url }}">مشاهدة الفيديو</a></td>
                                                <td>
                                                    <x-operation
                                                        :edit="route('lesson.edit',['id'=>$lesson->id])"
                                                        :view="route('lesson.show',['id'=>$lesson->id])"
                                                        :delete="route('lesson.destroy',['id'=>$lesson->id])"
                                                        :id="$lesson->id"
                                                        >
                                                    </x-operation>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sell Orders & Buy Order -->
            <!-- Active Orders -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">الامتحانات</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <td>
                                    {{-- <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i></button> --}}
                                </td>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                        <tr>
                                            <th>كود الامتحان</th>
                                            <th>ميعاد الامتحان</th>
                                            <th>المتبقى</th>
                                            <th>مدة الامتحان</th>
                                            <th>اسم المادة</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>التعديلات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($exams as $item)
                                        <tr>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->date_exam }}</td>
                                            <td>
                                                @if (explode(" ",Carbon\Carbon::parse($item->date_exam)->diffForHumans(Carbon\Carbon::now()))[0] =="قبل")
                                                <span class="btn btn-success" style="color: black;">منتهى {{ Carbon\Carbon::parse($item->date_exam)->diffForHumans(Carbon\Carbon::now()) }}</span>
                                                @else
                                                {{ Carbon\Carbon::parse($item->date_exam)->diffForHumans(Carbon\Carbon::now()) }}
                                                @endif
                                            </td>
                                            <td>
                                               {{ $item->duration }}
                                            </td>
                                            <td>{{ $item->subject_name }}</td>
                                            <td>{{ $item->school_grade }}</td>
                                            <td>
                                                <x-operation
                                                    :edit="route('exam.edit',['id'=>$item->id])"
                                                    :view="route('exam.show',['id'=>$item->id])"
                                                    :delete="route('exam.destroy',['id'=>$item->id])"
                                                    :view="$item->id"
                                                    >
                                                </x-operation>
                                            </td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-danger">لا توجد امتحانات دراسية بعد</div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Active Orders -->
        </div>
    </div>
</div>
@endsection
