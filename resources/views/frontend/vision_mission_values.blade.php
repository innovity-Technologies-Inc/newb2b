@extends('frontend.structures.master')
@section('content')
    @include('frontend.structures.breadcrumb')

    <div class="main_content">

        <!-- Vision -->
        <div class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about_img scene mb-4 mb-lg-0">
                            <img src="{{asset('frontend/assets/images/page/vision.jpg')}}" style="border-radius: 14px" alt="about_img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="heading_s1">
                            <h2>Our Vision</h2>
                        </div>
                        <p>At Deshi Shad, our mission is to passionately deliver the authentic flavors and culinary treasures of Bangladesh to the world. We are committed to upholding the highest standards of quality, sourcing the finest ingredients, and preserving traditional recipes that have been cherished for generations. Through our diverse range of frozen snacks, fish, vegetables, grains, and bakery delights, we aim to bring joy to our customers' taste buds and create unforgettable culinary experiences. Our unwavering dedication to excellence and innovation guides us in our pursuit of becoming a global ambassador of Bangladesh's rich culinary heritage.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission -->
        <div class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="heading_s1">
                            <h2>Our Mission</h2>
                        </div>
                        <p>Our mission at Deshi Shad is to be the leading provider of traditional Bangladeshi food products, globally recognized for our uncompromising commitment to quality and authenticity. We envision a world where people from all walks of life can savor the rich flavors of Bangladesh and experience the vibrant cultural heritage through our culinary offerings. As we continue to expand our market reach and product portfolio, we strive to become a household name and inspire others to appreciate and embrace the cultural diversity of our beloved nation.</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="about_img scene mb-4 mb-lg-0">
                            <img src="{{asset('frontend/assets/images/page/mission.jpg')}}" style="border-radius: 14px" alt="about_img">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values -->
        <div class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about_img scene mb-4 mb-lg-0">
                            <img src="{{asset('frontend/assets/images/page/values.jpg')}}" style="border-radius: 14px" alt="about_img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="heading_s1">
                            <h2>Our Values</h2>
                        </div>
                        <p>At Deshi Shad, our values are the foundation of everything we do. We cherish tradition, preserve authentic recipes, and prioritize top-notch quality through stringent sourcing and control measures. Integrity is at our core, fostering transparency and trust with customers, partners, and employees. Corporate Social Responsibility is central to our mission. Through education scholarships for female workers and social welfare activities, we empower communities. We are committed to inclusivity, diversity, and gender equality. Our passion for culinary excellence drives continuous innovation for delightful experiences worldwide, making a positive impact on individuals and communities. Shahjalal Foods stands for quality, authenticity, and social responsibility.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
