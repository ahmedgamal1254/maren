@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الامتحانات الدراسية</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route("exam.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="code"
                       class="form-control form-control-lg input-lg"
                       value="{{ old("code") }}" id="email" placeholder="أدخل كود الامتحان">
                <div class="form-control-position">
                    <i class="fa fa-school"></i>
                </div>

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="desc">أدخل مدة الامتحان</label>
                <select name="duration" id="" class="form-control form-control-lg">
                    <option value="30">30 دقيقة</option>
                    <option value="15">15 دقيقة</option>
                    <option value="45">45 دقيقة</option>
                    <option value="60">60 دقيقة</option>
                    <option value="90">90 دقيقة</option>
                    <option value="120">120 دقيقة</option>
                </select>

                <span class="text-danger"> </span>

            </fieldset>


            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="date_exam">وقت عرض الامتحان</label>
                <small>أدحل الشهر والسنة المراد عرض فيهم الامتحان</small>
                <input class="form-control form-control-lg" value="{{ old("date_exam") }}" id="date_exam" name="date_exam" type="date">

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="time_start">ميعاد عرض الامتحان</label>
                <small>أدحل وقت بداية الامتحان</small>
                <input class="form-control form-control-lg" name="time_start" value="{{ old("time_start") }}" type="time">

                <span class="text-danger"> </span>

            </fieldset>

            <fieldset class="form-group position-relative has-icon-left mb-0">
                <label for="time_end">ميعاد نهاية عرض الامتحان</label>
                <small>أدحل وقت انتهاء الامتحان</small>
                <input class="form-control form-control-lg" name="time_end" value="{{ old("time_end") }}" type="time">

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
                    <ul id="tags"></ul>
                    <input type="text" id="input-tag"
                        placeholder="ابحث باسم الوحدة" />
                </div>
                <select name="" id="select" multiple class="form-control form-control-lg">
                    <option value="">أدخل اسم الوحدة</option>
                    @forelse ($units as $unit)
                    <option value="{{ $unit->title }}" data-id="{{ $unit->id }}">{{ $unit->title }}</option>
                    @empty
                    <option value="0">لا توجد وحدة دراسية بعد</option>
                    @endforelse
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-1">ارسال</button>
        </form>
    </div>
</div>
@endsection

@section("script")
<script>

    // Get the tags and input elements from the DOM
    const tags = document.getElementById('tags');
    const input = document.getElementById('input-tag');
    const select = document.getElementById('select');

    // Add an event listener for keydown on the input element
    select.addEventListener('change', function (event) {
        // Create a new list item element for the tag
        const tag = document.createElement('li');

        const tagContent = select.value.trim();

        tag.innerText = tagContent;
        tag.innerHTML += `<input type="hidden"
        value="${this.options[this.selectedIndex].getAttribute("data-id")}"
         name="unit_${this.options[this.selectedIndex].getAttribute("data-id")}" />`;
        // Add a delete button to the tag
        tag.innerHTML += '<button class="delete-button">X</button>';

        // Append the tag to the tags list
        tags.appendChild(tag);

        // Clear the input element's value
        input.value = '';

    });

    // Add an event listener for click on the tags list
    tags.addEventListener('click', function (event) {

        // If the clicked element has the class 'delete-button'
        if (event.target.classList.contains('delete-button')) {

            // Remove the parent element (the tag)
            event.target.parentNode.remove();
        }
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
