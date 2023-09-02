@extends("student.layouts.master")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div>
            <input type="hidden" name="exam_id" value="{{ $data["exam_id"] }}">
            <input type="hidden" name="teacher_id" value="{{ $data["teacher_id"] }}">
            <?php $i=0;
            $j=0 ?>
            @foreach ($data["questions"] as $question)
                <div class="form-group">
                    <div class="card" style="padding:15px;">السؤال رقم  {{ $question->name }} -: {{ ++$i }} </div>
                    @foreach (explode(",",$question->chooses) as $choose)
                        @if (($choose== $question->answer) and  ($question->answer == $question->student_answer))
                            <div class="d-block p-2 bg-success text-white position-relative">
                                <div>
                                    {{ $choose }}
                                </div>
                                <span  class="text-left position-absolute pos-ele">
                                    صحيح
                                </span>
                            </div>
                        @else
                            @if (($question->answer != $question->student_answer))
                                @if ($choose == $question->answer)
                                    <div class="d-block p-2 bg-success text-white position-relative">
                                        <div>
                                            {{ $choose }}
                                        </div>
                                        <span class="text-left position-absolute pos-ele">
                                            الصح
                                        </span>
                                    </div>
                                @elseif ($choose == $question->student_answer)
                                    <div class="d-block p-2 bg-danger text-white position-relative">
                                        <div>
                                            {{ $choose }}
                                        </div>
                                        <span class="text-left position-absolute pos-ele">
                                            الخطأ
                                        </span>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question_answer_{{ $question->id }}"
                                            value="{{ $choose }}" id="{{ $choose }}">
                                        <label class="form-check-label" for="{{ $choose }}">
                                            {{ $choose }}
                                        </label>
                                    </div>
                                @endif
                            @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question_answer_{{ $question->id }}"
                                        value="{{ $choose }}" id="{{ $choose }}">
                                    <label class="form-check-label" for="{{ $choose }}">
                                        {{ $choose }}
                                    </label>
                                </div>
                            @endif

                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section("css")
    <style>
        .pos-ele{
            left: 20px;
            top: 20px;
        }
    </style>
@endsection
