@extends('layouts.SupUserMaster')
@section('title', 'Settings About Us Information or Address - Techno Apogee Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Address or About us information</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Settings</a></li>
                <li class="breadcrumb-item active">About Us Information</li>
            </ol>
        </nav>
    </div>

    <div class="conainer">
        <div class="row">
            <div class="col-md-12">
                hey
            </div>
        </div>
    </div>






@include('dashboard.settings.aboutusinfo.partials.modal')
@endsection
@section('js')
@include('dashboard.settings.aboutusinfo.partials.js')
@endsection