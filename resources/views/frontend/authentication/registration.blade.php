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
                            <div class="padding_eight_all bg-white col-xl-12 col-md-12">
                                <div class="heading_s1">
                                    <h3>Create an Account</h3>
                                </div>
                                @if(session('error_message'))
                                    <p class="text-danger">
                                        ❌ {{session('error_message')}}
                                    </p>
                                @endif


                                <form method="post" action="{{route('registration.store')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <label class="form-label">Full Name<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input type="text" class="form-control" name="customer_name" value="{{old('customer_name')}}"
                                                   placeholder="Enter Your Full Name">
                                            @error('customer_name')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <label class="form-label">Email Address<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input type="text" class="form-control" name="email" value="{{old('email')}}"
                                                   placeholder="Enter Your Email">
                                            @error('email')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Mobile<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input type="text" class="form-control" name="mobile" value="{{old('mobile')}}"
                                                   placeholder="Enter Your Phone Number">
                                            @error('mobile')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Fax</label>
                                            <input type="text" class="form-control" name="fax" value="{{old('fax')}}"
                                                   placeholder="Enter Your Fax Number">
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{old('address')}}"
                                                   placeholder="Enter Your Address">
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <label class="form-label">Address 2</label>
                                            <input type="text" class="form-control" name="address2" value="{{old('address2')}}"
                                                   placeholder="Enter Your Address">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" value="{{old('city')}}"
                                                   placeholder="Enter Your City">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" value="{{old('state')}}"
                                                   placeholder="Enter Your State">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Zip</label>
                                            <input type="text" class="form-control" name="zip" value="{{old('zip')}}"
                                                   placeholder="Enter Your Zip Number">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control" name="country" value="{{old('country')}}"
                                                   placeholder="Enter Your Country">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Sales Permit Number</label>
                                            <input type="text" class="form-control" name="sales_permit_number" value="{{old('sales_permit_number')}}"
                                                   placeholder="Enter Your Sales Permit Number">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Sales Permit Document</label>
                                            <input type="file" class="form-control" name="sales_permit" value="{{old('sales_permit')}}"
                                                   placeholder="Enter Your Sales Permit Number">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Password<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input class="form-control" type="password" name="password"
                                                   placeholder="Password" id="passwordInput">
                                            @error('password')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Confirm Password<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                   placeholder="Confirm Password" id="confirmPasswordInput">
                                            @error('password')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <input class="form-check-input" type="checkbox" id="showPasswordCheck">
                                            <label class="form-check-label" for="showPasswordCheck">Show
                                                Password</label>
                                        </div>


                                        <div class="login_footer form-group mb-3 col-xl-12 col-md-12">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                                           id="exampleCheckbox2" value="">
                                                    <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <button type="submit" class="btn btn-fill-out btn-block" name="register">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-note text-center">Already have an account? <a
                                        href="{{route('login')}}">Log in</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
@endsection
