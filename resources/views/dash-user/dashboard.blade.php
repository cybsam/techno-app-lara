@extends('dash-user.layouts.master')
@section('title', 'User Dashboard ~ Fire Panel Repair & Maintenance BD - Techno Apogee Limited')
@section('content')


<h1 class="float-center">
    {{ Auth::user()->name }}
</h1>

@endsection