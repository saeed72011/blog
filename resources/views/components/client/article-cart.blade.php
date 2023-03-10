@foreach($articles as $article)
    <article class="{{$col ?? 'col-lg-4 col-md-6'}} col-12 mt-4 pt-2">
        <div class="card blog rounded border-0 shadow">
            <div class="position-relative">
                <img src="{{asset('storage/'.$article->image)}}" class="card-img-top rounded-top" height="210"
                     alt="{{$article->slug}}">
                <div class="overlay rounded-top bg-dark"></div>
            </div>
            <div class="card-body content">
                <span class="h5"><a href="{{route('home.article.single', ['article' => $article->slug])}}"
                                    class="card-title title text-dark">{{$article->title}}</a></span>
                <div class="post-meta d-flex justify-content-between mt-3">
                    <ul class="list-unstyled mb-0">
                        <li class="list-inline-item me-2 mb-0"><span class="text-black like"><i
                                    class="uil uil-clock me-1"></i>{{$article->study_time}}</span></li>
                        <li class="list-inline-item"><span class="text-black comments"><i class="uil uil-eye me-1"></i>{{$article->view}}</span>
                        </li>
                    </ul>
                    <a href="{{route('home.article.single', ['article' => $article->slug])}}"
                       class="text-black readmore">ادامه<i
                            class="uil uil-angle-left-b align-middle"></i></a>
                </div>
            </div>
            <div class="author">
                <small class="text-light user d-block"><i class="uil uil-user"></i>{{$article->author}}</small>
                <small class="text-light date"><i class="uil uil-calendar-alt"></i>{{$article->created_at}}</small>
            </div>
        </div>
    </article><!--end col-->
@endforeach
