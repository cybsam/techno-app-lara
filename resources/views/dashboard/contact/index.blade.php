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

    <table class="table table-hover datatable table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($showContact as $key => $contactU)
                <tr class="@if($contactU->is_seen == 1)text-muted @endif">
                    <td>{{ $contactU->id }}</td>
                    <td>{{ $contactU->sender_name }}</td>
                    <td><a href="mailto:{{ $contactU->sender_email }}">{{ $contactU->sender_email }}</a></td>
                    <td>{{ Str::limit($contactU->sender_subject, 20) }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('supUser.FrontEndContactShow',['id'=>$contactU->id]) }}"><i class="bi bi-eye"></i></a>
                        
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>



    @include('dashboard.contact.partials.modal')
@endsection
@section('js')
    @include('dashboard.contact.partials.js')
@endsection
