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
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Dashboard</h3>
                                    </div>
                                    <div class="card-body">
                                        @php
                                        $name = session()->get('customer_name')
                                        @endphp
                                        <p>Welcome <span style="color: #2e307c; font-weight: bold">Mr. {{$name}}</span> to Deshishad.
                                        Now you can manage your profile, check you purchase history, track order from here.</p>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-xl-4 col-md-4">
                                        <div class="card" style="border-radius: 12px">
                                            <div class="card-body">
                                                <div class="row align-items-center" style="justify-content: center">
                                                    <div class="col-xl-3">
                                                        <img src="{{asset('frontend/assets/images/theme/icons/discount.png')}}" height="40" width="40">
                                                    </div>
                                                    <div class="col-xl-9">
                                                        @php
                                                            $commission = session()->get('commission');
                                                            $commission_type = session()->get('commission_type')
                                                        @endphp
                                                        <h5 style="color: #2e307c">
                                                            @if($commission_type == '1')
                                                                {{$commission}}%
                                                            @elseif($commission_type == '2')
                                                                Flat {{$commission}}
                                                            @endif</h5>
                                                        <p>Your Commission</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    {{--<div class="col-xl-4 col-md-4">
                                        <div class="card" style="border-radius: 12px">
                                            <div class="card-body">
                                                <div class="row align-items-center" style="justify-content: center">
                                                    <div class="col-xl-3">
                                                        <img src="{{asset('frontend/assets/images/theme/icons/commercial.png')}}" height="40" width="40">
                                                    </div>
                                                    <div class="col-xl-9">
                                                        <h5 style="color: #2e307c">25</h5>
                                                        <p>Total Ordered</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>--}}

                                    {{--<div class="col-xl-4 col-md-4">
                                        <div class="card" style="border-radius: 12px">
                                            <div class="card-body">
                                                <div class="row align-items-center" style="justify-content: center">
                                                    <div class="col-xl-3">
                                                        <img src="{{asset('frontend/assets/images/theme/icons/shopping-bag.png')}}" height="40" width="40">
                                                    </div>
                                                    <div class="col-xl-9">
                                                        <h5 style="color: #2e307c">25</h5>
                                                        <p>Products in Cart</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>--}}

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>
@endsection
