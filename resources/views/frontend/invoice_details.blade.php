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
                            {{--                            Purchase History--}}
                            <div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3>{{$subtitle}}</h3>
                                    </div>
                                    <div class="card-body">
                                        @if(isset($invoice_details) && !empty($invoice_details))
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Description</th>
                                                        <th>Unit Price</th>
                                                        <th>Quantity</th>
                                                        <th>Discount</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($invoice_details as $item)
                                                    <tr>
                                                        <td>{{$item['product_name'] ?? 'Not Found'}}</td>
                                                        <td>{{$item['description']}}</td>
                                                        <td>${{$item['rate']}}</td>
                                                        <td>{{$item['quantity']}}</td>
                                                        <td>{{$item['discount']}}</td>
                                                        <td>${{$item['total_price']}}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            @else
                                            <h4> No History Found</h4>
                                        @endif
                                    </div>
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
