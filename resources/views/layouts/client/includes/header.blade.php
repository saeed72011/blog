<header class="uix-header__container">

    <div class="uix-header">
        <div class="container">

            <div class="uix-brand">
                <a href="{{route('home')}}"><img src="{{assetFile(@$setting->logo)}}" alt="{{@$setting->title}}"></a>
            </div>
            <!-- .uix-brand end -->


            <!-- Navigation Start-->

            <nav class="uix-menu__container">

                <div class="uix-menu__inner">

                    <span class="uix-brand--mobile"><img src="{{assetFile(@$setting->logo)}}"
                                                         alt="{{@$setting->title}}"></span>
                    <ul class="uix-menu">

                        <li>
                            <button onclick="document.location='{{route('home')}}#about'">{{@$setting->name  ?? 'درباره'}}</button>
                        </li>

                        <li>
                            <button onclick="document.location='{{route('home')}}#articles'">مقالات</button>
                        </li>

                        <li>
                            <button onclick="document.location='{{route('home')}}#teams'">تیم</button>
                        </li>

                        <li>
                            <button onclick="document.location='{{route('home')}}#portfolios'">نمونه کار</button>
                        </li>

                        <li>
                            <button onclick="document.location='{{route('home')}}#contact'">تماس با ما</button>
                        </li>

                    </ul>
                    @if(\App\Models\Social::all()->count() > 0)
                    <div class="uix-menu__right-box">
                        @foreach(\App\Models\Social::all() as $social)
                            <a class="uix-social-btn uix-social-btn--small uix-social-btn--circle uix-social-btn--thin uix-social-btn--white"
                               title="{{$social->title}}" href="{{$social->url}}" target="_blank">
                                <i class="{{$social->icon}}"></i>
                            </a>
                        @endforeach
                    </div>
                    @endif
                </div><!-- /.uix-menu__inner -->

            </nav>
            <!-- .uix-menu__container end -->


        </div>
        <!-- .container end -->

        <div class="uix-clearfix"></div>
    </div>

</header>
<div class="uix-header__placeholder js-uix-header__placeholder-autoheight"></div>