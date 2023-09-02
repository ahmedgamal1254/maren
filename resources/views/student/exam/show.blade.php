@extends("student.layouts.master")

@section("content")
<div class="app-content content">
    <div class="content-wrapper">
        <div>
            <form id="correct_exam" method="POST" action="{{ route("exam_correct") }}">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $data["exam_id"] }}">
                <input type="hidden" name="teacher_id" value="{{ $data["teacher_id"] }}">
                <?php $i=0;
                $j=0 ?>
                @foreach ($data["questions"] as $question)
                <div class="form-group">
                    <div class="card" style="padding:15px;">السؤال رقم  {{ $question->name }} -: {{ ++$i }} </div>
                    @foreach (explode(",",$question->chooses) as $choose)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question_answer_{{ $question->id }}"
                         value="{{ $choose }}" id="{{ $choose }}">
                        <label class="form-check-label" for="{{ $choose }}">
                          {{ $choose }}
                        </label>
                    </div>
                    @endforeach
                </div>
                @endforeach
                <button type="submit" class="btn btn-success">ارسال</button>
            </form>

            <div id="countdown">
                <div id="seconds"></div>
                <div id="minutes"></div>
                <div id="hours"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script>
    // Function to submit the form
    function submitForm() {
      document.getElementById("correct_exam").submit();
    }


    // prepare start_time of exam
    function prepare_start_time(start_exam){
        start_exam=start_exam.split(":")
        var today_start_exam = new Date();

        // // Set the desired time
        var desiredTime = new Date();
        desiredTime.setHours(Number(start_exam[0]));
        desiredTime.setMinutes(Number(start_exam[1]));
        desiredTime.setSeconds(Number(start_exam[2]));

        // Set today's date to the desired time
        today_start_exam.setHours(desiredTime.getHours());
        today_start_exam.setMinutes(desiredTime.getMinutes());
        today_start_exam.setSeconds(desiredTime.getSeconds());

        return today_start_exam;
    }


    today_start_exam=new Date(prepare_start_time("{{ $data["exam"]->start_time }}"))
    date_now=new Date()

    var diff = "{{ $data["exam"]->duration }}"*60; // Change this to the desired time in second

    differ=today_start_exam - date_now
    if(differ < 0){
        differ=(Math.abs(differ)/1000)
        diff=diff-differ
    }

    // Function to set the timer
    function setTimer() {
      var interval = setInterval(function() {
        diff=diff-1;

        hours=Math.floor(diff/3600)
        minutes=Math.floor((diff % (60*60))/60)
        seconds=Math.floor(diff - ((hours*3600) + (minutes*60)))

        // Set the timer
        setTimeout(submitForm, diff * 1000);

        // Display the countdown
        var countdown = document.getElementById("seconds");
        countdown.innerHTML = seconds < 10 ? `0${seconds}`:seconds;

        var countdown2 = document.getElementById("minutes");
        countdown2.innerHTML = minutes < 10 ? `0${minutes}`:minutes;;

        var countdown3 = document.getElementById("hours");
        countdown3.innerHTML = hours < 10 ? `0${hours}`:hours;;


        // Check if the time has finished
        if (diff < 0) {
          clearInterval(interval);
        }
      }, 1000);
    }
</script>
@endsection

@section("css")
<style>
/* Center the countdown */
#countdown {
  text-align: center;
  margin-top: 50px;
  font-family: Arial, sans-serif;
}

/* Style the countdown elements */
#countdown span {
    text-align: center;
    margin-top: 50px;
    font-family: Arial, sans-serif;
    width: 250px;
    position: fixed;
    left: 25px;
    top: 40px;
}

#countdown div {
  display: inline-block;
  background-color: black;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 20px;
}

</style>
@endsection

@section("code") onload="setTimer()" @endsection
