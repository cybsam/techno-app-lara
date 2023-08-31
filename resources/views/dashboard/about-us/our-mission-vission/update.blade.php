@extends('layouts.SupUserMaster')
@section('title', 'Mission And Vission ~ About Us - Techno Apogee')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Mission And Vission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.MissionVission') }}">Mission And Vission</a></li>
                <li class="breadcrumb-item active">Mission And Vission Update</li>
            </ol>
        </nav>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{ URL::previous() }}" class="btn btn-primary">Return Back</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::get('MissionVissionUpdateComplete'))
                            <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('MissionVissionUpdateComplete') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Session::get('MissionVissionUpdateError'))
                            <div class="alert alert-warning bg-warning text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('MissionVissionUpdateError') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    <form action="{{ route('SupUser.MissionVissionUpdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Keyword</label>
                            <input type="text" name="keyword" id="keyword" value="{{ $backView->mission_vission_keyword }}" class="form-control">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="">Mission Image</label>
                            <input type="file" class="form-control" name="missionImage" id="missionImage">
                        </div>
                        <div class="form-group">
                            <label for="">Mission Description</label>
                            <textarea name="missionDescription" id="summernote" class="form-control">{{ $backView->mission_description }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="">Vission Image</label>
                            <input type="file" class="form-control" name="vissionImage" id="vissionImage">
                        </div>
                        <div class="form-group">
                            <label for="">Vission Description</label>
                            <textarea name="vissionDescription" id="summernote" cols="20" rows="10" class="form-control">{{ $backView->vission_description }}</textarea>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="submit">Update Blade</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-body">
                <p>Mission Image</p>
                <img src="{{ asset('image/about-us/mission-vission') }}/{{ $backView->mission_image }}" alt="">
                <hr>
                <p>Vission Image</p>
                <img src="{{ asset('image/about-us/mission-vission') }}/{{ $backView->vission_image }}" alt="">
            </div>
        </div>
    </div>
</div>

<script>
    $('#summernote').summernote({
        placeholder: '...',
        tabsize: 2,
        height: 200
    });
</script>

    

@endsection