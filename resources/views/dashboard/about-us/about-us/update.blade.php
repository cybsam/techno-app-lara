@extends('layouts.SupUserMaster')
@section('title', 'About Us ~ About Us - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>About Us</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item active">About Us Update</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    
                    <div class="card-body">
                        
                        @if (Session::get('AboutUsInformationUpdateSucc'))
    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
        role="alert">
        {{ Session::get('AboutUsInformationUpdateSucc') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif
                        <form action="{{ route('SupUser.AboutUsIndexUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <span>Left Image</span>
                                <input type="file" class="form-control" name="aboutUsImage" id="aboutUsImage">
                            </div>
                            <div class="form-group">
                                <span>About Us Keyword Title</span>
                                <input type="text" class="form-control" value="{{ $showDataAboutUs->keyword_title }}" name="aboutUskeywordTitle" id="aboutUskeywordTitle">
                            </div>
                            <div class="form-group">
                                <span>About Us Keyword Description</span>
                                <input type="text" class="form-control" value="{{ $showDataAboutUs->keyword_description }}" name="aboutUskeywordDescription" id="aboutUskeywordDescription">
                            </div>
                            <div class="form-group">
                                <span>About Us Description</span>
                                <textarea name="aboutUsOnfo" class="form-control" id="summernote" >{{ $showDataAboutUs->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('image/about-us/about-us') }}/{{ $showDataAboutUs->image }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    <script>
        $('#summernote').summernote({
            placeholder: 'Description...',
            tabsize: 2,
            height: 200
        });
    </script>






@include('dashboard.about-us.about-us.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.about-us.partials.js')
@endsection