@extends('layouts.SupUserMaster')
@section('title', 'Our Expertise ~ About Us - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Our Expertise</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item active">Our Expertise</li>
            </ol>
        </nav>
    </div>



    <div class="card">
        <div class="card-header">
            Our Expertise
            <div class="float-right">
                <button type="button" data-bs-toggle="modal" data-bs-target=".expertiseModel" class="btn btn-primary btn-sm">+ Expertise</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover datatable table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fetchData as $key => $fetchExpertise)
                        <tr>
                            <td>{{ $fetchExpertise->id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

@include('dashboard.about-us.our-expertise.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.our-expertise.partials.js')
@endsection