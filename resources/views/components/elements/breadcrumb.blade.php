<div>
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5 class="content-header-title float-left pr-1">{{$title}}</h5>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            @foreach($routs as $rote => $name)
                                <li class="breadcrumb-item {{end($routs) == $name ? 'active' : ''}}">
                                    <a href="{{ end($routs) == $name ? '#' :route($rote)}}">{{$name}}</a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
