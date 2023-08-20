@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Project Details ~ Fire Panel Repair & Maintenance BD - Techno Apogee Limited')
@section('metaTitle',"{!! $projectDetaisView->project_name !!}")

@section('metaDescription',"{!! $projectDetaisView->project_keyword !!}")
@section('content')
<style>
.portfolio-single img{
    width: 100%;
    height: 400px;
}

       .img6{
           position: relative;
       }
       .img6 img {
    height: 400px;
    width: 100%;
}
        
</style>
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    {{ $projectDetaisView->project_name }} 
                </h1>
            </div>
        </div>
    </div>

    <!-- Project Section Start -->
    <div class="rs-project pb-110 md-pt-70 md-pb-7 mt-5">
        <div class="container">
            <div class="row">                        
                <div class="col-lg-8 pr-60 md-pr-15">
                    <div class="sec-title mb-64">
                        
                        <h2 class="title title4 pb-30">
                            About Project
                        </h2>
                        
                        <div class="slider-img portfolio-single">
                              <img src="{{ asset('image/project') }}/{{ $projectDetaisView->project_header_image }}" alt="Slider">
                        </div>
                        <p class="margin-0 mt-5">{!! $projectDetaisView->project_description !!}</p>
                        
                    </div>
                   
                </div>
                <div class="col-lg-4">
                    <div class="project-information bg24">
                        
                        <div class="sec-title">
                            <h2 class="title title4 pb-30">
                                Project information
                            </h2>
                            <div class="title-inner mb-25">
                                <h4 class="title-small">Project Name</h4>
                                <p class="margin-0">{{ $projectDetaisView->project_name }}</p>
                            </div>
                            <div class="title-inner mb-25">
                                <h4 class="title-small">Scope</h4>
                                <p class="margin-0">{{ $projectDetaisView->project_scope }}</p>
                            </div>
                            <div class="title-inner mb-25">
                                <h4 class="title-small">Project Type</h4>
                                <p class="margin-0">{{ $projectDetaisView->project_type }}</p>
                            </div>
                            <div class="title-inner mb-25">
                                <h4 class="title-small">Location</h4>
                                <p class="margin-0">{{ $projectDetaisView->project_location }}</p>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project Section End -->


@endsection