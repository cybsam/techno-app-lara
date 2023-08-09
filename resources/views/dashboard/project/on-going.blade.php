@extends('layouts.SupUserMaster')

@section('title', 'On Going Project - Techno Apogee Limited')
@section('SupUserContent')


    <div class="pagetitle">
        <h1>On Going Project</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Project</a></li>
                <li class="breadcrumb-item active">Insert New Project Details</li>
            </ol>
        </nav>
    </div>


    <table class="table table-hover datatable table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Project Category</th>
                <th scope="col">Project Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($onGoingProject as $key => $onGoingProject)
            <tr>
                <td>{{ $onGoingProject->id }}</td>
                <td>{{ $onGoingProject->project_name }}</td>
                <td>{{ $onGoingProject->project_category_slug }}</td>
                <td><img src="{{ asset('image/project') }}/{{ $onGoingProject->project_header_image }}" alt="{{ $onGoingProject->project_name }}" height="80px" width="80px"></td>
                <td>
                    <a href="" class="btn btn-secondary">Update</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>





@endsection
