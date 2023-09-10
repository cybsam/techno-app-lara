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
                    <div class="card-header">
                        <button type="button" class="btn btn-primary float-right">Insert Strategic Partners</button>
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
                                        <td><img src="{{ asset('image/about-us/strategic-partners') }}/{{ $listPartners->strategic_partners_logo }}" alt="Logo"></td>
                                        <td>{{ $listPartners->strategic_partners_about }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-warning">Update</button>
                                                <button class="btn btn-danger">Delete</button>
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
    