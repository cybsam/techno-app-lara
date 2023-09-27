@extends('layouts.SupUserMaster')

@section('title', 'File Index - Techno Apogee')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

<div class="pagetitle">
    <h1>Files</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
            
            <li class="breadcrumb-item active">File Index</li>
        </ol>
    </nav>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-border datatable">
                <thead>
                    <th>#</th>
                    <th>Blog</th>
                    <th>Product</th>
                    <th>Project</th>
                    <th>File Category</th>
                    <th>File Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#summernote').summernote({
        placeholder: 'Type something about project...',
        tabsize: 2,
        height: 200
    });
</script>
@include('dashboard.download.partials.modal')
@endsection
@section('js')
@include('dashboard.download.partials.js')
@endsection