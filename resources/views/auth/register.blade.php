@extends("layouts.guest")

@section("login")
    <section class="container">
        <!-- Signup Form -->
    <div class="form">
        <div class="form-content">
            <header>تسجيل حساب جديد</header>
            <form action="{{ route("register") }}" method="POST">
                @csrf
                <div class="field input-field">
                    <input type="email" placeholder="البريد الالكترونى" name="email" class="input">
                </div>
                <div class="field input-field">
                    <input type="name" placeholder="الاسم" name="name" class="input">
                </div>
                <div class="field input-field">
                    <input type="password" placeholder="كلمة السر" name="password" class="password">
                </div>
                <div class="field input-field">
                    <input type="password" placeholder="تأكيد كلمة المرور" class="password">
                    <i class='bx bx-hide eye-icon'></i>
                </div>

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

                <fieldset class="form-group position-relative has-icon-left mb-0">
                    <label for="desc">أدخل اسم المادة الدراسية</label>
                    <select name="subject_id" id="" class="form-control form-control-lg">
                        <option value="">أدخل اسم المادة الدراسية</option>
                        @forelse ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                        @empty
                        <option value="0">لا توجد مواد دراسية بعد</option>
                        @endforelse
                    </select>

                    <span class="text-danger"> </span>

                </fieldset>

                <fieldset class="form-group position-relative has-icon-left mb-0">
                    <label for="desc">أدخل اسم المجموعة الدراسية</label>
                    <select name="group_id" id="" class="form-control form-control-lg">
                        <option value="">أدخل اسم المجموعة الدراسية</option>
                        @forelse ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                        @empty
                        <option value="0">لا توجد مجموعات دراسية بعد</option>
                        @endforelse
                    </select>

                    <span class="text-danger"> </span>

                </fieldset>

                <div class="field button-field">
                    <button>تسجيل حساب جديد</button>
                </div>
            </form>
            <div class="form-link">
                <span>لديك حساب بالفعل ؟ <a href="{{ route("login") }}" class="link login-link">تسجيل دخول</a></span>
            </div>
        </div>
        <div class="line"></div>
        <div class="media-options">
            <a href="#" class="field facebook">
                <img  src="{{ asset("assets/imgs/icons8-facebook-50.png") }}" />
                <span>Login with Facebook</span>
            </a>
        </div>
        <div class="media-options">
            <a href="{{ route("socilaite.social_login",["provider"=>'google']) }}" class="field google">
                <img src="{{ asset("assets/imgs/icons8-google-48.png") }}" alt="" class="google-img">
                <span>Login with Google</span>
            </a>
        </div>
    </div>
</section>
@endsection
