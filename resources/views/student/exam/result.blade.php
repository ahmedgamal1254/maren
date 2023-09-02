<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
</head>
<body>
    <div class="container">
        <div class="container">
            @if (session('status'))
                <div class="card">
                    <div class="card-header">
                    الامتحان
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">
                        <div class="alert alert-success">
                            {{ session('congrats') }}
                        </div>
                    </h5>
                    <p class="card-text">قد حصلت على مجموع درجات {{ session("degree") }} من {{ session("total") }}</p>
                    <p class="card-text">قد حصلت على نسية مئوية {{ session("percent") }}</p>
                    <a href="{{ route("student_teacher",["id"=>session("teacher_id")]) }}" class="btn btn-primary">العودة للصفحة الرئيسية</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
</body>
</html>

