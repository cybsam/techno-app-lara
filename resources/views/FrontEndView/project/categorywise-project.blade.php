@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Project Portfolio ~ Fire Panel Repair & Maintenance BD - Techno Apogee Limited')
@section('metaTitle', '')
@section('metaDescription', '')
@section('content')
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    {{ Str::title($proejct_slug) }}
                </h1>
            </div>
        </div>
    </div>

    <div class="rs-project style3 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                @foreach ($categoryWiseProjectList as $key => $categoryProject)
                    <div class="col-lg-4 col-md-6 mb-30">
                        <a href="">
                            <div class="project-item">
                                <div class="project-img">
                                    <a href="">
                                        <img src="{{ asset('image/project') }}/{{ $categoryProject->project_header_image }}" alt="{{ $categoryProject->project_name }}">
                                    </a>
                                </div>
                                <div class="project-content">
                                    <div class="portfolio-inner">

                                        <h3 class="title">
                                            <a href="{{ route('FrontEnd.ProjectDetailsShow',['project_slug'=>$categoryProject->project_slug]) }}">{{ $categoryProject->project_name }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
