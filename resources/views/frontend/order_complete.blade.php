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
                            <p>Your order has been successfully placed! You'll receive an email confirmation shortly
                                with all the details of your purchase. Thank you for shopping with us!</p>
                            <a href="{{route('homepage')}}" class="btn btn-fill-out">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
