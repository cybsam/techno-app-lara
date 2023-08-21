@extends('layouts.SupUserMaster')
@section('title', 'Blog Page - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

<div class="pagetitle">
    <h1>Blog Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
        
        <li class="breadcrumb-item active">Blog Page</li>
      </ol>
    </nav>
  </div>
<div class="card">
    <div class="card-header">
        <div class="button-group">
            <div class="float-left">
                <a href="{{ URL::previous() }}" class="btn btn-info"><- back</a>
            </div>
            <div class="float-right">
                <b><a href="{{ route('SupUserBlog.InsertIndex') }}" class="btn btn-primary">+ Insert Blog Post</a></b>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm datatable table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>



@endsection
