@extends('layouts.SupUserMaster')

@section('title', 'Complete Project - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Complete Project</h1>
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
            @foreach ($CompleteProject as $key => $completeProject)
            <tr>
                <td>{{ $completeProject->id }}</td>
                <td>{{ $completeProject->project_name }}</td>
                <td>{{ $completeProject->project_category_slug }}</td>
                <td><img src="{{ asset('image/project') }}/{{ $completeProject->project_header_image }}" alt="{{ $completeProject->project_name }}" height="80px" width="80px"></td>
                <td>
                    <a href="" class="btn btn-secondary">Update</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



@endsection
