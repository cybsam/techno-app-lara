

@extends('FrontEndView.layouts.frontMaster')
@section('title','302 Found ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">302</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Found.</p>
        <p class="lead">
            The requested page has moved temporarily to a new URL.
          </p>
        <a href="{{ route('frontEndIndex') }}" class="btn btn-primary">Go Home</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection