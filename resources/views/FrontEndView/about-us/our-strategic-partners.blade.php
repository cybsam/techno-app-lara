@extends('FrontEndView.layouts.frontMaster')
@section('content')


    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Our Strategic Partners
                </h1>
            </div>
        </div>
    </div>
    <section class="bg-light pt-5 pb-5 shadow-sm">
        <div class="container">
            <div class="row pt-5">
                <div class="col-12">
                    <h3 class="text-uppercase border-bottom mb-4">Our Strategic Partners</h3>
                </div>
            </div>
            <div class="row">
                <!--ADD CLASSES HERE d-flex align-items-stretch-->
                @foreach ($listStretegicPartnersList as $keyStretegic => $listStretegicPartners)
                    <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                        <div class="card">
                            <img src="{{ asset('image/about-us/strategic-partners') }}/{{ $listStretegicPartners->strategic_partners_logo }}"
                                class="card-img-top" alt="{{ $listStretegicPartners->strategic_partners_name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $listStretegicPartners->strategic_partners_name }}</h5>
                                <p class="card-text mb-4">{{ \Str::limit($listStretegicPartners->strategic_partners_about,100) }}.</p>
                                <a href="" class="btn btn-primary text-white mt-auto align-self-start">Read More...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex">
                    {{ $listStretegicPartnersList->links() }}
                </div>
            </div>
        </div>
        
    </section>

    <section class="bg-light pt-5 pb-5 shadow-sm">
        <div class="container">
            <div class="row pt-5">
                <div class="col-12">
                    <h3 class="text-uppercase border-bottom mb-4">Our Strategic Partners</h3>
                </div>
            </div>
            <div class="row">
                <!--ADD CLASSES HERE d-flex align-items-stretch-->
                @foreach ($listStretegicPartnersList as $keyStretegic => $listStretegicPartners)
                    <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                        <div class="card">
                            <img src="{{ asset('image/about-us/strategic-partners') }}/{{ $listStretegicPartners->strategic_partners_logo }}"
                                class="card-img-top" alt="{{ $listStretegicPartners->strategic_partners_name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $listStretegicPartners->strategic_partners_name }}</h5>
                                <p class="card-text mb-4">{{ \Str::limit($listStretegicPartners->strategic_partners_about,100) }}.</p>
                                <a href="" class="btn btn-primary text-white mt-auto align-self-start">Read More...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex">
                    {{ $listStretegicPartnersList->links() }}
                </div>
            </div>
        </div>
        
    </section>



@endsection
