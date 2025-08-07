@extends('frontend.structures.master')
@section('content')

    @include('frontend.structures.breadcrumb')

    <div class="main_content">
        <div class="main_content">

            <!-- START SECTION WHY CHOOSE -->
            <div class="section pb_70">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-10">
                            <div class="heading_s1 text-center">
                                <h2 style="color: #1bad4b">How can help you ?</h2>
                                <h4 class="text-center leads mt-2">Let us know how we can help you</h4>
                                <p class="text-center mt-3">At Deshi Shad, we value our customers and are always here to assist you. Whether you need help selecting the right food products, have questions about bulk orders, or require support with deliveries and returns, our dedicated team is ready to provide the best solutions for your business. Feel free to reach out. we are committed to making your wholesale food sourcing experience smooth, efficient, and hassle-free. Lets grow together!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-sm-6">
                            <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">

                                <div class="icon_box_content">
                                    <h5 class="" style="color: #1bad4b">01. Bulk Orders & Pricing</h5>
                                    <p class="">Looking to purchase food products in bulk? We offer competitive wholesale pricing to help businesses maximize their profits. Contact us for customized quotes, volume discounts, and special deals tailored to your needs</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">
                                <div class="icon_box_content">
                                    <h5 class="" style="color: #1bad4b">02. Product Inquiries</h5>
                                    <p class="">Have questions about our food products? Whether you need ingredient details, packaging sizes, or sourcing information, we are happy to assist. Our team ensures you get the right products that meet your quality standards and business requirements</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">

                                <div class="icon_box_content">
                                    <h5 class="" style="color: #1bad4b">03. Order Tracking & Delivery</h5>
                                    <p class="">Stay informed about your shipments with our real-time order tracking. We provide timely updates on order processing, dispatch, and estimated delivery times to ensure you receive your products without delays</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">
                                <div class="icon_box_content">
                                    <h5 class="" style="color: #1bad4b">04. Returns & Support</h5>
                                    <p class="">We stand by the quality of our products, but if you ever face any issues, we offer a hassle-free return policy. Our dedicated support team is available to resolve any concerns, making your experience with Deshi Shad smooth and worry-free</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- END SECTION WHY CHOOSE -->

            <!-- START SECTION CONTACT -->
            <div class="section pb_70">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="contact_wrap contact_style3">
                                <div class="contact_icon">
                                    <i class="linearicons-map2"></i>
                                </div>
                                <div class="contact_text">
                                    <span>Address</span>
                                    <p class="text-center">9033 Red Branch Rd, Columbia, MD, Maryland, United States</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="contact_wrap contact_style3">
                                <div class="contact_icon">
                                    <i class="linearicons-envelope-open"></i>
                                </div>
                                <div class="contact_text">
                                    <span>Email Address</span>
                                    <a href="mailto:info@deshishad.com" class="text-center">info@deshishad.com </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="contact_wrap contact_style3">
                                <div class="contact_icon">
                                    <i class="linearicons-tablet2"></i>
                                </div>
                                <div class="contact_text">
                                    <span>Phone</span>
                                    <p class="text-center">+1 227-213-8120</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SECTION CONTACT -->

            <!-- START SECTION CONTACT -->
            <div class="section pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="heading_s1">
                                <h2>Get In touch</h2>
                            </div>
                            <p class="leads">Drop Us a Line</p>
                            <div class="field_form">
                                <form method="post" action="{{route('contact.store')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Name<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                                   placeholder="Enter Your Full Name">
                                            @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Email Address<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input type="text" class="form-control" name="email" value="{{old('email')}}"
                                                   placeholder="Enter Your Email">
                                            @error('email')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Phone<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input type="text" class="form-control" name="phone" value="{{old('phone')}}"
                                                   placeholder="Enter Your Phone Number">
                                            @error('phone')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Subject</label>
                                            <input type="text" class="form-control" name="subject" value="{{old('subject')}}"
                                                   placeholder="Enter Subject">
                                        </div>
                                        @error('subject')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <label class="form-label">Message</label>
                                            <textarea class="form-control" name="message">{{old('message')}}</textarea>
                                        </div>
                                        @error('message')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror

                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <button type="submit" class="btn btn-fill-out btn-block">
                                                Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
                            <div id="map" class="contact_map2">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3090.600103482267!2d-76.8221606248267!3d39.22924707165506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7e0021aaf6c3d%3A0x1ead17659b429318!2s9033%20Red%20Branch%20Rd%2C%20Columbia%2C%20MD%2021045%2C%20USA!5e0!3m2!1sen!2sbd!4v1752607573613!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SECTION CONTACT -->

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



        </div>

    </div>
@endsection
