@extends("layouts_teacher_view.main-profile")

@section("content")
    <div class="app-content content">
        <div class="container">
            <div class="main">
                <h2 style="text-align: right;"> الملف الشخصى :- {{ $student->name }} </h2>
                <form action="{{ route("profile.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $student->id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">البريد الالكترونى</label>
                        <input type="email" class="form-control" value="{{ $student->email }}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="أدخل البريد الالكترونى">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">الاسم</label>
                        <input type="text" class="form-control" value="{{ $student->name }}" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="أدخل الاسم">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">رقم الهاتف</label>
                        <input type="tel" class="form-control" name="phonenumber" value="{{ $student->phonenumber }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="أدخل رقم الهاتف">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">كلمة المرور</label>
                        <input type="hidden" name="password_id" value="{{ $student->password }}">
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <label for="">أرفع صورة البروفايل</label>
                        <input class="form-control form-control-lg" id="img" name="img" type="file">
        
                        <span class="text-danger"> </span>
        
                    </fieldset>
        
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <label for="desc">أدخل اسم المرحلة الدراسية</label>
                        <select name="school_grade_id" id="" class="form-control form-control-lg">
                            <option value="{{ $student->school_grade_id }}">أدخل اسم المرحلة الدراسية</option>
                            @forelse ($school_grades as $school_grade)
                            <option value="{{ $school_grade->id }}">{{ $school_grade->name }}</option>
                            @empty
                            <option value="0">لا توجد مراحل دراسية بعد</option>
                            @endforelse
                        </select>
        
                        <span class="text-danger"> </span>
        
                    </fieldset>
        
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <label for="desc">أدخل اسم المجموعة</label>
                        <select name="group_id" id="" class="form-control form-control-lg">
                            <option value="{{ $student->group_id }}">أدخل اسم المجموعة الدراسية</option>
                            @forelse ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                            @empty
                            <option value="0">لا توجد مجموعة دراسية بعد</option>
                            @endforelse
                        </select>
        
                        <span class="text-danger"> </span>
        
                    </fieldset>
                    
                    <button type="submit" class="btn btn-success">تعديل</button>
                </form>
            </div>
           </div>
    </div>
@endsection
