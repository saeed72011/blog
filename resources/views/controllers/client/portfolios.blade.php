@extends('layouts.client.app')
@section('content')

    <section class="uix-spacing--s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="uix-heading--pinline"> <span>{{ str('نمونه کارهای  ')->append(@$setting->name) }}</span> </h1>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container uix-t-c">
            <div class="row">
                <div class="col-12">
                    <div class="uix-nav uix-nav--separation" id="js-uix-navfilter-1">
                        <ul class="border">
                            <li class="current-cat"><a data-group="all" href="#">همه</a></li>
                            @foreach($categories as $category)
                                <li><a data-group="{{$category->slug}}" href="#">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>


                </div>
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->

    </section>

    <!-- Content
     ====================================================== -->
    <div class="uix-spacing--s">
        <div class="container uix-t-c">


            <div class="uix-gallery" data-show-type="filter" data-filter-id="#js-uix-navfilter-1">

                <div class="uix-gallery__tiles">

                    @foreach($portfolios as $portfolio)

                        <portfolio class="uix-core-grid__col-4 uix-gallery__item" data-groups='@json($portfolio->categories()->pluck('slug')->toArray())'>

                            <div>
                                <a href="{{route('portfolio.detail', ['portfolio' => $portfolio->slug])}}" class="uix-gallery__image" >
                                    <div class="uix-gallery__image-cover">
                                        <img src="{{assetFile($portfolio->image)}}" alt="{{$portfolio->title}}" />
                                    </div>
                                </a>
                                <h3>
                                    <a href="{{route('portfolio.detail', ['portfolio' => $portfolio->slug])}}">{{$portfolio->title}}</a>
                                </h3>

                            </div>



                        </portfolio>

                @endforeach


                <!--  .uix-gallery__item  end -->

                </div>
                <!-- .uix-gallery__tiles end -->


            </div>
            <!-- .uix-gallery end -->




        </div>
        <!-- .container end -->




    </div>

@endsection




