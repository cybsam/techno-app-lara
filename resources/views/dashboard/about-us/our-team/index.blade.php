@extends('layouts.SupUserMaster')
@section('title', 'Our Team ~ About Us - Techno Apogee Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Our Team</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item active">Our Team</li>
            </ol>
        </nav>
    </div>
    

   






@include('dashboard.about-us.our-team.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.our-team.partials.js')
@endsection