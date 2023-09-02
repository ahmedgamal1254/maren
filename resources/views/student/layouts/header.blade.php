<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                    class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route("user-profile") }}">
                        <img class="brand-logo" alt="modern admin logo"
                             src="https://cdn.iconscout.com/icon/free/png-256/free-avatar-370-456322.png?f=webp">
                        <h3 class="brand-text">{{ Auth::user()->name }}</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                        class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                        class="ficon ft-maximize"></i></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-md-block">
                        <div class="absolute inset-0 flex flex-col justify-center items-center space-y-20">
                            <div class="flex space-x-4">
                              <div class="card-coin">
                                <div class="card-content p-0 flex" style="padding: 10px 32px!important;">
                                  <div class="spinningasset coin is-sm">
                                    <div>
                                      <div></div>
                                      <i></i>
                                      <i></i>
                                      <i></i>
                                      <i></i>
                                      <i></i>
                                      <i></i>
                                      <i></i>
                                      <i></i>
                                      <i></i>
                                      <i></i>
                                      <i></i>
                                      <em></em>
                                      <div></div>
                                    </div>
                                  </div>
                                  <div class="ml-2 fs-2" id="active_points" style="color: white;font-size: 24px;">
                                    {{ Auth::user()->active_points }}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
