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
                                <form method="post" action="{{route('user.password_update')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <h3>Change Password</h3>
                                    </div>
                                    <div class="card-body">

                                            <div class="row">
                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Old Password</label>
                                                    <input type="password" class="form-control" name="old_password"
                                                           placeholder="Enter Your Old Password" id="oldPasswordInput">
                                                </div>

                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" class="form-control" name="new_password"
                                                           placeholder="Enter Your New Password" id="newPasswordInput">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <input class="form-check-input" type="checkbox" id="showPasswordCheck">
                                                    <label class="form-check-label" for="showPasswordCheck">Show Password</label>
                                                </div>

                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <button type="submit" class="btn btn-fill-out btn-block">
                                                        Change Password
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
