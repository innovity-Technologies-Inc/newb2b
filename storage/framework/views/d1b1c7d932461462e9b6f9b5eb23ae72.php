<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.structures.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main_content">

        <!-- About Us -->
        <div class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about_img scene mb-4 mb-lg-0">
                            <img
                                src="<?php echo e(asset('frontend/assets/images/products/4.jpg')); ?>"
                                style="border-radius: 14px" alt="about_img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="heading_s1">
                            <h2>Welcome to Deshi Shad</h2>
                        </div>
                        <p>At Deshi Shad, we are dedicated to providing high-quality food products to businesses at
                            wholesale prices. As a trusted B2B supplier, we cater to restaurants, hotels, caterers,
                            retailers, and other food service businesses, ensuring they have access to fresh, authentic,
                            and premium food ingredients at competitive rates. With a strong commitment to quality,
                            reliability, and customer satisfaction, we source our products from the finest suppliers to
                            meet the diverse needs of our clients. Whether you're looking for bulk spices, grains,
                            cooking essentials, or specialty food items, Deshi Shad is your one-stop solution for all
                            your wholesale food supply needs. We take pride in fostering long-term partnerships with
                            businesses by offering consistent supply, timely deliveries, and exceptional service. Our
                            mission is to help your business grow by ensuring you have access to the best food products
                            in the market.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- START SECTION WHY CHOOSE -->
        <div class="section bg_light_blue2 pb_70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="heading_s1 text-center">
                            <h2>What We Provide?</h2>
                            <p class="text-center leads">What You Can Expect from Us</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">
                            <div class="icon">
                                <img src="<?php echo e(asset('frontend/assets/images/theme/icons/icon-1.svg')); ?>" height="100"
                                     width="100">
                            </div>
                            <div class="icon_box_content">
                                <h5 class="text-center">Best Prices & Offers</h5>
                                <p class="text-center">Competitive rates to support your business profitability</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">
                            <div class="icon">
                                <img src="<?php echo e(asset('frontend/assets/images/theme/icons/icon-2.svg')); ?>" height="100"
                                     width="100">
                            </div>
                            <div class="icon_box_content">
                                <h5 class="text-center">Customer-Centric Approach</h5>
                                <p class="text-center">Dedicated support to meet your unique business needs</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">
                            <div class="icon">
                                <img src="<?php echo e(asset('frontend/assets/images/theme/icons/icon-3.svg')); ?>" height="100"
                                     width="100">
                            </div>
                            <div class="icon_box_content">
                                <h5 class="text-center">Reliable Supply Chain</h5>
                                <p class="text-center">Timely deliveries to keep your operations running smoothly</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">
                            <div class="icon">
                                <img src="<?php echo e(asset('frontend/assets/images/theme/icons/icon-4.svg')); ?>" height="100"
                                     width="100">
                            </div>
                            <div class="icon_box_content">
                                <h5 class="text-center">Easy Returns</h5>
                                <p class="text-center">Hassle-free return process for a smooth business experience</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">
                            <div class="icon">
                                <img src="<?php echo e(asset('frontend/assets/images/theme/icons/icon-5.svg')); ?>" height="100"
                                     width="100">
                            </div>
                            <div class="icon_box_content">
                                <h5 class="text-center">100% Satisfaction</h5>
                                <p class="text-center">We are committed to ensuring complete customer satisfaction with every order</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon_box icon_box_style4 box_shadow1" style="border-radius: 18px">
                            <div class="icon">
                                <img src="<?php echo e(asset('frontend/assets/images/theme/icons/icon-6.svg')); ?>" height="100"
                                     width="100">
                            </div>
                            <div class="icon_box_content">
                                <h5 class="text-center">Premium Quality</h5>
                                <p class="text-center">We deliver only the best food products, sourced from trusted suppliers</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END SECTION WHY CHOOSE -->

        <!-- Counter -->
        <div class="section bg_default mb-4 pb_70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h1 class="text-center"><span class="counter">30</span>+</h1>
                            <h5 class="text-center">Vendors</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h1 class="text-center"><span class="counter">200</span>+</h1>
                            <h5 class="text-center">Happy Merchants</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h1 class="text-center"><span class="counter">1</span>K+</h1>
                            <h5 class="text-center">Products</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h1 class="text-center"><span class="counter">5</span>K+</h1>
                            <h5 class="text-center">Sales</h5>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Message from chairman -->
        <div class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about_img scene mb-4 mb-lg-0">
                            <img
                                src="<?php echo e(asset('frontend/assets/images/demo_user.jpg')); ?>"
                                style="border-radius: 14px" alt="about_img" height="600">
                        </div>
                        <div class="icon_box icon_box_style4 box_shadow1 mt-4" style="border-radius: 24px">

                            <div class="icon_box_content">
                                <h3>Nymul Islam Chowdhury</h3>
                                <p class="text-center">Chairman, Deshi Shad Inc.</p>
                            </div>
                        <div class="icon_box_content p-2">
                            <span class="m-2"><a href=""><i class="fa fa-facebook" style="font-size: 18px; color: #1bad4b" aria-hidden="true"></i></a> </span>
                            <span class="m-2"><a href=""><i class="fa fa-twitter" style="font-size: 18px; color: #1bad4b" aria-hidden="true"></i></a> </span>
                            <span class="m-2"><a href=""><i class="fa fa-instagram" style="font-size: 18px; color: #1bad4b" aria-hidden="true"></i></a> </span>
                            <span class="m-2"><a href=""><i class="fa fa-youtube-play" style="font-size: 18px; color: #1bad4b" aria-hidden="true"></i></a> </span>

                        </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="heading_s1">
                            <h2>Message from the Chairman</h2>
                        </div>
                        <p>Since its formation, Deshi Shad has had one purpose: to take Bangladesh's authentic tastes
                            and food items and share them with the world. The company stays true to its vision of
                            upholding top-tier quality food products while preserving traditional recipes that people
                            have carried for ages. In this way, we vouch that apart from taste and quality, the
                            tradition stays undivided in each product we serve our clients and customers. Our endeavor
                            results in unforgettable culinary experiences.</p>
                        <p>Driven by our principles of honesty, respect, quality, and support, we designed a growth
                            strategy that enabled us to become sustainable. We value our heritage and never accept a
                            replica when, at the same time, we accept technological changes. We put excellent
                            possibilities at our disposal by being a trustworthy and open business. Social
                            responsibility has also become the key factor in our activity, from offering funding to
                            social welfare projects to becoming a strong voice. This commitment is the rock of the firm,
                            and it gives us our purpose and direction, as it has before and now in this dynamic
                            world.</p>
                        <p>Our vision for the business in the long run will be to transform Deshi Shad into the most
                            well-known brand in the world for traditional Bangladeshi food products. We aim not only to
                            be a well-liked name but also a worldwide representative that celebrates the rich culinary
                            heritage of Bangladesh on a global scale. This path choice constantly stimulates us to
                            enlarge the product line we offer, reinforce our supply chain, and create partnerships in
                            new markets. Our commitment to holding onto our roots as we prepare for the years ahead will
                            enable us to extend stronger and more sustainable bonds across the new customer segments, as
                            well as the traditional flavor of the products.</p>
                        <p>Thanks to our clients and business partners, Deshi Shad Inc. would like to express its
                            profound gratitude. Your trust and unyielding support are the driving forces behind our
                            success. Trust fuels us to rise to the challenge and satisfy your needs more. Hand in hand,
                            we will work to make our dream come true: to take the tastes of Bangladesh to the world.
                            Thank you for participating in Deshi Shad in the mission and journey of love and
                            development.</p>

                    </div>
                </div>
            </div>
        </div>

        
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views/frontend/about_us.blade.php ENDPATH**/ ?>