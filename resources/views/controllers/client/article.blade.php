@extends('layouts.client.app')
@section('content')

    <!-- Parallax & Overlay
			============================================= -->
    <section>
        <div class="uix-parallax uix-height--100 uix-typo--color-white" data-fully-visible="false" data-offset-top="0"
             data-overlay-bg="false" data-skew="0" data-speed="0.3">
            <img class="uix-parallax__img" src="{{assetFile($article->image)}}" alt="{{$article->title}}">
            <div class="uix-v-align--absolute uix-t-c uix-hidden-scrollbar-x">

                <div class="container uix-t-c">

                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <h1>{{$article->title}}</h1>
                            <h3 class="uix-typo--h4 uix-typo--style-normal">{{$article->author}}</h3>

                        </div>
                    </div>
                    <!-- .row end -->
                </div>

            </div>

        </div>
    </section>

    <!-- Content
     ====================================================== -->
    <section class="uix-spacing--s">

        <div class="container">

            <div class="uix-container__bg uix-container__bg--white uix-container__bg--shadow uix-container__bg--totop-large uix-container__bg--rounded-medium">

                <div class="row uix-spacing--s">
                    <div class="col-md-10 offset-md-1 ck-content">
                        <div class="col-12">
                            <div id="toc" class="container-filter w-100">
                      <span id="toc-heading">
                         فهرست
                      </span>
                                <label for="toc-checkbox">نهان/نمایان</label><input type="checkbox" id="toc-checkbox">
                            </div>
                        </div>


                        <br><br>
                        <div id="single-article" >
                            {!! $article->desc !!}
                        </div>


                        <div class="uix-entry__box comments">

                            <h4 class="uix-typo--style-uppercase uix-entry__box__title">نظرات</h4>
                        @if($article->comments()->exists())
                            <!-- comment start -->
                                @foreach($article->comments as $comment)
                                    <div class="comment uix-clearfix" id="comment-1">

                                        <div class="comment-meta">

                                            <div class="comment-text">
                                                <h5>{{$comment->name}}</h5>
                                                <span>
														<em>{{dateToPersian($comment->created_at) }}</em>
													</span>
                                            </div>

                                        </div>

                                        <div class="comment-content">
                                            <div class="comment-body uix-clearfix">
                                                <p>{{$comment->desc}}</p>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- comment end -->
                                @endforeach
                            @endif
                        </div>
                        <hr>
                        <livewire:client.comments.create-comment :commentableId="$article->id"
                                                                 commentableType="article"/>

                    </div>
                </div>
                <!-- .row end -->

            </div>
            <!-- .uix-container__bg end -->

        </div>
        <!-- .container end -->


    </section>

@endsection

@push('metas')
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$article->title}}"/>
    <meta property="og:description" content="{{$article->meta_desc}}"/>
    <meta property="og:url" content="{{route('blog.detail', ['article'=> $article->slug])}}"/>
    <meta property="og:site_name" content="{{@$setting->name . '-' . @$setting->title}}"/>
    <meta property="article:modified_time" content="{{$article->created_at}}"/>
    <meta property="og:image" content="{{assetFile($article->image)}}"/>
    <meta property="og:image:width" content="800"/>
    <meta property="og:image:height" content="506"/>
    <meta property="og:image:type" content="image/jpeg"/>
    <meta name="geo.placename" content="{{@$setting->city}}"/>
    <meta name="geo.position" content="{{@$setting->latitude. ',' . @$setting->longitude}}"/>
    <meta name="geo.region" content="IR"/>
    @isset($article->video)
        <meta property="og:video" content="{{assetFile($article->video)}}"/>
    @endisset
@endpush

