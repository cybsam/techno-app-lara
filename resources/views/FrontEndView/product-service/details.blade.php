@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Product and Service Details ~ Product And Service - Fire Panel Repair & Maintenance BD | Techno Apogee Limited')
@section('metaTitle'," {{ $fetchPro->__prosername }} ")
@section('metaDescription'," {{ $fetchPro->__proserkeyword }} ")
@section('cssFront')


@section('content')
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
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    {{ Str::title($fetchPro->__prosername) }}
                </h1>
            </div>
        </div>
    </div>

    <div class="rs-services style2 rs-services-style2 gray-bg pt-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-12 col-md-6 mb-20">
                    <div class="service-wrap">
                        <div class="image-part prodectDetail_img">
                            <img src="{{ asset('image/productservice') }}/{{ $fetchPro->__proserheadimage }}" alt="">
                        </div>
                        <p>{!! $fetchPro->__proserdescription !!}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Services Section End -->

    <!-- Services Section Start -->
    <div class="rs-services style2 rs-services-style2 gray-bg pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row">

                @php
                    $randPro = DB::table('product_services')->where('__prosermenuselect',$fetchPro->__prosermenuselect)->orderByRandom()->limit(4)->get();
                @endphp

                @foreach ($randPro as $RandProduct)
                    <div class="col-lg-4 col-md-6 mb-20">
                        <div class="service-wrap">
                            <div class="image-part product">
                                <img src="{{ asset('image/productservice') }}/{{ $RandProduct->__proserheadimage }}" alt="">
                            </div>
                            <div class="content-part">

                                <div class="desc"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>$RandProduct->__proserslug]) }}" target="_blank">{{ $RandProduct->__prosername }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Services Section End -->

    </div>
    



@endsection