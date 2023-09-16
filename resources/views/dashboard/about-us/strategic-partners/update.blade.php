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
    @if (Session::get('StrategicPartnersUpdateDone'))
        <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('StrategicPartnersUpdateDone') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::get('strategicPartnersUpdateFailed'))
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('strategicPartnersUpdateFailed') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <form action="{{ route('SupUser.OurStrategicPartnersUpdateSave') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <span>Partner Name</span>
                        <input type="text" name="strategic_partners_name" id="strategic_partners_name"
                            class="form-control" value="{{ $FromDatabase->strategic_partners_name }}">
                    </div>
                    <div class="form-group">
                        <span>Partner Logo</span>
                        <input type="file" name="strategic_partners_logo" id="strategic_partners_logo"
                            class="form-control">
                        <input type="hidden" name="Strid" value="{{ $FromDatabase->id }}">
                    </div>
                    <div class="form-group">
                        <span>Partner Category</span>
                        <select name="strategic_partner_categroy" id="strategic_partner_categroy" class="form-control">
                            <option value="{{ $FromDatabase->strategic_partner_categroy_slug }}" selected>{{ $FromDatabase->strategic_partner_categroy }}</option>
                            @foreach ($category as $key => $partners_cate)
                                <option value="{{ $partners_cate->strategic_partner_categroy_slug }}">{{ $partners_cate->strategic_partner_categroy }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <span>Partner About</span>
                        <textarea name="strategic_partners_about" class="form-control" cols="30" rows="10" id="strategic_partners_about">{{ $FromDatabase->strategic_partners_about }}</textarea>
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
                        <div class="d-grid gap-2">
                            <a href="{{ URL::previous() }}" class="btn btn-primary">&#8592 Back </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('image/about-us/strategic-partners') }}/{{ $FromDatabase->strategic_partners_logo }}"
                            height="" alt="Logo">
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
