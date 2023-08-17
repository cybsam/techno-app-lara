@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Product and Service Details ~ Product And Service - Fire Panel Repair & Maintenance BD | Techno Apogee Limited')
@section('metaTitle'," {{ $__fetchFromDb->__prosername }} ")
@section('metaDescription'," {{ $__fetchFromDb->__proserkeyword }} ")
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
                    {{ Str::title($__fetchFromDb->__prosername) }}
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
                            <img src="{{ asset('image/productservice/subproduct') }}/{{ $__fetchFromDb->__proserheadimage }}" alt="{{ $__fetchFromDb->__prosername }}">
                        </div>
                        <p>{!! $__fetchFromDb->__proserdescription !!}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Services Section End -->
    
@endsection