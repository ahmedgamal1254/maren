<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>أهلا وسهلا بك :- {{ Auth::user()->name }}</title>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/dashboard.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
</head>
<body>
<div class="container">
    @if (Auth::user()->school_grade_id != Null)
        {{-- card for teachers to choose from him --}}
        <div class="row">
            @foreach ($teachers as $teacher)
                <div class="col-lg-6 col-sm-12 mb-sm-5">
                    <div class="card card-auto" style="width: 18rem;margin:auto;">
                        @if ($teacher->img_url)
                            <img src="{{ asset("app/". $teacher->img_url) }}" alt="{{ $teacher->name }}" class="card-img-top">
                        @else
                            <img class="card-img-top"
                                src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                                alt="{{ $teacher->name }}">
                        @endif
                        <div class="card-body">
                        <p class="card-text text-center">{{ $teacher->name }}</p>
                        <p class="card-text text-center">خبير فى مادة  {{ $teacher->subject_name }}</p>
                        </div>

                        <a href="{{ route("student_teacher",["id"=>$teacher->id]) }}" class="text-center">عرض المدرس</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- card for teachers to choose from him --}}
    @else
        <div class="alert alert-danger">
            انت لم تسجل بعد الصف الدراسى والمواد المراد دراستها
        </div>

        <div class="card">
            <a href="{{ route("student.add_subjects") }}" class="btn btn-primary">تسجيل  الصف الدراسى</a>
        </div>
    @endif
</div>

    <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/js/script.js") }}"></script>
</body>
</html>
