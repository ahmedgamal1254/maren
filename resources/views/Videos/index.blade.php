<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chunk File Upload in Laravel</title>
    <link href="{{ asset("assets/css/bootstrap.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card w-50 m-auto">
                    <div class="card-header bg-info text-white">
                        <h4>رفع الفيديو ل درس {{ $lesson->title }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group" id="file-input">
                            <input type="hidden" name="lesson" id="lesson_id" value="{{ $lesson->id }}">
                            <input type="file" id="pickfiles" class="form-control">
                            <div id="filelist"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" id="percent">0%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset("assets/js/plupload.full.min.js") }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var path = "{{ asset('js/') }}";

            var uploader = new plupload.Uploader({
            browse_button: 'pickfiles',
            container: document.getElementById('file-input'),
            url: '{{ route("chunk.store") }}',
            chunk_size: '1MB', // 1 MB
            max_retries: 2,
            filters: {
                max_file_size: '700mb'
            },
            multipart_params : {
                // Extra Parameter
                "_token" : "{{ csrf_token() }}",
                "id" : "{{ $lesson->id }}"
            },
            init: {
                PostInit: function () {
                    document.getElementById('filelist').innerHTML = '';
                },
                FilesAdded: function (up, files) {
                    plupload.each(files, function (file) {
                        console.log('FilesAdded');
                        console.log(file);
                        document.getElementById('filelist').innerHTML+= '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                    });
                    uploader.start();
                },
                UploadProgress: function (up, file) {
                    console.log('UploadProgress');
                    console.log(file);
                    // document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                    document.getElementById("percent").innerHTML=file.percent + "%"
                    document.getElementById("percent").style.width=file.percent + "%"
                },
                FileUploaded: function(up, file, result){

                    console.log('FileUploaded');
                    console.log(file);
                    console.log(JSON.parse(result.response));
                    responseResult = JSON.parse(result.response);

                    if (responseResult.ok==0) {
                        toastr.error(responseResult.info, 'Error Alert', {timeOut: 5000});
                    }
                    if (result.status != 200) {
                        toastr.error('عفوا لم يتم رفع الفيديو', 'Error Alert', {timeOut: 5000});
                    }
                    if (responseResult.ok==1 && result.status == 200) {
                        toastr.success('تم رفع الفيديو بنجاح', 'رفع الفيديو', {timeOut: 5000});
                    }
                },
                UploadComplete: function(up, file){
                    // toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {timeOut: 5000});
                },
                Error: function (up, err) {
                    // DO YOUR ERROR HANDLING!
                    // toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {timeOut: 5000});
                    console.log(err);
                }
            }
        });
        uploader.init();
    });
</script>
</body>
</html>
