@extends('frontend.structures.master')
@section('content')

    @include('frontend.structures.breadcrumb')

    <div class="main_content">
        <div class="section">
            @if($cart_items->isEmpty())
                <div class="container">
                    <p style="font-weight: bold; font-size: 20px">No items in the Cart</p>
                </div>
            @else
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="">Update</th>
                                    <th class="product-remove">Remove</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart_items as $item)
                                    <tr>
                                        <td class="product-thumbnail"><img src="{{$item['image']}}" alt="product1"></td>
                                        <td class="product-name" data-title="Product">{{$item['product_name']}}</td>
                                        <td class="product-price" data-title="Price">{{$item['price']}}</td>
                                        <form method="post" action="{{route('update_cart')}}" id="cart-update-{{$item['cart_id']}}">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{$item['cart_id']}}">

                                            <td class="product-quantity" data-title="Quantity"><div class="quantity">
                                                    <input type="button" value="-" class="minus">
                                                    <input type="text" name="quantity" value="{{$item['quantity']}}" title="Qty" class="qty" size="4">
                                                    <input type="button" value="+" class="plus">
                                                </div></td>
                                            <td class="product-subtotal" data-title="Total">{{$item['price'] * $item['quantity']}}</td>

                                            <td class="product-remove" data-title="Update"><a href="#" onclick="event.preventDefault(); document.getElementById('cart-update-{{$item['cart_id']}}').submit();"><i class="ti-save-alt"></i></a></td>
                                        </form>

                                        <form method="post" action="{{route('delete_cart')}}" id="cart-remove-{{$item['cart_id']}}">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{$item['cart_id']}}">
                                            <td class="product-remove" data-title="Remove"><a href="#" onclick="event.preventDefault(); document.getElementById('cart-remove-{{$item['cart_id']}}').submit();"><i class="ti-close"></i></a></td>

                                        </form>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="border p-3 p-md-4">
                            <div class="heading_s1 mb-3">
                                <h6>Cart Totals</h6>
                            </div>
                            @php
                                $subtotal = 0;

                                foreach ($cart_items as $item) {
                                    $subtotal += $item['price'] * $item['quantity'];
                                }

                                $commission = session()->get('commission');
                                $commission_type = session()->get('commission_type');

                                $discount = 0;

                                if ($commission_type == '1') {
                                    // Commission is percentage
                                    $discount = ($subtotal * $commission) / 100;
                                } elseif ($commission_type == '2') {
                                    // Commission is fixed amount
                                    $discount = $commission;
                                }

                                $grand_total = $subtotal - $discount;
                            @endphp

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="cart_total_label">Cart Subtotal</td>
                                        <td class="cart_total_amount" id="cart_total">${{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Customer Commission</td>

                                        <td class="cart_total_amount" id="commission">
                                            @if($commission_type == '1')
                                                {{ $commission }}% (-${{ number_format($discount, 2) }})
                                            @elseif($commission_type == '2')
                                                ${{ number_format($commission, 2) }}
                                            @else
                                                $0.00
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount" id="grand_total">
                                            <strong>${{ number_format($grand_total, 2) }}</strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form method="post" action="{{route('checkout_form')}}">
                                @csrf
                                @php
                                $cart_ids = collect($cart_items)->pluck('cart_id')->implode(',')
                                @endphp
                                <input type="hidden" value="{{$cart_ids}}" name="cart_ids">
                                <input type="hidden" value="{{$cart_items}}" name="cart_items">
                                <input type="hidden" value="{{ number_format($subtotal, 2) }}" name="sub_total">
                                <input type="hidden" value="{{ number_format($discount, 2) }}" name="discount">
                                <input type="hidden" value="{{number_format($grand_total, 2)}}" name="grand_total">

                                <button type="submit" class="btn btn-fill-out">Proceed To CheckOut</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>



    </div>
@endsection
