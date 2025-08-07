@extends('frontend.structures.master')
@section('content')

    @include('frontend.structures.breadcrumb')

    <div class="main_content">
        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    @include('frontend.structures.dashboard_sidebar')
                    <div class="col-lg-9 col-md-8">
                        <div>

                            {{--                            Manage Profile--}}
                            <div>
                                <form method="post" action="{{route('user.profile.update')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <h3>Account Details</h3>
                                    </div>
                                    <div class="card-body">

                                            <div class="row">
                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" name="customer_name" value="{{$profile->customer_name}}"
                                                           placeholder="Enter Your Full Name">
                                                    @error('customer_name')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Email Address</label>
                                                    <input type="text" class="form-control" name="email_address" value="{{$profile->customer_email}}"
                                                           placeholder="Enter Your Email">
                                                    @error('email')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">Mobile</label>
                                                    <input type="text" class="form-control" name="contact" value="{{$profile->contact}}"
                                                           placeholder="Enter Your Mobile Number">
                                                    @error('mobile')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" value="{{$profile->phone}}"
                                                           placeholder="Enter Your Phone Number">
                                                    @error('mobile')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Fax</label>
                                                    <input type="text" class="form-control" name="fax" value="{{$profile->fax}}"
                                                           placeholder="Enter Your Fax Number">
                                                </div>

                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address" value="{{$profile->customer_address}}"
                                                           placeholder="Enter Your Address">
                                                </div>
                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Address 2</label>
                                                    <input type="text" class="form-control" name="address2" value="{{$profile->address2}}"
                                                           placeholder="Enter Your Address">
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">City</label>
                                                    <input type="text" class="form-control" name="city" value="{{$profile->city}}"
                                                           placeholder="Enter Your City">
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">State</label>
                                                    <input type="text" class="form-control" name="state" value="{{$profile->state}}"
                                                           placeholder="Enter Your State">
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">Zip</label>
                                                    <input type="text" class="form-control" name="zip" value="{{$profile->zip}}"
                                                           placeholder="Enter Your Zip Number">
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" class="form-control" name="country" value="{{$profile->country}}"
                                                           placeholder="Enter Your Country">
                                                </div>

                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Sales Permit Document</label>
                                                    <input type="file" class="form-control" name="sales_permit" value="{{$profile->sales_permit}}">
                                                </div>

                                                <div class="form-group mb-3 col-xl-4 col-md-4">
                                                    <a href="{{$profile->sales_permit}}" class="btn btn-success" target="_blank">View File</a>
                                                </div>

                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Sales Permit Number</label>
                                                    <input type="text" class="form-control" name="sales_permit_number" value="{{$profile->sales_permit_number}}"
                                                           placeholder="Enter Your Sales Permit Number">
                                                </div>




                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <button type="submit" class="btn btn-fill-out btn-block" name="register">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>
@endsection
