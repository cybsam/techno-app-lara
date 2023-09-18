@extends('FrontEndView.layouts.frontMaster')
@section('content')


    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Strategic Partner - {{ $checkDatabase->strategic_partners_name }}
                </h1>
            </div>
        </div>
    </div>


    <style>
        .prodectDetail_img img {
                width: 100%;
                height: 450px;
            }
    
            .product img {
                width: 100% !important;
                height: 250px !important;
            }
    
            .prodectDetail_img {
                width: 80%;
                margin: auto;
            }
    
            .content-part .desc a {
                font-size: 11px;
            }
    
            .productPageInnder {
                margin-bottom: -5px;
            }
    </style>
        
    
        <div class="rs-services style2 rs-services-style2 gray-bg pt-100 md-pt-70 md-pb-70">
            <div class="container custom">
                <div class="row">
                    <div class="col-lg-12 col-md-6 mb-20">
                        <div class="service-wrap">
                            <div class="image-part prodectDetail_img">
                                <img src="{{ asset('image/about-us/strategic-partners') }}/{{ $checkDatabase->strategic_partners_logo }}" alt="">
                            </div>
                            <p>{!! $checkDatabase->strategic_partners_about !!}</p>
                            <style>
                                div#social-links ul li{
                                    display: inline-block;
                                }
                                div#social-links ul li a{
                                    padding: 10px;
                                    margin: 1px;
                                    font-size: 30px;
    
                                }
                            </style>
                            <div>
                                {!! $socialShare !!}
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        <!-- Services Section End -->
    
        

@endsection