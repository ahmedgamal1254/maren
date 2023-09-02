@forelse ($data["exams"] as $exam)
<div class="col-lg-4 col-sm-12">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">كود  الامتحان :- {{ $exam->code }}</h5>
          <h5 class="card-title">موعد بدايةالامتحان :- {{ $exam->start_time }}</h5>
          <h5 class="card-title"> موعد نهاية الامتحان:- {{ $exam->end_time }}</h5>
            @switch($exam->duration)
                @case(120)
                    <p class="card-text">مدة الامتحان ساعاتان
                    @break

                @case(90)
                    <p class="card-text">مدة الامتحان ساعة ونصف
                    @break
                @case(60)
                    <p class="card-text">مدة الامتحان ساعة
                    @break
                @default
                <p class="card-text">مدة الامتحان :- {{ $exam->duration }} دقيقة
            @endswitch
          </p>
          <p class="card-text">موعد الامتحان :- {{ $exam->date_exam }}</p>
        @if (Carbon\Carbon::parse(date("y:m:d"))->toDateString() == Carbon\Carbon::parse($exam->date_exam)->toDateString())
            @if (
            (Carbon\Carbon::parse(date("h:i"))->addHours(1)->format("h:i") >= Carbon\Carbon::parse($exam->start_time)->format("h:i"))
            and (Carbon\Carbon::parse(date("h:i"))->addHours(1)->format("h:i") < Carbon\Carbon::parse($exam->end_time)->format("h:i"))
            )
                <a href="{{ route("month_page_exam.id",["teacher_id"=>$data["teacher_id"]
                    ,"month_id"=>$data["month_id"],"id"=>$exam->id]) }}"
                    class="card-link btn btn-primary">
                    بدأ الامتحان
                </a>
            @elseif (Carbon\Carbon::parse(date("h:i"))->addHours(1)->format("h:i") > Carbon\Carbon::parse($exam->end_time)->format("h:i"))
                {{-- <span> الامتحان قد انتهى :-
                    <div class="btn btn-success cursor">
                        {{ $diff = Carbon\Carbon::parse($exam->end_time)->diffForHumans(Carbon\Carbon::now()->addHours(1)) }}
                    </div>
                </span> --}}
                <a href="{{ route("exam_results",["id"=>$exam->id]) }}" class="btn btn-outline-primary">
                    عرض
                </a>
            @else
                <span> الامتحان:-
                    <div class="btn btn-success cursor">
                        {{ $diff = Carbon\Carbon::parse($exam->start_time)->diffForHumans(Carbon\Carbon::now()->addHours(1)) }}
                    </div>
                </span>
            @endif
        @elseif (new \Carbon\Carbon(date("y:m:d")) > new \Carbon\Carbon($exam->date_exam))
            <div class="alert alert-success cursor">الامتحان قد انتهى</div>
            <a href="{{ route("exam_results",["teacher_id"=>$data["teacher_id"]
                ,"month_id"=>$data["month_id"],"id"=>$exam->id]) }}" class="btn btn-outline-primary">
                عرض
            </a>
        @else
            <span class="table-danger d-block cursor">الامتحان لم يبدا بعد</span>
        @endif
        </div>
    </div>
</div>
@empty
    <div class="alert alert-danger">لا توجد امتحانات بعد</div>
@endforelse
