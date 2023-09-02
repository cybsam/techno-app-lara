@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Our Concern ~ About Us | Techno Apogee')
@section('content')

    
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Our Concern
                </h1>
            </div>
        </div>
    </div>

    
    <section id="weDo">
        <div class="container">
            <div class="row mt-5 mb-5">
                @foreach ($fetchFromDb as $key => $fetchConcern)
                <div class="col-lg-4 ">
                    <div class="ourConcern">
                        <img src="{{ asset('image/about-us/our-concern') }}/{{ $fetchConcern->concern_image }}" width="100%" height="100px" alt="{{ $fetchConcern->concern_name }}">
                        <p>{!! $fetchConcern->concern_description !!}.</p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>




@endsection