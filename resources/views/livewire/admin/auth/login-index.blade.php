<div>
    @section('title') صفحه ورود @endsection
    <section id="auth-login" class="row flexbox-container">
        <div class="col-xl-8 col-11">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- left section-login -->
                    <div class="col-md-6 col-12 px-0">
                        <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="text-center mb-2">خوش آمدید</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="divider">
                                        <div class="divider-text text-uppercase text-muted"><small> توسط ایمیل  وارد شوید</small>
                                        </div>
                                    </div>
                                    <form wire:submit.prevent="login">
                                        <div class="form-group mb-50">
                                            <label class="text-bold-700" for="exampleInputEmail1">ایمیل</label>
                                            <input wire:model="email" class="form-control text-left" id="exampleInputEmail1" placeholder="ایمیل" dir="ltr">
                                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-bold-700" for="exampleInputPassword1">رمز عبور</label>
                                            <input type="password" wire:model="password" class="form-control text-left" id="exampleInputPassword1" placeholder="رمز عبور" dir="ltr">
                                            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>


                                        <button type="submit" class="btn btn-primary glow w-100 position-relative">ورود<i id="icon-arrow" class="bx bx-left-arrow-alt"></i></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right section image -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                        <div class="card-content">
                            <img class="img-fluid" src="{{asset('dashboard/assets/images/pages/login.png')}}" alt="branding logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
