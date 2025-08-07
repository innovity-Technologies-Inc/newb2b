@extends('frontend.structures.master')
@section('content')

    @include('frontend.structures.breadcrumb')

    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="text-center order_complete">
                            <i class="fas fa-check-circle"></i>
                            <div class="heading_s1">
                                <h3>Thank You!</h3>
                            </div>
                            <p>Welcome! Your next step is to verify your email address. Please check your inbox for our verification email and follow the instructions. After verification, our admin team will activate your account, and you'll receive an email notification. Thank you for joining us!</p>
                            <a href="{{route('homepage')}}" class="btn btn-fill-out">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
