@extends('layouts.SupUserMaster')
@section('title', 'Strategic Partners ~ About Us - Techno Apogee')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Strategic Partners</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item active">Strategic Partners</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (Session::get('strategicPartnersDone'))
                        <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ Session::get('strategicPartnersDone') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::get('strategicPartnersError'))
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ Session::get('strategicPartnersError') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#StrategicPartnersModal"
                            class="btn btn-primary float-right">+ Insert Strategic Partners</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-border datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">About</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listPartners as $partKey => $listPartners)
                                    <tr>
                                        <td>{{ $listPartners->id }}</td>
                                        <td>{{ $listPartners->strategic_partners_name }}</td>
                                        <td><img src="{{ asset('image/about-us/strategic-partners') }}/{{ $listPartners->strategic_partners_logo }}"
                                                alt="Partners Logo" height="70px" width="70px"></td>
                                        <td>{{ \Str::limit($listPartners->strategic_partners_about,100) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('SupUser.OurStrategicPartnersUpdateShow',['strategic_id'=>$listPartners->id]) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                <button type="button" value="{{ $listPartners->id }}" class="btn btn-danger strategicModalDelete"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