@push('styles')
    <style>
        #toc {
            background-color: #f1f1f1;
            width: max-content;
            max-width: 95%;
            min-height: 9rem;
            margin: 1rem auto;
            padding: 0.5rem;
            outline: 1px solid #ddd;
            position: relative;
            border-radius: 0.4rem;
        }

        #toc-heading {
            display: inline-block;
            font-size: 18px;
            /*color: var(--heading-font-color);*/
            margin-bottom: 5px;
            margin-right: 2rem;
        }

        #toc #toc-checkbox {
            display: inline-block;
            position: absolute;
            top: 0.8rem;
            right: 1rem;
            width: 1rem;
            height: 1rem;
            opacity: 0.4;
        }

        #toc #toc-checkbox:hover {
            cursor: pointer;
            opacity: 0.7;
        }

        #toc input:checked ~ ol {
            display: none;
        }

        #toc ol {
            border-top: 1px solid #ddd;
            list-style-position: inside;
            padding: 0.5rem 2px;
            line-height: 1.8;
        }

        #toc ol ul {
            margin-left: 4px;
            list-style-position: inside;
            list-style-type: disc;
            line-height: 1.5;
        }

        #toc li::marker {
            color: #c8c8c8;
        }

        #toc a {
            font-size: 16px;
            padding-left: 1px;
            color: black;
        }

        #toc ul a {
            padding: 0;
            font-size: 14px;
        }

        @media (min-width: 900px ) {
            #toc {
                max-width: 70%;
                margin: 1.5rem auto;
                box-shadow: 4px 4px 6px 6px #fafcff, -4px -4px 6px 6px #fafcff;
            }
        }

        code {
            direction: ltr !important;
            text-align: left;
        }


        @media only screen and (max-width: 768px) {

            #single-article figure {
                padding: 20px;
                margin-left: auto;
                margin-right: auto;
                width: 100% !important;
            }

            #single-article img {
                width: 100%;
            }

            h1 {
                font-size: 22px !important;
            }

            h2 {
                font-size: 20px !important;
            }

            h3 {
                font-size: 18px !important;
            }
        }

        @media only screen and (min-width: 768px) {

            h1 {
                font-size: 28px !important;
            }

            h2 {
                font-size: 26px !important;
            }

            h3 {
                font-size: 24px !important;
            }
        }

        /*#single-article p,section,div,body,span  {*/
        /*    text-align: justify !important;*/
        /*}*/
    </style>
@endpush

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const article = document.getElementById("single-article");
            const headings = article.querySelectorAll("h2, h3");
            const toc = document.getElementById("toc");
            const totalHeadings = headings.length;
            let tocOl = document.createElement("ol");
            let tocFragment = new DocumentFragment();
            let mainLi = null;
            let subUl = null;
            let subLi = null;
            let isSibling = false;

            if (totalHeadings > 1) {
                for (let element of headings) {
                    let anchor = document.createElement("a");
                    let anchorText = element.innerText;
                    anchor.innerText = anchorText;
                    let elementId = anchorText.replaceAll(" ", "-").toLowerCase();
                    anchor.href = "#" + elementId;
                    element.id = elementId;
                    let level = element.nodeName;

                    if ("H3" === level) {
                        if (mainLi) {
                            subLi = document.createElement("li");
                            subLi.appendChild(anchor);

                            if (isSibling === false) {
                                subUl = document.createElement("ul");
                            }
                            subUl.appendChild(subLi);
                            mainLi.appendChild(subUl);

                            isSibling = true;
                        }
                    } else {
                        mainLi = document.createElement("li");
                        mainLi.appendChild(anchor);
                        tocFragment.appendChild(mainLi);
                        isSibling = false;
                        subUl = null;
                    }
                }
                tocOl.append(tocFragment);
                toc.append(tocOl);
            } else {
                toc.style.display = "none";
            }
        });
    </script>



    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Article",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "@json(route('blog.detail', ['article' => $article->slug]))"
          },
          "headline": "@json($article->title)",
          "image": "@json(assetFile( $article->image))",
          "author": {
            "@type": "Person",
            "name": "@json(@$setting->name)",
            "url": "@json(route('home'))"
          },
          "publisher": {
            "@type": "Organization",
            "name": "@json(@$setting->name . ' - ' .  @$setting->title)",
            "logo": {
              "@type": "ImageObject",
              "url": "{{assetFile(@$setting->logo)}}"
            }
          },
          "datePublished": "@json($article->created_at)",
          "dateModified": "@json($article->updated_at)"
        }

    </script>
@endpush


