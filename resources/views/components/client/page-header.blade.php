<!-- Hero Start -->
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h1 class="title"> {{$title}} </h1>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">اوجال وب </a></li>
                                @isset($routes)
                                    @foreach($routes as $route => $fa)
                                        <li class="breadcrumb-item"><a href="{{$route}}">{{$fa}} </a></li>
                                    @endforeach
                                @endisset
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>  <!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->
