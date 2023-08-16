@extends('layouts.SupUserMaster')
@section('title', 'Our Concern ~ About Us - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Our Concern</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item active">Our Concern</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <span>Our Concern List</span>
            <div class="float-right">
                <button class="btn btn-primary btn-sm" data-bs-toggle="" data-bs-target="" type="button">+ Concern</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover datatable table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Concern Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listConcern as $key => $concern)
                        <tr>
                            <td>{{ $concern->id }}</td>
                            <td>{{ $concern->concern_image }}</td>
                            <td>{{ $concern->concern_description }}</td>
                            <td>
                                <button class="btn btn-info">Update</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@include('dashboard.about-us.our-concern.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.our-concern.partials.js')
@endsection
