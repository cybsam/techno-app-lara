@extends('layouts.SupUserMaster')

@section('title', 'View Message - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>View Message</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('supUser.FrontEndContact') }}">Contact Message</a></li>
                <li class="breadcrumb-item active">View Message</li>
            </ol>
        </nav>
    </div>
    <hr>

    <div class="card">
        <div class="card-header">
            ddd
        </div>
        <div class="card-body">
            jfd
            
        </div>
    </div>




    @include('dashboard.contact.partials.modal')
@endsection
@section('js')
    @include('dashboard.contact.partials.js')
@endsection
