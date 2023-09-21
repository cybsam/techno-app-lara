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
                <td><a href="{{ route('SupUser.ProjectUpdate',['project_id'=>$onGoingProject->id,'project_slug'=>$onGoingProject->project_slug]) }}">{{ $onGoingProject->project_name }}</a></td>
                <td>{{ $onGoingProject->project_category_slug }}</td>
                <td><img src="{{ asset('image/project') }}/{{ $onGoingProject->project_header_image }}" alt="{{ $onGoingProject->project_name }}" height="40px" width="80px"></td>
                <td>
                    <div class="button-group">
                        <a href="{{ route('SupUser.ProjectUpdate',['project_id'=>$onGoingProject->id,'project_slug'=>$onGoingProject->project_slug]) }}" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" value="{{ $onGoingProject->id }}" class="btn btn-danger btn-sm ProjectArchiveButton"><i class="bi bi-archive"></i></button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




@include('dashboard.project.partials.modal')
@endsection
@section('js')
@include('dashboard.project.partials.js')
@endsection
