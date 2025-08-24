
@php
    $warehouse_id = \Illuminate\Support\Facades\Cache::get('warehouse');
    $warehouse_location = \Illuminate\Support\Facades\Cache::get('warehouse_name');
    $tokenExpire = session()->get('second_layer_token_expire_at');
    $cart_count = session()->get('cart_items_count');
@endphp

    <!-- START HEADER -->
<header class="header_wrap">

    <div class="middle-header dark_skin">
        <div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="#">
                    <img class="logo_light" src="{{asset('frontend/assets/images/logo_light.png')}}" alt="logo"
                         style="height: 60px; width: 120px">
                    <img class="logo_dark" src="{{asset('frontend/assets/images/logo_dark.png')}}" alt="logo"
                         style="height: 60px; width: 120px">

                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form action="{{route('productsByCategory')}}">
                        @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null not_chosen" name="id">
                                        <option value="">All Category</option>
                                        @foreach($categoryTree as $parent)
                                            <option value="{{$parent['id']}}">{{$parent['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" placeholder="Search Product..." required="" type="text"
                                   name="product_name">
                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    @if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire))
                        <li style="color: #1bad4b; font-weight: bold">
                            <i class="linearicons-map-marker"></i>
                            <span>
                                {{$warehouse_location ?? 'Not Selected'}}
                        </span>
                        </li>
                        <li >
                            <button class="nav-link nav-icon" data-bs-target="#warehouse_selection" data-bs-toggle="modal">
                                <i style="color: #1bad4b; " class="ti-pencil-alt"></i>
                            </button>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link nav-icon dropdown-toggle" data-bs-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <i class="linearicons-user"></i>
                        </a>

                        @if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire))
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('user.dashboard')}}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{route('purchase_history')}}">Purchase History</a></li>
                                {{--                                <li><a class="dropdown-item" href="#">Track Order</a></li>--}}
                                <li>
                                    <form id="log-out" action="{{route('user.logout')}}" method="post">
                                        @csrf
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault(); document.getElementById('log-out').submit()">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        @else
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('registration')}}">Registration</a></li>
                                <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                            </ul>
                    @endif



                    @if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire))
                        <li class="">
                            <a class="nav-link nav-icon" href="{{ route('cart') }}">
                                <i class="linearicons-bag2"></i>

                                @if($cart_count > 0)
                                    <span class="cart_count">
                    {{ $cart_count }}
                </span>
                                @endif
                            </a>
                        </li>

                    @endif


                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent"
                                aria-expanded="false" class="categories_btn categories_menu">
                            <span>Categories </span><i class="linearicons-menu"></i>
                        </button>

                        <div id="navCatContent" class="navbar nav collapse">
                            <ul>
                                @foreach($categoryTree as $parent)
                                    <li class="dropdown dropdown-mega-menu">
                                        <form action="{{route('productsByCategory')}}">
                                            @csrf
                                            <input type="hidden" value="{{$parent['id']}}" name="id">
                                            <button class="dropdown-item nav-link dropdown-toggler">
                                                <span>{{$parent['name']}}</span></button>
                                        </form>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-12">
                                                    <ul class="d-lg-flex">
                                                        @if(!empty($parent['children']))
                                                            @foreach($parent['children'] as $subCategory)
                                                                <li class="mega-menu-col col-lg-4">
                                                                    <ul>

                                                                        <li class="dropdown-header">
                                                                            <form
                                                                                action="{{route('productsByCategory')}}">
                                                                                @csrf
                                                                                <input type="hidden"
                                                                                       value="{{$subCategory['id']}}"
                                                                                       name="id">
                                                                                <button class="dropdown-header"
                                                                                        style="all: unset; cursor: pointer;">{{$subCategory['name']}}</button>
                                                                            </form>
                                                                        </li>
                                                                        @if(!empty($subCategory['children']))
                                                                            @foreach($subCategory['children'] as $child)
                                                                                <li>
                                                                                    <form
                                                                                        action="{{route('productsByCategory')}}">
                                                                                        @csrf
                                                                                        <input type="hidden"
                                                                                               value="{{$child['id']}}"
                                                                                               name="id">
                                                                                        <button
                                                                                            class="dropdown-item nav-link nav_item">{{$child['name']}}</button>
                                                                                    </form>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif

                                                                    </ul>
                                                                </li>
                                                            @endforeach
                                                        @endif

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:" class="nav-link pr_search_trigger"><i
                                    class="linearicons-magnifier"></i></a>
                        </div>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li>
                                    <a class="nav-link nav-item @if(Route::currentRouteNamed('homepage')) active @endif "
                                       href="{{route('homepage')}}">Home</a>
                                </li>

                                <li class="dropdown">
                                    <a class="dropdown-toggle nav-link text-light @if(Route::currentRouteNamed('vision-mission-values') || Route::currentRouteNamed('about-us') ) active @endif"
                                       href="#" data-bs-toggle="dropdown">What We Are</a>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li>
                                                <a class="dropdown-item nav-link nav_item @if(Route::currentRouteNamed('about-us')) active @endif"
                                                   href="{{route('about-us')}}">About Us</a></li>
                                            <li>
                                                <a class="dropdown-item nav-link nav_item @if(Route::currentRouteNamed('vision-mission-values')) active @endif"
                                                   href="{{route('vision-mission-values')}}">Vision, Mission &
                                                    Values</a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <a class="nav-link nav-item @if(Route::currentRouteNamed('products')) active @endif" href="{{route('products')}}">Products</a>
                                </li>

                                @if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire))
                                    <li>
                                        <a class="nav-link nav-item @if(Route::currentRouteNamed('user.dashboard')) active @endif" href="{{route('user.dashboard')}}">User Dashboard</a>
                                    </li>
                                @endif

                                <li>
                                    <a class="nav-link nav-item " href="{{route('contact')}}">Contact</a>
                                </li>
                                <li>
                                    <a class="nav-link nav-item" href="{{asset('brochure/brochure.pdf')}}" target="_blank" download="Product Brochure.pdf">Product Brochure</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->

{{--Warehouse selection modal--}}
<div class="modal fade subscribe_popup" id="warehouse_selection" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="popup_content">
                            <div class="popup-text">
                                <div class="heading_s3 text-center">
                                    <h4>Choose Warehouse</h4>

                                </div>
                            </div>
                            <form method="post" class="rounded_input" action="{{route('warehouse_store')}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <select name="warehouse" id="warehouse"
                                            size="5" style="width: 100%"
                                            class="px-3 py-2 text-base border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        {{--                                        <option value="">Skip Selection</option>--}}
                                        @if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire))

                                            @foreach($warehouse_lists as $item)
                                                <option value="{{$item['id']}}!{{$item['name']}}" @if($item['id'] == $warehouse_id) selected @endif>
                                                    {{$item['name']}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('warehouse')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror

                                    @error('warehouse_data')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror


                                </div>
                                <div class="form-group mb-3">
                                    <button class="btn btn-fill-out btn-block text-uppercase btn-radius" title="Save" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire) && !\Illuminate\Support\Facades\Cache::has('warehouse'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Bootstrap 5 way to open modal
            var warehouseModal = new bootstrap.Modal(document.getElementById('warehouse_selection'));
            warehouseModal.show();
        });
    </script>
@endif

