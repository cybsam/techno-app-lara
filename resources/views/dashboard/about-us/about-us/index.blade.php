@extends('layouts.SupUserMaster')
@section('title', 'About Us ~ About Us - Techno Apogee Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>About Us</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">About Us</li>
            </ol>
        </nav>
    </div>


    <div class="container">
        
    </div>
    

   






@include('dashboard.about-us.about-us.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.about-us.partials.js')
@endsection