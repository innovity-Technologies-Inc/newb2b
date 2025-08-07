@extends('frontend.structures.master')
@section('content')
    @include('frontend.structures.slider')


    {{--    fish Section  --}}
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <p class="text-center leads text-uppercase" style="color: #253d4e; margin-bottom: 4px">Quality First</p>
                    <div class="heading_s4 text-center mb-4">
                        <h1>
                            <span style="color: #253d4e">Quality and Safety</span>
                            <span style="color: #3bb77e">Our Top Priority</span>
                        </h1>
                    </div>
                    <p class="text-center leads">Dive into a world of authentic flavors as we proudly present the finest
                        collection of freshwater fish sourced exclusively from Bangladesh and Myanmar. At Deshi Shad,
                        our dedication to quality and tradition shines through in every step of our meticulous
                        processing. Indulge in the true essence of these culinary treasures, showcasing the richness of
                        the aquatic resources from our region.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true"
                         data-dots="false" data-nav="true"
                         data-margin="20"
                         data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'
                         data-autoplay="true"
                         data-autoplay-timeout="2000" data-smart-speed="2000">
                        <div class="item">
                            <div class="product">
                                <div class="product_img">

                                    <img src="{{asset('frontend/assets/images/products/9.png')}}" alt="product_img1" height="350">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">

                                    <img src="{{asset('frontend/assets/images/products/10.png')}}" alt="product_img1" height="350">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">

                                    <img src="{{asset('frontend/assets/images/products/14.png')}}" alt="product_img1" height="350">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">

                                    <img src="{{asset('frontend/assets/images/products/18.png')}}" alt="product_img1" height="350">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">

                                    <img src="{{asset('frontend/assets/images/products/20.png')}}" alt="product_img1" height="350">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">

                                    <img src="{{asset('frontend/assets/images/products/21.png')}}" alt="product_img1" height="350">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Snack Section  --}}
    <div class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about_img scene mb-4 mb-lg-0">
                        <img src="{{asset('frontend/assets/images/products/1.png')}}" alt="about_img" height="350"
                             data-aos="fade-up-right" data-aos-delay="200">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="leads text-uppercase" style="color: #253d4e; margin-bottom: 4px">
                        Snacks
                    </p>
                    <div class="heading_s1">
                        <h1>
                            <span style="color: #253d4e">Savor the</span>
                            <span style="color: #3bb77e">Taste of Tradition</span>
                        </h1>
                    </div>
                    <p>
                        Delight in mouthwatering frozen snacks that embody the rich culinary heritage of Bangladesh.
                        Each bite is thoughtfully prepared with authentic flavors and textures, preserving cherished
                        recipes. From crispy vegetable singaras to delectable samosas, our frozen snacks offer a journey
                        into the heart of Bangladeshi cuisine. Trust Deshi Shad for excellence on your plate. Welcome to
                        a world of frozen snacks – where tradition meets taste!
                    </p>
                    <div class="swiper snackSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide animate__animated animate__fadeIn">
                                <img src="{{asset('frontend/assets/images/products/12.png')}}"/>
                            </div>
                            <div class="swiper-slide animate__animated animate__fadeIn">
                                <img src="{{asset('frontend/assets/images/products/13.png')}}"/>
                            </div>
                            <div class="swiper-slide animate__animated animate__fadeIn">
                                <img src="{{asset('frontend/assets/images/products/15.png')}}"/>
                            </div>
                            <div class="swiper-slide animate__animated animate__fadeIn">
                                <img src="{{asset('frontend/assets/images/products/16.png')}}"/>
                            </div>
                            <div class="swiper-slide animate__animated animate__fadeIn">
                                <img src="{{asset('frontend/assets/images/products/17.png')}}"/>
                            </div>
                            <div class="swiper-slide animate__animated animate__fadeIn">
                                <img src="{{asset('frontend/assets/images/products/23.png')}}"/>
                            </div>
                            <div class="swiper-slide animate__animated animate__fadeIn">
                                <img src="{{asset('frontend/assets/images/products/24.png')}}"/>
                            </div>
                            <div class="swiper-slide animate__animated animate__fadeIn">
                                <img src="{{asset('frontend/assets/images/products/26.png')}}"/>
                            </div>
                            <div class="swiper-slide animate__animated animate__fadeIn">
                                <img src="{{asset('frontend/assets/images/products/27.png')}}"/>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Dry foods Section  --}}
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <p class="text-center leads text-uppercase" style="color: #253d4e; margin-bottom: 4px">Deshi Products
                    </p>
                    <div class="heading_s4 text-center mb-4">
                        <h1>
                            <span style="color: #253d4e">Experience the </span>
                            <span style="color: #3bb77e">Deshi Shad</span>
                        </h1>
                    </div>
                    <p class="text-center leads">Experience the Deshi Shad is an invitation to taste the authentic, cherished flavors of the homeland through our lovingly crafted food products. We bring you the essence of traditional Bengali recipes and ingredients, ensuring every bite is a journey back to the heart of your roots.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper dryFoodSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/14.png')}}" height="400" width="320"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/18.png')}}" height="400" width="320"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/19.png')}}" height="400" width="320"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/21.png')}}" height="400" width="320"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/22.png')}}" height="400" width="320"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/25.png')}}" height="400" width="320"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Grain Section  --}}
    <div class="section">
        <div class="container">
            <div class="row align-items-center" style="gap: 40px">
                <div class="col-lg-6 m-2">
                    <p class="leads text-uppercase" style="color: #253d4e; margin-bottom: 4px">
                        Grain
                    </p>
                    <div class="heading_s1">
                        <h1>
                            <span style="color: #253d4e">Global Reach,</span>
                            <span style="color: #3bb77e">Local Roots</span>
                        </h1>
                    </div>
                    <p>
                        Indulge into a celebration of Nutritious Goodness! Indulge in premium grains sourced from
                        Bangladesh, carefully selected for their natural goodness. From aromatic Kalijira rice to hearty
                        lentils, our diverse range promises quality on your plate. Trust Deshi Shad Foods for nutritious
                        delights!
                    </p>
                    <div class="swiper grainSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/products/29.png')}}" height="400"/>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/products/30.png')}}" height="400"/>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/products/31.png')}}" height="400"/>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/products/32.png')}}" height="400"/>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/products/33.png')}}" height="400"/>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/products/34.png')}}" height="400"/>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/products/35.png')}}" height="400"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about_img scene mb-4 mb-lg-0">
                        <img src="{{asset('frontend/assets/images/products/8.jpg')}}" alt="about_img" height="600"
                             data-aos="zoom-in" data-aos-delay="200">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Vegetables Section  --}}
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <p class="text-center leads text-uppercase" style="color: #253d4e; margin-bottom: 4px">Vegetables
                    </p>
                    <div class="heading_s4 text-center mb-4">
                        <h1>
                            <span style="color: #253d4e">Elevate Your</span>
                            <span style="color: #3bb77e">Taste Experience</span>
                        </h1>
                    </div>
                    <p class="text-center leads">Discover the best of Bangladesh's premium, pesticide-free vegetables,
                        sourced from local farmers practicing sustainable agriculture. Explore a wide range of
                        farm-fresh produce, carefully curated for your culinary needs. Trust us to deliver excellence to
                        your kitchen. Welcome to a world of freshness and flavor!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="swiper vegetableSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/10.png')}}"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/14.png')}}"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/18.png')}}"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('frontend/assets/images/products/21.png')}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    Feature Section --}}
    <div class="section pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-color-sampler"></i>
                        </div>
                        <div class="contact_text">
                            <span class="text-center">Best Prices & Offers</span>
                            <p class="text-center">Orders $5000 or more</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-paper-plane"></i>
                        </div>
                        <div class="contact_text">
                            <span class="text-center">Easy returns</span>
                            <p class="text-center">Within 2 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-truck"></i>
                        </div>
                        <div class="contact_text">
                            <span class="text-center">Reliable Supply Chain</span>
                            <p class="text-center">24/7 amazing services</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-cash-dollar"></i>
                        </div>
                        <div class="contact_text">
                            <span class="text-center">Great daily deal</span>
                            <p class="text-center">When you sign up</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-gift"></i>
                        </div>
                        <div class="contact_text">
                            <span class="text-center">Wide assortment</span>
                            <p class="text-center">Mega Discounts</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-leaf"></i>
                        </div>
                        <div class="contact_text">
                            <span class="text-center">Pure & Fresh</span>
                            <p class="text-center">Where freshness meets peace of mind</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
