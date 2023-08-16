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

            </table>
        </div>
    </div>
@include('dashboard.about-us.our-concern.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.our-concern.partials.js')
@endsection
