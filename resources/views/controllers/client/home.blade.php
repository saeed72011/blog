@extends('layouts.client.app')
@section('content')


    <div class="container">

        @isset($sliders)
            <div class="uix-spacing--s">
                <div class="row mt-2">
                    <div class="col-12">

                        <div role="slider" class="uix-flexslider"
                             data-draggable="false"
                             data-my-nav-thumbs="false"
                             data-my-prev-next-thumbs="false"
                             data-my-nav-timeline=".my-timeline-nav-1"
                             data-my-controls="false"
                             data-my-multiple-items="false"
                             data-my-multiple-items-move="1"
                             data-my-count-total="false"
                             data-my-count-now="false"
                             data-my-parallax="false"
                             data-my-sync="false"
                             data-wheel="false"
                             data-speed="600"
                             data-timing="10000"
                             data-loop="true"
                             data-paging="true"
                             data-arrows="true"
                             data-animation="slide"
                             data-auto="true"
                             data-prev="<i class='fa fa-chevron-left'></i>"
                             data-next="<i class='fa fa-chevron-right'></i>">

                            <div class="uix-flexslider__inner">

                                @foreach($sliders as $slider)
                                    <div class="uix-flexslider__item">
                                        <a href="{{@$slider->url ?? '#'}}">
                                            <img src="{{assetFile($slider->image)}}" alt="{{@$slider->title}}"/>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                        <div class="uix-flexslider__timeline-nav my-timeline-nav-1"><span></span></div>


                    </div>
                </div>
            </div>
        @endisset

        <div class="uix-spacing--s" id="about">
            <div class="row mt-md-5">
                <div class="col-12 col-md-6">
                    <h1 class="uix-heading--placeholder-line font-medium-3">{{@$setting->name}}</h1>
                    <p style="text-align: justify;">
                        {{@$setting->about}}
                    </p>
                </div>
                <div class="col-12 col-md-6">
                    <h2 class="uix-heading--placeholder-line"> {{ str('مراحل انجام کار در')->append(@$setting->name) }}</h2>
                    <div class="uix-list uix-list--numbered-large uix-list--numbered-bg">
                        <ol>
                            <li><p>مشاوره ، بازدید و برداشت پلان محل پروژه</p></li>
                            <li><p>طراحی تخصصی سه بعدی پروژه و ویرایش</p></li>
                            <li><p>عقد قرارداد ، تولید و شروع اجرای پروژه</p></li>
                            <li><p>تحویل پروژه و اخذ رضایت مشتری ، شروع تعهد</p></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @isset($articles)
            <div class="uix-spacing--s" id="articles">
                <div class="container uix-t-c mt-md-5">
                    <h2 class="uix-heading--placeholder-line"> {{ str('مقالات ')->append(@$setting->name) }}</h2>

                    <div class="uix-core-grid">

                        <div class="uix-core-grid__row uix-core-grid__row--loop">

                            <div class="uix-gallery" data-show-type="" data-filter-id="">

                                <div class="uix-gallery__tiles">

                                @foreach($articles as $article)
                                    <!-- Item -->
                                        <article class="uix-core-grid__col-4 uix-gallery__item">

                                            <div>
                                                <a href="{{route('blog.detail', ['article' => $article->slug])}}"
                                                   class="uix-gallery__image">
                                                    <div class="uix-gallery__image-cover">
                                                        <img src="{{assetFile($article->image)}}"
                                                             alt="{{$article->title}}">

                                                    </div>
                                                </a>
                                                <h3 class="text-center">
                                                    <a href="{{route('blog.detail', ['article' => $article->slug])}}">{{$article->title}}</a>
                                                </h3>

                                            </div>


                                        </article>
                                        <!--  .uix-gallery__item  end -->
                                    @endforeach

                                </div>
                                <!-- .uix-gallery__tiles end -->


                            </div>
                            <!-- .uix-gallery end -->


                        </div>
                        <!-- .uix-core-grid__row  end -->
                    </div>


                    <a href="{{route('blog')}}" tabindex="0"
                       class="uix-btn uix-btn__border--thin uix-btn__margin--b uix-btn__size--t uix-btn__bg--primary is-fullwidth">
                        مشاهده همه</a>


                </div>
                <!-- .container end -->
            </div>
        @endisset

        @isset($teams)
            <div class="uix-spacing--s" id="teams">
                <div class="container uix-t-c mt-md-5">
                    <div class="row">
                        <div class="col-12">

                            <h2 class="uix-heading--placeholder-line">{{ str('تیم ')->append(@$setting->name) }}</h2>
                            <div class="uix-team--grid">

                                <div class="uix-core-grid">


                                    <div class="uix-core-grid__row uix-core-grid__row--loop">

                                        @foreach($teams as $team)
                                            <div class="uix-core-grid__col-3 uix-core-grid__col-6--md">
                                                <div class="uix-team--grid__item">
                                                    <div class="uix-team--grid__img uix-border--circle m-auto"><img
                                                                src="{{$team->image ? assetFile($team->image ) : ($team->gender == 'sir' ? 'client/images/avatar/male.png' : 'client/images/avatar/female.png')}}"
                                                                alt="{{$team->name}}">
                                                    </div>
                                                    <h3>{{@$team->name}}</h3>
                                                    <h4>{{@$team->position}}</h4>
                                                    <h4>{{@$team->mobile}}</h4>
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                    <!-- .uix-core-grid  end -->
                                </div>
                                <!-- /.uix-core-grid -->
                            </div>
                            <!-- /.uix-team--grid -->
                        </div>
                    </div>
                    <!-- .row end -->


                </div>
                <!-- .container end -->

            </div>
        @endisset

        @isset($portfolios)
            <div class="uix-spacing--s" id="portfolios">
                <div class="container uix-t-c mt-md-5">
                    <h2 class="uix-heading--placeholder-line"> {{ str('نمونه کارهای ')->append(@$setting->name) }}</h2>

                    <div class="uix-core-grid">

                        <div class="uix-core-grid__row uix-core-grid__row--loop">

                            <div class="uix-gallery">
                                <div class="uix-gallery__tiles">
                                    <!-- Item -->
                                    @foreach($portfolios as $portfolio)
                                        <article class="uix-core-grid__col-4 uix-gallery__item">

                                            <div>
                                                <a href="{{route('portfolio.detail', ['portfolio' => $portfolio->slug])}}"
                                                   class="uix-gallery__image">
                                                    <div class="uix-gallery__image-cover">
                                                        <img src="{{assetFile($portfolio->image)}}"
                                                             alt="{{assetFile($portfolio->title)}}">

                                                    </div>
                                                </a>
                                                <h3>
                                                    <a href="{{route('portfolio.detail', ['portfolio' => $portfolio->slug])}}">{{$portfolio->title}}</a>
                                                </h3>
                                            </div>
                                        </article>
                                @endforeach
                                <!--  .uix-gallery__item  end -->
                                </div>
                            </div>
                            <!-- .uix-gallery end -->
                        </div>
                        <!-- .uix-core-grid__row  end -->
                    </div>
                    <!-- /.uix-core-grid -->


                    <a href="{{route('portfolio')}}" tabindex="0"
                       class="uix-btn uix-btn__border--thin uix-btn__margin--b uix-btn__size--t uix-btn__bg--primary is-fullwidth">
                        مشاهده همه</a>


                </div>
                <!-- .container end -->


            </div>
        @endisset

        <div class="uix-spacing--s" id="contact">
            <div class="container">
                <h2 class="uix-heading--placeholder-line"> {{ str('تماس با ')->append(@$setting->name) }}</h2>

                <div class="row">

                    <div class="col-lg-6 col-md-6 uix-trans">

                        <livewire:client.messages.create-message/>

                    </div>
                    <div class="col-lg-6 col-md-6 uix-trans">

                        <a href="{{'google.map'}}"
                           class="uix-social-btn uix-social-btn--medium  uix-social-btn--rounded mr-2"><i
                                    class="fa fa-address-card"></i></a><span
                                class="p-3 ">{{@$setting->address}}</span><br>
                        <a href="{{'rel:' . @$setting->phone}}"
                           class="uix-social-btn uix-social-btn--medium  uix-social-btn--rounded mt-3 mr-2"><i
                                    class="fa fa-phone"></i></a><span class="p-3 ">{{@$setting->phone}}</span><br>
                        <a href="{{'rel:' . @$setting->mobile}}"
                           class="uix-social-btn uix-social-btn--medium  uix-social-btn--rounded mt-3 mr-2"><i
                                    class="fa fa-mobile"></i></a><span class="p-3 ">{{@$setting->mobile}}</span><br>
                        <a href="{{'mail:' . @$setting->email}}"
                           class="uix-social-btn uix-social-btn--medium  uix-social-btn--rounded mt-3 mr-2"><i
                                    class="fa fa-mail-bulk"></i></a><span class="p-3 ">{{@$setting->email}}</span><br>

                    </div>

                </div>
            </div>
        </div>


    </div>
    <!-- /.swiper-container -->
@endsection

@push('scripts')
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "{{@$setting->title . '-' . @$setting->name}}",
          "url": "{{@$setting->url}}",
          "logo": "{{assetFile(@$setting->logo)}}"
        }
    </script>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "name": "{{@$setting->title . '-' . @$setting->name}}",
          "image": "{{assetFile(@$setting->image)}}",
          "@id": "{{@$setting->url}}",
          "url": "{{assetFile(@$setting->url)}}",
          "telephone": "{{@$setting->phono}}",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{@$setting->address}}",
            "addressLocality": "{{@$setting->city}}",
            "addressCountry": "IR"
          },
        "geo": {
        "@type": "GeoCoordinates",
        "latitude": {{@$setting->latitude}},
        "longitude": {{@$setting->longitude}}
        },
        "openingHoursSpecification": {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Saturday",
            "Sunday"
          ],
            "opens": "{{@$setting->opens}}",
            "closes": "{{@$setting->closes}}"
            }
        }
























    </script>

@endpush