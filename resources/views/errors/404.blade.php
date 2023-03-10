@extends('layouts.source-simple')

@section('title') 404 @endsection
@section('content')
    <div class="back-to-home rounded d-none d-sm-block">
        <a href="{{route('home')}}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
    </div>

    <!-- ERROR PAGE -->
    <section class="bg-home d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 text-center">
                    <img src="{{'client/images/404.svg'}}" class="img-fluid" alt="">
                    <div class="text-uppercase mt-4 display-3">404</div>
                    <div class="text-capitalize text-dark mb-4 error-page">صفحه ای یافت نشد</div>
                    <p class="text-muted para-desc mx-auto">این صفحه در سایت ما ایندکس نشده است</p>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{route('home')}}" class="btn btn-outline-primary mt-4">برو عقب</a>
                    <a href="{{route('home')}}" class="btn btn-primary mt-4 ms-2">برو صفحه اصلی </a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- ERROR PAGE -->
@endsection
