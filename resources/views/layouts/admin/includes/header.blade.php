<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <i class="ficon bx bx-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                    </ul>
                    <ul class="nav navbar-nav">
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="{{route('dashboard')}}" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name">{{auth()->user()->name ?? 'بدون نام'}}</span>
                                <span class="user-status text-muted">سلام</span>
                            </div>
                            <span>
                                <img class="round" src="{{asset('dashboard/assets/images/logo/avatar.jpg')}}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu pb-0">
                            <a class="dropdown-item" href="#"><i class="bx bx-user mr-50"></i> تغییر رمز</a>

                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="{{route('logout')}}">
                                <i class="bx bx-power-off mr-50"></i> خروج</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
