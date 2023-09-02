@extends('layouts.guest')

@section('login')
<section class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="form login">
        <div class="form-content">
            <header>تسجيل دخول كطالب</header>
            <form action="{{ route("store_user") }}" method="POST">
                @csrf
                <div class="field input-field">
                    <input type="email" placeholder="Email" name="email" class="input">
                </div>
                <div class="field input-field">
                    <input type="password" placeholder="Password" name="password" class="password">
                    <i class='bx bx-hide eye-icon'></i>
                </div>
                <div class="form-link">
                    <a href="#" class="forgot-pass">هل نسيت كلمت السر ؟</a>
                </div>
                <div class="field button-field">
                    <button>تسجيل دخول</button>
                </div>
            </form>
            <div class="form-link">
                <span>ليس لديك حساب من قبل ؟ <a href="{{ route("register") }}">حساب جديد</a></span>
            </div>
        </div>
        <div class="line"></div>
        <div class="media-options">
            <a href="#" class="field facebook">
                <i class='bx bxl-facebook facebook-icon'></i>
                <span>تسجيل الدخول بالفيس بوك</span>
            </a>
        </div>
        <div class="media-options">
            <a href="{{ route("socilaite.social_login",["provider" => 'google']) }}" class="field google">
                <i class="fa fa-google"></i>
                <span>تسجيل الدخول بحساب جوجل</span>
            </a>
        </div>
    </div>
</section>
@endsection
