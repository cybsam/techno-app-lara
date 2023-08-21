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



@endsection
