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
            @foreach (App\Models\Teacher::get() as $teacher)
                <li class="nav-item"><a href="{{ route("student_teacher",["id"=>$teacher->id]) }}">
                    <i class="fa-solid fa-user"></i><span
                    class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{ $teacher->name }}</span></a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
