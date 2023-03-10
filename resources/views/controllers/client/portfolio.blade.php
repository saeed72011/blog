@extends('layouts.client.app')
@section('content')
    <section class="uix-spacing--s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="uix-heading--pinline"> <span>{{ $portfolio->title  }}</span> </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="uix-spacing--s">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div role="slider" class="uix-flexslider"
                         data-draggable="false"
                         data-my-nav-thumbs=".my-navthumbs-1"
                         data-my-prev-next-thumbs="true"
                         data-my-nav-timeline="false"
                         data-my-controls=".my-nav-2"
                         data-my-multiple-items="false"
                         data-my-multiple-items-move="1"
                         data-my-count-total="false"
                         data-my-count-now="false"
                         data-my-parallax="false"
                         data-my-sync="false"
                         data-wheel="false"
                         data-speed="600"
                         data-timing="10000"
                         data-loop="false"
                         data-paging="true"
                         data-arrows="true"
                         data-animation="slide"
                         data-auto="true"
                         data-prev="<i class='fa fa-chevron-right'></i>"
                         data-next="<i class='fa fa-chevron-left'></i>">


                        <div class="uix-flexslider__inner">

                            @foreach($portfolio->photos as $photo)
                                <div class="uix-flexslider__item">
                                    <a href="#" rel="theme-slider-prettyPhoto[cat-1]"><img
                                                src="{{assetFile($photo->photo)}}" alt="{{@$photo->alt}}"/></a>
                                </div>
                            @endforeach


                        </div>
                        <!-- .uix-flexslider__inner end -->
                    </div>
                    <!-- .uix-flexslider end -->


                    <div class="uix-flexslider__mycontrols my-nav-2">
                        <a href="#" class="uix-flexslider__mycontrols__prev"><i class="fa fa-angle-right"
                                                                                aria-hidden="true"></i></a>
                        <div class="uix-flexslider__mycontrols__control-paging"></div>
                        <a href="#" class="uix-flexslider__mycontrols__next"><i class="fa fa-angle-left"
                                                                                aria-hidden="true"></i></a>
                    </div>


                    <!-- Thumbnail ControlNav Pattern -->
                    <div class="uix-flexslider__thumbs my-navthumbs-1">
                        <ul>
                            @foreach($portfolio->photos as $key => $photo)
                                <li @if($key== 0) class="is-active" @endif><img src="{{assetFile($photo->photo)}}"
                                                                                alt="{{@$photo->alt}}"/></li>
                            @endforeach
                        </ul>
                    </div>


                </div>
            </div>
        </div>


        <div class="border container mt-2 p-3 rounded">
            <p> {{$portfolio->desc}}</p>
        </div>

    </section>



@endsection

