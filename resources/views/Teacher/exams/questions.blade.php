@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="question">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" style="z-index: 9999;position: fixed;top: 80px;
            left: 5px;" data-toggle="modal" data-target="#exampleModal">
                اضافة سؤال جديد
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> اضافة سؤال جديد لهذا لاامتحان</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form id="submit_question" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" value="{{ $exam_id }}" name="exam_id">
                            <input type="hidden" value="{{ $exam->units_id }}" name="units_id">

                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <input type="text" name="title"
                                    class="form-control form-control-lg input-lg"
                                    id="email" value="{{ old("title") }}" placeholder="أدخل عنوان السؤال">
                                <div class="form-control-position">
                                    <i class="fa fa-school"></i>
                                </div>

                                <span class="text-danger"> </span>

                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <label for="desc">أدخل وصف السؤال</label>
                                <textarea type="text" value="{{ old("description") }}" name="description" id="desc" cols="30" rows="3"
                                    class="form-control form-control-lg input-lg"
                                    value="" id="email" placeholder="أدخل وصف السؤال"></textarea>

                                <span class="text-danger"> </span>
                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <label for="desc">أدخل نوع السؤال</label>
                                <select name="type_question" id="" class="form-control form-control-lg">
                                    <option value="اختيارات">اختيارات</option>
                                    <option value="مقالى">مقالى</option>
                                    <option value="صح وخطأ">صخ وخطأ</option>
                                </select>

                                <span class="text-danger"> </span>

                            </fieldset>

                            <div class="form-group">
                                <label style="color: black;font-size:20px;margin-bottom:10px;">الاختيارات </label>
                                <textarea type="text" value="{{ old("chooses") }}"" name="chooses" id="desc" cols="30" rows="3"
                                class="form-control form-control-lg input-lg"
                                value="" id="email" placeholder="أدخل الاختيارات للسؤال مثل صح,خطأ"></textarea>
                            </div>

                            <div class="message" id="message"></div>
                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <input type="text" name="answer"
                                    class="form-control form-control-lg input-lg"
                                    value="{{ old("answer") }}" id="" placeholder="أدخل اجابة السؤال">
                                <div class="form-control-position">
                                    <i class="fa fa-school"></i>
                                </div>

                                <span class="text-danger"> </span>

                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <label for="desc">أدخل اسم المرحلة الدراسية</label>
                                <select name="school_grade_id" id="" class="form-control form-control-lg">
                                    <option value="">أدخل اسم المرحلة الدراسية</option>
                                    @forelse ($school_grades as $school_grade)
                                    <option value="{{ $school_grade->id }}">{{ $school_grade->name }}</option>
                                    @empty
                                    <option value="0">لا توجد مراحل دراسية بعد</option>
                                    @endforelse
                                </select>
                                <span class="text-danger"> </span>
                            </fieldset>

                            <div class="mb-1">
                                <div class="tags-input">
                                    <input type="text" id="input-tag"
                                        placeholder="ابحص باسم الوحدة" />
                                </div>
                                <select name="unit_id" id="select" class="form-control form-control-lg">
                                    <option value="">أدخل اسم الوحدة</option>
                                    @forelse ($unit_codes as $unit)
                                    <option value="{{ $unit->title }}" data-id="{{ $unit->id }}">{{ $unit->title }}</option>
                                    @empty
                                    <option value="0">لا توجد وحدة دراسية بعد</option>
                                    @endforelse
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="alert alert-primary">الامتحانات الدراسية</div>
            <input type="hidden" name="exam_id" value="{{ $exam_id }}">
            @forelse ($questions as $question)
                <div class="card">
                    <div class="card-header">
                      عنوان السؤال :- {{ $question->name }}
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">نمط السؤال :- {{ $question->type }}</h5>
                      <p class="card-text">
                        <p class="card-text">الاحتيارات</p>
                        <ul class="list-group">
                            @forelse (explode(',',$question->chooses) as $item)
                            <li class="list-group-item">{{ $item }}</li>
                            @empty

                            @endforelse
                        </ul>
                      </p>
                        <input type="hidden" name="exam_id" value="{{ $exam_id }}">
                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                        <button class="btn btn-primary btn_add_question_to_exam" type="button">اضافة</button>
                    </div>
                </div>
            @empty

            @endforelse
            {{ $questions->links() }}
            <div style="margin: 50px"></div>
            <div class="success"></div>
    </div>
</div>
@endsection

@section("script")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var elements = document.getElementsByClassName("btn_add_question_to_exam");
    Array.from(elements).forEach(function(element) {
      element.addEventListener('click', function (){
        $.ajax({
                url: "{{ route('store_ajax_student') }}",
                type: 'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    'exam_id': {{ $exam_id }},
                    'question_id': this.previousElementSibling.value
                },
                success: function(data) {
                    // Set the options that I want
                    swal(data["msg"]);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle any errors
                    console.log('Error:', textStatus, errorThrown);
                }
        });
      });
    });

    document.getElementById("submit_question").addEventListener('submit', function (e){
        e.preventDefault();

        $.ajax({
            url: "{{ route('store_ajax_question') }}",
            type: 'POST',
            data:$(this).serialize(),
            success: function(data) {
                // Set the options that I want
                swal(data["data"])
                document.getElementById("submit_question").reset()
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle any errors
                console.log('Error:', textStatus, errorThrown);
            }
        });
    });

    document.getElementById("input-tag").addEventListener("input",function (){
        val=document.getElementById("input-tag").value
        selection=document.getElementById("select")
        selection.innerHTML=''
        $.ajax({
            url:  "/teacher/units/search?search="+val,
            type: 'get',
            success: function(data) {
                if(data["data"].length >0){
                    for(i=0;i<data["data"].length;i++){
                        selection.innerHTML+=`<option value="${data["data"][i].title}"
                        data-id="${data["data"][i].id}">${data["data"][i].title}</option>`
                    }
                }else{
                    select.innerHTML='لا توجد نتائج لعرضها'
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle any errors
                console.log('Error:', textStatus, errorThrown);
            }
        });
    })
</script>
@endsection
