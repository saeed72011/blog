<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" >
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('dashboard')}}">
                    <div class="brand-logo">
                        <img src="{{assetFile($setting->favicon)}}" alt="favicon">
                    </div>
                    <h2 class="brand-text mb-0">{{@$setting->name}}</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i
                        class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
            data-icon-style="lines">

            <li class=" nav-item"><a href="{{route('dashboard')}}"><i class="menu-livicon" data-icon="dashboard"></i><span
                        class="menu-title" data-i18n="Email">داشبورد</span></a>
            </li>

            <li class=" nav-item"><a href="{{route('users.index')}}"><i class="menu-livicon" data-icon="user"></i><span
                            class="menu-title" data-i18n="Email">کاربران</span></a>
            </li>

            <li class="nav-item"><a href="{{route('categories.index')}}"><i class="menu-livicon" data-icon="diagram"></i><span
                        class="menu-title" data-i18n="Email">دسته بندی</span></a>
            </li>

            <li class=" nav-item"><a href="{{route('articles.index')}}"><i class="menu-livicon" data-icon="pen"></i><span
                        class="menu-title" data-i18n="Email">مقالات</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('images.index')}}"><i class="menu-livicon" data-icon="image"></i><span
                        class="menu-title" data-i18n="Email">تصاویر</span></a>
            </li>
            <li class="nav-item"><a href="{{route('comments.index')}}"><i class="menu-livicon" data-icon="comment"></i><span
                        class="menu-title" data-i18n="Email">نظرات</span></a>
            </li>
            <li class="nav-item"><a href="{{route('socials.index')}}"><i class="menu-livicon" data-icon="diagram"></i><span
                            class="menu-title" data-i18n="Email">شبکه های اجتماعی</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('sliders.index')}}"><i class="menu-livicon" data-icon="image"></i><span
                            class="menu-title" data-i18n="Email">اسلایدر</span></a>
            </li>
            <li class="nav-item"><a href="{{route('messages.index')}}"><i class="menu-livicon" data-icon="comment"></i><span
                            class="menu-title" data-i18n="Email">پیام ها</span></a>
            </li>
            <li class="nav-item"><a href="{{route('portfolios.index')}}"><i class="menu-livicon" data-icon="pen"></i><span
                            class="menu-title" data-i18n="Email">نمونه کارها</span></a>
            </li>
            <li class="nav-item"><a href="{{route('teams.index')}}"><i class="menu-livicon" data-icon="users"></i><span
                            class="menu-title" data-i18n="Email">تیم</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('logout')}}"><i class="menu-livicon" data-icon="lock"></i><span
                            class="menu-title" data-i18n="logout">خروج</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
