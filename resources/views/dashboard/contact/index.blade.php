@extends('layouts.SupUserMaster')

@section('title', 'Front Page Contact - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Contact List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">List Contact</li>
            </ol>
        </nav>
    </div>
    <hr>

    <div class="card">
        
    </div>



    @include('dashboard.contact.partials.modal')
@endsection
@section('js')
    @include('dashboard.contact.partials.js')
@endsection
