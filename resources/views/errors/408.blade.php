
@extends('FrontEndView.layouts.frontMaster')
@section('title','408 Request Timeout ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">408</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span>Request Timeout.</p>
        <p class="lead">
            The server timed out waiting for the request.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection