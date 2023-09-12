
@extends('layouts.SupUserMaster')
@section('title', 'Strategic Partners Update ~ About Us - Techno Apogee')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Strategic Partners Update</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item active">Strategic Partners Update</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <span>Partner Name</span>
                        <input type="text" name="strategic_partners_name" id="strategic_partners_name" class="form-control" value="{{ $FromDatabase->strategic_partners_name }}">
                    </div>
                    <div class="form-group">
                        <span>Partner Logo</span>
                        <input type="file" name="strategic_partners_logo" id="strategic_partners_logo" class="form-control">
                    </div>
                    <div class="form-group">
                        <span>Partner Name</span>
                        <textarea name="strategic_partners_about" class="form-control" id="strategic_partners_about">{{ $FromDatabase->strategic_partners_about }}</textarea>
                    </div>
                    <hr>
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        image
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('image/about-us/strategic-partners') }}/{{ $FromDatabase->strategic_partners_logo }}" height="" alt="Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('dashboard.about-us.strategic-partners.partials.modal')
@endsection
@section('js')
    @include('dashboard.about-us.strategic-partners.partials.js')
@endsection