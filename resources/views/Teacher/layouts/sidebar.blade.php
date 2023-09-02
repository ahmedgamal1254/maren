<div id="dw-s1" class="bmd-layout-drawer bg-faded">
    <div class="container-fluid side-bar-container">
        <header class="pb-0">
            {{-- <a class="navbar-brand">
                <img class="side-logo" src="assets/images/logo/logo.png" />
            </a> --}}
        </header>
    </div>
</div>

<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{ route("teacher") }}"><i class="fa fa-home"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation">
            <li class="main-item">
                <a class="ul-text" href="{{ route("school_grade") }}"><i class="fas fa-users"></i> <span>الطلاب</span>
                </a>
                <ul class="menu-content" style="display: block;">
                    <div class="side-item-container ">
                        <li class="nav-item">
                            <a class="ul-text"><i class="fa-solid fa-graduation-cap"></i>الصفوف الدراسية</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("school_grade") }}"><i class="fa-solid fa-graduation-cap"></i>الصفوف الدراسية</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("school_grade.add") }}"><i class="fas fa-plus"></i>ااضافة صف جديد</a></li>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="ul-text"><i class="fa-solid fa-graduation-cap"></i>المجموعات</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("class") }}"><i class="fa-solid fa-graduation-cap"></i>المجموعات</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("class.add") }}"><i class="fas fa-plus"></i>ااضافة مجموعة جديدة</a></li>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="ul-text"><i class="fas fa-users mr-1"></i> <span>الطلاب</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("students") }}"><i class="fas fa-users"></i>الطلاب</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("students.points") }}"><i class="fas fa-user-graduate"></i>ترتيب الطلاب حسب النقط</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("students.add") }}"><i class="fas fa-plus"></i>ااضافة طالب جديد</a></li>
                                </div>
                            </ul>
                        </li>
                    </div>
                </ul>
            </li>

            <li class="main-item">
                <a class="ul-text" href="{{ route("school_grade") }}"><i class="fas fa-school"></i> <span>المحتوى التعليمى</span>
                </a>
                <ul class="menu-content" style="display: block;">
                    <div class="side-item-container ">
                        <li class="nav-item">
                            <a class="ul-text"><i class="fa-solid fa-chalkboard"></i> <span>الامتحانات</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("exams") }}"><i class="fa-solid fa-chalkboard"></i> الامتحانات</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("exam.add") }}"><i class="fas fa-plus"></i>ااضافة امتحان جديد</a></li>
                                </div>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="ul-text"><i class="fa-solid fa-chalkboard"></i> <span>الاسئلة</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("questions") }}"><i class="fa-solid fa-chalkboard"></i> الاسئلة</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("question.add") }}"><i class="fas fa-plus"></i>ااضافة سؤال جديد</a></li>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="ul-text"><i class="fa-solid fa-champagne-glasses"></i> <span>الكورسات</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("lessons") }}"><i class="fas fa-screen-users"></i>الدروس</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("lesson.add") }}"><i class="fas fa-plus"></i>ااضافة درس جديد</a></li>

                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="ul-text"><i class="fa-solid fa-champagne-glasses"></i> <span>الوحدات</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("units") }}"><i class="fas fa-screen-users"></i>الوحدات</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("unit.add") }}"><i class="fas fa-plus"></i>ااضافة وحدة جديدة</a></li>

                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="ul-text"><i class="fa-solid fa-file-lines mr-1"></i> <span>المرفقات</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("books") }}"><i class="fas fa-blog"></i>المرفقات</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("book.add") }}"><i class="fas fa-blog"></i>ااضافة كتاب جديد</a></li>
                                </div>
                            </ul>
                        </li>
                    </div>
                </ul>
            </li>

            <li class="main-item">
                <a class="ul-text" href="{{ route("school_grade") }}"><i class="fas fa-blog"></i> <span>التدوينات</span>
                </a>
                <ul class="menu-content" style="display: block;">
                    <div class="side-item-container ">
                        <li class="nav-item">
                            <a class="ul-text"><i class="fas fa-blog mr-1"></i> <span>المنشورات</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("posts") }}"><i class="fas fa-blog"></i>المنشورات</a></li>
                                    <li class="side-item"><a class="nav-item" href="{{ route("post.add") }}"><i class="fas fa-blog"></i>ااضافة منشور جديد</a></li>
                                </div>
                            </ul>
                        </li>
                    </div>
                </ul>
            </li>
            <li class="main-item">
                <a class="ul-text" href="{{ route("school_grade") }}"><i class="fas fa-coins"></i> <span>النقاط والحوافز</span>
                </a>
                <ul class="menu-content" style="display: block;">
                    <div class="side-item-container ">
                        <li class="nav-item">
                            <a class="ul-text"><i class="fas fa-coins mr-1"></i> <span>النقاط</span>
                            </a>
                            <ul class="menu-content">
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("students.points") }}"><i class="fas fa-coins"></i>أعلى الطلاب نقاطا</a></li>
                                </div>
                                <div class="side-item-container ">
                                    <li class="side-item"><a class="nav-item" href="{{ route("students.points") }}"><i class="fas fa-dollar"></i>عمليات ااضافة الرصيد</a></li>
                                </div>
                            </ul>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</div>
