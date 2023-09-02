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
            <li class="nav-item active"><a href="{{ route("student_teacher",[$teacher->id]) }}"><i class="la la-mouse-pointer"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{ $teacher->name }}</span></a>
            </li>

            <li class="nav-item"><a href="#"><i class="fa fa-book"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">الكتب والملخصات</span></a>
            </li>

            <li class="nav-item"><a href="#"><i class="fa fa-blog"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">المنشورات</span></a>
            </li>

            <li class="nav-item"><a href="#"><i class="fa fa-video"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">الفيديوهات</span></a>
            </li>

            <li class="nav-item"><a href="#"><i class="fa-solid fa-graduation-cap"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">الامتحانات</span></a>
            </li>

            <li class="nav-item"><a href="{{ route("payments",["id"=>$teacher->id]) }}"><i class="fa-solid fa-dollar"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">الدفع</span></a>
            </li>
        </ul>
    </div>
</div>
