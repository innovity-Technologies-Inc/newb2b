@extends('frontend.structures.master')
@section('content')
    @include('frontend.structures.breadcrumb')
    <div class="main_content">
        @php($selected_warehouse = \Illuminate\Support\Facades\Cache::get('warehouse'))

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <div class="product_img_box">
                                <img id="product_img" src='{{$product->image}}' data-zoom-image="{{$product->image}}" alt="{{$product->product_name}}">
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title text-capitalize"><a href="#">{{$product->product_name}}</a></h4>
                            </div>
                            @if(isset($product->price))
                            <h4 style="color: #2E307C; font-weight: bold">${{$product->price}}</h4>
                            @endif
                            <ul class="product-meta">
                                <form id="category-{{$product->category_id}}" action="{{route('productsByCategory')}}" method="get">
                                    @csrf
                                    <input type="hidden" value="{{$product->category_id}}" name="id">
                                    <li>Category: <a href="#"
                                                     onclick="event.preventDefault(); document.getElementById('category-{{$product->category_id}}').submit();">
                                            {{$product->category_name}}</a></li>
                                </form>

                                <li>Unit: <a href="#">{{$product->unit}}</a> </li>

                                @if(isset($product->stock_qty))
                                    <li>Total Stock: <a href="#">{{$product->stock_qty}}</a> </li>
                                @endif
                                @php($tokenExpire = session()->get('second_layer_token_expire_at'))
                                @if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire))
                                    @if(isset($product->warehouse_stock_qty))
                                        <li>Warehouse Stock: </li>
                                        <li>
                                            <table class="table table-bordered">
                                        <tr>
                                            <th>Warehouse Name</th>
                                            <th>Stock Quantity</th>
                                        </tr>
                                        @foreach($product->warehouse_stock_qty as $warehouse)
                                            <tr>
                                                <td>{{$warehouse['warehouse_name']}}</td>
                                                <td>{{$warehouse['qty']}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                        </li>
                                    @endif
                                @endif

                            </ul>
                            <hr>
                            @if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire))
                            <form method="post" action="{{route('add_to_cart')}}">
                                @csrf
                                <input type="hidden" value="{{$product->product_id}}" name="product_id">


                                <div class="cart_extra">
                                <div class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label class="form-label" style="text-align: left">Warehouse: </label>
                                    <select class="form-control" name="warehouse_data">
                                        <option value="">Select Warehouse</option>
                                        @foreach($product->warehouse_stock_qty as $warehouse)
                                            <option value="{{$warehouse['warehouse_id']}}!{{$warehouse['batch_id']}}" @if($warehouse['warehouse_id'] == $selected_warehouse) selected @endif>{{$warehouse['warehouse_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3 ">
                                    <button
                                        class="btn btn-fill-out btn-block text-uppercase rounded-0"
                                       type="submit">
                                        Add to Cart
                                    </button>
                                </div>
                            </form>
                                @else
                            <p class="text-danger my-1">Log in now to unlock product stocks, prices, and the ability to purchase or add items to your cart.
                                <a class="" href="{{route('login')}}" style="color: #1bad4b"> Click here to Login</a>
                            </p>

                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    <p>{{$product->product_details}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="heading_s1">
                            <h3>Releted Products</h3>
                        </div>
                        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                            @foreach($related_products as $item)
                            <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="{{$item['image']}}" alt="{{$item['product_name']}}" height="220" width="260">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <form id="product-{{$item['product_id']}}" action="{{route('product_details')}}" method="get">
                                            @csrf
                                            <input type="hidden" value="{{$item['product_id']}}" name="product_id">
                                        <h6 class="product_title text-capitalize"><a href="#" onclick="event.preventDefault(); document.getElementById('product-{{$item['product_id']}}').submit();">
                                                {{$item['product_name']}}</a></h6>
                                        </form>
                                        @if(isset($product->price))
                                        <div class="product_price">
                                            <span class="price">${{$product->price}}</span>
                                        </div>
                                        @endif

                                        <form id="category-{{$item['category_id']}}" action="{{route('productsByCategory')}}" method="get">
                                            @csrf
                                            <input type="hidden" value="{{$item['category_id']}}" name="id">
                                            <h6>
                                                <b>Category:</b>
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('category-{{$item['category_id']}}').submit();">{{$item['category_name']}}</a>
                                            </h6>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>
@endsection
