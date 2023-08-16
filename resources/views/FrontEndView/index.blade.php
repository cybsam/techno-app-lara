@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Fire Panel Repair & Maintenance BD - Techno Apogee Limited')
@section('content')

<style>
    .blog-img img{
        height: 300px;
    }

</style>


<div class="main">

    <!-- Slider Start -->
    <div id="rs-slider" class="rs-slider slider3">
        <div class="bend niceties">
            <div id="nivoSlider" class="slides">
                <img src="{{ asset('image/carosel-slider/engrieening.png')}}" alt="" title="#slide-1" />
                <img src="{{ asset('image/carosel-slider/installsutation.png')}}" alt="" title="#slide-2" />
                <img src="{{ asset('image/carosel-slider/pocurement.jpg')}}" alt="" title="#slide-3" />
                
            </div>
            <!-- Slide 1 -->
            <div id="slide-1" class="slider-direction">
                <div class="content-part">
                    <div class="container">
                        <div class="slider-des">
                            <h1 class="sl-title">Engineering </h1>
                        </div>
                      
                        <div class="slider-bottom ">
                            <a class="readon consultant slider" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'design-consultancy-service']) }}">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div id="slide-2" class="slider-direction">
                <div class="content-part">
                    <div class="container">
                        <div class="slider-des">
                            <h1 class="sl-title">Construction</h1>
                        </div>
                        
                        <div class="slider-bottom ">
                            <a class="readon consultant" href="contact.html">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div id="slide-3" class="slider-direction">
                <div class="content-part">
                    <div class="container">
                        <div class="slider-des">
                            <h1 class="sl-title">Pocurement</h1>
                        </div>
                        
                        <div class="slider-bottom">
                            <a class="readon consultant" href="contact.html">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider End -->

       <!-- Services Section Start -->
       <div class="rs-services style1 reverse">
        <div class="container">
            <div class="row service-wrap mr-0 ml-0">
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/design&Consultancy.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>'design-consultancy-service']) }}">Design & Consultancy Services</a></h4>
                        <div class="desc mb-12">Our Chartered Industrial Engineers and Consultants work with you to provide practical and cost-effective.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'design-consultancy-service']) }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/electrical&Fire.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>'electrical-solution']) }}">Fire & Electrical Solution</a></h4>
                        <div class="desc mb-12">Fire & Electrical Solutions is competent to work in all types of domestic & business settings.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'electrical-solution']) }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid br-none bdru">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/risks.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>'automation-solution']) }}">Automation Solution</a></h4>
                        <div class="desc mb-12">The implementation of automation systems regarding building controls has been growing lately, and it is only getting better as technology .</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'automation-solution']) }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Section End -->

    <!-- About Section Start -->
    <div class="rs-about style5 relative pt-140 md-pt-80">
        <div class="container">
            <div class="row rs-vertical-middle">
                <div class="col-lg-6 pr-72">
                    <div class="left-side">
                        <img src="{{ asset('public/image/fontend/img/about/about.jpg')}}" alt="">
                        <div class="skill-tag"><span>16</span> Years <br> Experience</div>
                        <img class="left-pattern" src="{{ asset('public/image/fontend/img/pattern/pattern1.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 md-pt-50">
                    <div class="sec-title4 mb-30">
                        <div class="sub-title secondary-color mb-10">About us</div>
                        <h2 class="title primary-color">Techno Apogee started its operation from June 2006 in Dhaka, Bangladesh.</h2>
                        <div class="desc left-line-v">
                            <div class="draw-line start-draw"></div>
                            We are providing the best EPC support on Fire Electrical & Automation field in Bangladesh. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.
                        </div>
                    </div>
                    <div class="row mb-40">
                        <div class="col-md-6">
                            <ul class="services">
                                <li><i class="fa fa-check"></i>Affordable Support</li>
                                <li><i class="fa fa-check"></i>Client Oriented</li>
                                <li><i class="fa fa-check"></i>Affordable Support</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="services">
                                <li><i class="fa fa-check"></i>Professional Team</li>
                                <li><i class="fa fa-check"></i>24/7 Active Service</li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-part">
                        <a class="readon2" href="#">Learn More <div class="btn-arrow"></div></a>
                    </div>
                </div>
            </div>
            <div class="pattern-img">
                <img class="left-pattern" src="{{ asset('public/image/fontend/img/pattern/pattern1.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Services Section Start -->
    <div class="rs-services style1 modify shape-bg pt-128 md-pt-70 md-pb-80">
        <div class="container">
            <div class="sec-title4 text-center mb-60">
                <div class="sub-title mb-6">Services</div>
                <h2 class="title primary-color">What We Provide</h2>
            </div>
            <div class="row service-wrap mr-0 ml-0">
                <div class="col-lg-4 padding-0 pr-1">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/fontend/img/icons/electrical&Fire.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="#">Electrical & Fire Safety Audit & Consultancy</a></h4>
                        <div class="desc mb-12">Integer at faucibus urna. Nullam condimentum leo id.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/fontend/img/icons/noc.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="#">NOC & Fire Safety Plan for FSCD</a></h4>
                        <div class="desc mb-12">Integer at faucibus urna. Nullam condimentum leo id.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/fontend/img/icons/busbar.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="#">Busbar Trunking (BBT) Systems</a></h4>
                        <div class="desc mb-12">Integer at faucibus urna. Nullam condimentum leo id.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0 pr-1">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/fontend/img/icons/fireDetection.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="#">Fire Detection & Protection System</a></h4>
                        <div class="desc mb-12">Integer at faucibus urna. Nullam condimentum leo id.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/fontend/img/icons/lightingProtection.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="#">Lightning Protection System</a></h4>
                        <div class="desc mb-12">Integer at faucibus urna. Nullam condimentum leo id.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/fontend/img/icons/home&HotelAutomation.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="#">Home & Hotel Automation</a></h4>
                        <div class="desc mb-12">Integer at faucibus urna. Nullam condimentum leo id.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="view-btn text-center mt-40">
                <a class="readon2" href="#">All Services <div class="btn-arrow"></div></a>
            </div>
        </div>
    </div>
    <!-- Services Section End -->

      <!-- Blog Section Start -->
      <div class="rs-blog style1 shape-bg pt-130 md-pt-70 sm-pt-10">
        <div class="container">
            <div class="sec-title4 text-center mb-50">
                <h2 class="title">Our Project</h2>
            </div>
            <div class="rs-carousel owl-carousel owl-loaded owl-drag" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                
                {{-- @foreach ($Project as $item)
                    
                
                <div class="blog-wrap">
                    <div class="blog-img">
                        <img src="{{ URL::to($item->image) }}" alt="">
                    </div>
                    <div class="blog-contant">
                        <h4 class="title"><a href="{{route('portfolio', $item->slug_name)}}">{{$item->name}}</a></h4>

                        
                        <div class="blog-meta">
                            
                        </div>
                    </div>
                </div>
                @endforeach --}}
                
            </div>
        </div>
    </div>
    <!-- Blog Section End -->
</div> 
<!-- Main content End -->
@endsection