@extends('layouts.SupUserMaster')
@section('title', 'Our Concern ~ About Us - Techno Apogee')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Our Concern</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.OurConcernBck') }}">Our Concern</a></li>
                <li class="breadcrumb-item active">Our Concern Update</li>
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
                        @if (Session::get('ConcernUpdateSucc'))
                            <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('ConcernUpdateSucc') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Session::get('ConcernUpdateError'))
                            <div class="alert alert-warning bg-warning text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('ConcernUpdateError') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('SupUser.OurConcernBckUpdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Concern Name</label>
                                <input type="text" name="concernName" id="concernName" value="{{ $fetchConcernDB->concern_name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Concern Image</label>
                                <input type="file" name="concernImage" id="concernImage" class="form-control">
                                <input type="hidden" name="concid" value="{{ $fetchConcernDB->id }}">
                            </div>
                            <div class="form-group">
                                <label for="">Concern Status</label>
                                <select name="concernStatus" class="form-control bg-warning" id="concernStatus">
                                    <option value="{{ $fetchConcernDB->is_active }}" selected>@if($fetchConcernDB->is_active == 0) Active @elseif($fetchConcernDB->is_active == 1) Inactive @endif</option>
                                    <option value="0">Active</option>
                                    <option value="1">InActive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Concern Description</label>
                                <textarea name="concernDescription" id="summernote" class="form-control">{{ $fetchConcernDB->concern_description }}</textarea>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit">Update Concern</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('image/about-us/our-concern') }}/{{ $fetchConcernDB->concern_image }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#summernote').summernote({
            placeholder: 'Type something about project...',
            tabsize: 2,
            height: 200
        });
    </script>

@include('dashboard.about-us.our-concern.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.our-concern.partials.js')
@endsection