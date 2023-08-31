@extends('FrontEndView.layouts.frontMaster')
{{-- @section('title', 'our mission and Vission | Techno Apogee') --}}
{{-- @section('metaTitle','Techno Apogee Mission And Vission, Techno Apogee Limited, Apogee Engineering Limited, Apogee Consulting Limited') --}}
{{-- @section('metaDescription',"{{ $missionAndVission->mission_vission_keyword }}") --}}
@section('content')
<style>
    .weDoMission {
    box-shadow: 0 0 13px 0 #917a7a;
    padding: 20px 6px;
}

</style>

<main class="main">
        <!--==================== About Header ====================-->
        <div class="rs-breadcrumbs">
            <div class="container">
                <div class="breadcrumbs-inner">
                    <h1 class="page-title">
                        Our Mission & Vission
                    </h1>
                </div>
            </div>
        </div>

 
        <!--==================== What We Do ====================-->
        <section id="weDo">
            <div class="container">
                <div class="row mt-5 mb-5 weDoMission">
                    <div class="col-lg-6">
                        <div class="weDo">
                            <img src="{{ asset('image/about-us/mission-vission') }}/{{ $missionAndVission->mission_image }}" alt="">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="weDo">
                            <h3>Our Mission</h3>
                            <p>{{ $missionAndVission->mission_description }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=============== award ================-->
        <section id="weDo">
            <div class="container">
                <div class="row mt-5 mb-5 weDoMission">
                    
                    <div class="col-lg-6">
                        <div class="weDo">
                            <h3>Our Vission</h3>
                            <p>{{ $missionAndVission->vission_description }}.</p>
                        </div>
                </div>
                
                    <div class="col-lg-6">
                        <div class="weDo">
                            <img src="{{ asset('image/about-us/mission-vission') }}/{{ $missionAndVission->vission_image }}" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>



@endsection