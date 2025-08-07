@extends('frontend.structures.master')
@section('content')

    @include('frontend.structures.breadcrumb')

    <div class="main_content">
        <div class="section">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-3">
                            <div class="heading_s1">
                                <h4>Billing Details</h4>
                            </div>
                            <p class="text-danger">To change your billing details please update your profile from
                                User Dashboard. <a class="link" style="color: #1bad4b" href="{{route('user.profile')}}">Click here to Edit Details</a></p>
                            @php
                                $customer_name = session()->get('customer_name');
                                $email_address = session()->get('email');
                                $address = session()->get('address');
                                $address2 = session()->get('address2');
                            @endphp
                            <div class="form-group mb-3">
                                <label class="form-label">Customer Name</label>
                                <input type="text" class="form-control" disabled value="{{$customer_name}}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="text" class="form-control" disabled value="{{$email_address}}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Address</label>
                                <input class="form-control" type="text" disabled value="{{$address}}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Address2</label>
                                <input type="text" disabled class="form-control" value="{{$address2}}">
                            </div>
                        </div>
                        </div>

                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart_items as $item)
                                        <tr>
                                            <td>{{$item['product_name']}} <span class="product-qty">x {{$item['quantity']}}</span></td>
                                            <td>{{$item['price'] * $item['quantity']}}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">{{$sub_total}}</td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td>-{{$discount}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal">{{$grand_total}}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card p-4">
                            <div class="heading_s1">
                                <h4>Payment</h4>
                            </div>
                            <form action="{{route('place_order')}}" method="post" enctype="multipart/form-data">
                               @csrf
{{--                                @dd($cart_ids)--}}
                                <input type="hidden" value="{{$cart_ids}}" name="cart_id">
                                <input type="hidden" value="{{$grand_total}}" name="grand_total">

                                <div class="row">
                                    <div class="form-group mb-3 col-xl-12">
                                        <label class="form-label">Payment Method</label>
                                        <select class="form-control" name="payment_type">
                                            <option value="">Choose Payment Method</option>
                                            @foreach($filteredMethods as $method)
                                                <option value="{{$method['HeadCode']}}">{{$method['HeadName']}}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 col-xl-6">
                                        <label class="form-label">Payment Type</label>
                                        <select class="form-control" id="payment_type_select">
                                            <option value="full">Full Payment</option>
                                            <option value="partial">Partial Payment</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 col-xl-6">
                                        <label class="form-label">Paid Amount</label>
                                        <input type="text" readonly class="form-control" name="paid_amount" value="{{ $grand_total }}" id="paid_amount_input">
                                    </div>



                                    <div class="form-group mb-3 col-xl-6">
                                        <label class="form-label">Payment Reference</label>
                                        <input type="text" class="form-control" name="payment_ref" placeholder="Enter Payment Reference">
                                    </div>

                                    <div class="form-group mb-3 col-xl-6">
                                        <label class="form-label">Payment Reference Doc</label>
                                        <input type="file" class="form-control" name="payment_ref_doc">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-fill-out btn-block col-lg-4">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const grandTotal = parseFloat({!! json_encode(str_replace(',', '', $grand_total)) !!});
            const paymentTypeSelect = document.getElementById('payment_type_select');
            const paidAmountInput = document.getElementById('paid_amount_input');
            const form = document.querySelector('form');

            // Set full payment by default
            paidAmountInput.value = grandTotal.toFixed(2);
            paidAmountInput.readOnly = true;

            paymentTypeSelect.addEventListener('change', function () {
                const type = this.value;
                if (type === 'full') {
                    paidAmountInput.value = grandTotal.toFixed(2);
                    paidAmountInput.readOnly = true;
                } else if (type === 'partial') {
                    paidAmountInput.value = '';
                    paidAmountInput.readOnly = false;
                    paidAmountInput.focus();
                }
            });

            paidAmountInput.addEventListener('input', function () {
                let value = parseFloat(this.value);
                if (!isNaN(value) && value > grandTotal) {
                    alert("Paid amount can't be greater than the grand total!");
                    this.value = grandTotal.toFixed(2);
                }
            });

            form.addEventListener('submit', function (e) {
                const type = paymentTypeSelect.value;
                const value = parseFloat(paidAmountInput.value);

                if (type === 'partial') {
                    if (isNaN(value) || value <= 0) {
                        alert("Please enter a valid paid amount.");
                        e.preventDefault();
                    } else if (value > grandTotal) {
                        alert("Paid amount cannot exceed the grand total.");
                        e.preventDefault();
                    }
                }
            });
        });
    </script>

@endsection
