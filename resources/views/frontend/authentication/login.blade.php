@extends('frontend.structures.master')
@section('content')



    @include('frontend.structures.breadcrumb')


    <div class="main_content">
        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="login_wrap row">
                            <div class="padding_eight_all bg-white col-xl-6 col-md-6">
                                <img src="{{asset('frontend/assets/images/login.jpg')}}" alt="login">
                            </div>
                            <div class="padding_eight_all bg-white col-xl-6 col-md-6">
                                <div class="heading_s1">
                                    <h3>Login</h3>
                                </div>
                                @error('fcm_token')
                                <span class="badge bg-danger mb-3" style="font-size: 16px">

                                    {{$message}}

                                </span>
                                @enderror
                                <form action="{{route('login.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" required class="form-control" name="username"
                                               placeholder="Your Username">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control" required type="password" name="password"
                                               placeholder="Password" id="loginPasswordInput">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-check-input" type="checkbox" id="showPasswordCheck">
                                        <label class="form-check-label" for="showPasswordCheck">Show Password</label>
                                    </div>

                                    <input type="hidden" name="fcm_token" id="fcm_token">

                                    <div class="login_footer form-group mb-3">
                                        {{--<div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div>--}}
{{--                                        <a href="#">Forgot password?</a>--}}
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in
                                        </button>
                                    </div>
                                </form>
                                <div class="form-note text-center">Don't Have an Account? <a
                                        href="{{route('registration')}}">Sign up now</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->
    </div>




@endsection
