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
    
    
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="text-danger">
                @if (Session::get('validerr'))
                    <b>{{ Session::get('validerr') }}</b>
                @endif
            </div>
            <div class="text-info">
                @if (Session::get('succ'))
                    <b>{{ Session::get('succ') }}</b>
                @endif
            </div>
            <div class="">
                @if ($errors->all())
                    <span class="text-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </span>
                @endif
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addteammember">+ Member</button>
            </div>
        </div>
    </div>
            
            <table class="table table-hover datatable table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Degination</th>
                        <th scope="col">Department</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">WhatsApp</th>
                        <th scope="col">Create at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($listMember as $key => $listMember)
                        <tr class="table-light">
                            <th scope="row"><a href="#">#{{ $listMember->id }}</a></td>
                            <td><img src="{{ asset('image/about-us/our-team') }}/{{ $listMember->image }}" height="35px" width="35px" alt=""></td>
                            <td>{{ $listMember->name }}</td>
                            <td>{{ Str::limit($listMember->degination,15) }}</td>
                            <td>{{ Str::limit($listMember->department,15) }}</td>
                            <td>{{ $listMember->mobile }}</td>
                            <td>{{ $listMember->email }}</td>
                            <td>{{ $listMember->whatsapp }}</td>
                            <td>{{ $listMember->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" value="{{ $listMember->id }}"  class="btn btn-warning UpdateUserFromBack">
                                        <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" value="{{ $listMember->id }}" class="btn btn-danger delteUserFromBckEnd">
                                        <i class="bi bi-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                                
    
                            </td>
                        </tr>
                    @endforeach
    
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Degination</th>
                        <th scope="col">Department</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">WhatsApp</th>
                        <th scope="col">Create at</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
        
    
    

   






@include('dashboard.about-us.our-team.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.our-team.partials.js')
@endsection