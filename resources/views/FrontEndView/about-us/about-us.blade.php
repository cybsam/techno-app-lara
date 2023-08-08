@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Our Team ~ About Us - Fire Panel Repair & Maintenance BD | Techno Apogee Limited')
@section('metaTitle',"{{ $fetchAboutData->keyword_title }}")
@section('metaDescription',"{{ $fetchAboutData->keyword_description }}")

@section('content')

    <style>
        .rs-breadcrumbs {
            background-image: url("{{ asset('image/FrontEnd/breadcrumb/breadcrumb.jpg') }}");
            /* background-image: url('./public/image/fontend/img/breadcrumbs/inr_6.jpg'); */
            background-repeat: no-repeat !important;
            background-size: cover !important;
            background-position: center !important;
            background-image: url('public/image/FrontEnd/breadcrumb/breadcrumb.jpg');
        }
    </style>
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#303030">
                    About Us
                </h1>
            </div>
        </div>
    </div>


    <section id="weDo">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-lg-6">
                    <div class="weDo">
                        <img src="{{ asset('image/about-us/about-us') }}/{{ $fetchAboutData->image }}" alt="">
                    </div>
                </div>

                <div class="col-lg-6 weDoContent">
                        <div class="weDoContent">
                            {!! $fetchAboutData->description !!}
                        </div>
                </div>
            </div>
        </div>
    </section>

    



@endsection