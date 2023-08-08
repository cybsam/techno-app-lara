@extends('layouts.SupUserMaster')
@section('title', 'Mission And Vission ~ About Us - Techno Apogee Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Mission And Vission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item active">Mission And Vission</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a href="" class="btn btn-warning">Update</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover datatable table-sm">
                <thead>
                    <tr>
                        
                        <th>Mission Image</th>
                        <th>Mission Description</th>
                        <th>Vission Image</th>
                        <th>Vission Description</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="" alt="" height="100%" width="100%">
                        </td>
                        <td>{{ $backView->mission_description }}</td>
                        <td><img src="" alt=""></td>
                        <td>{{ $backView->vission_description }}</td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    

   






{{-- @include('dashboard.about-us.about-us.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.about-us.partials.js') --}}
@endsection