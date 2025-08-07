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
                                        <h3>Purchase History</h3>
                                    </div>
                                    <div class="card-body">
                                        @if(isset($invoice_lists) && !empty($invoice_lists))
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Invoice Id</th>
                                                        <th>Delivery Note</th>
                                                        <th>Date</th>
                                                        <th>Total Amount</th>
                                                        <th>Discount</th>
                                                        <th>Paid Amount</th>
                                                        <th>Due Amount</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($invoice_lists as $item)
                                                    <tr>
                                                        <td>{{$item['invoice_id']}}</td>
                                                        <td>{{$item['delivery_note']}}</td>
                                                        <td>{{$item['final_date']}}</td>
                                                        <td>${{$item['total_amount']}}</td>
                                                        <td>${{$item['discount']}}</td>
                                                        <td>${{$item['paid_amount']}}</td>
                                                        <td>${{$item['due_amount']}}</td>
                                                        <td>
                                                                <a href="{{route('invoice_details', $item['invoice_id'])}}" class="btn btn-fill-out btn-sm">View</a>
                                                        </td>
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
