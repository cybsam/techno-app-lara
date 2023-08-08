

@extends('FrontEndView.layouts.frontMaster')
@section('title','401 Unauthorized ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">401</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span>Unauthorized.</p>
        <p class="lead">
            The request was a legal request, but the server is refusing to respond to it. For use when authentication is possible but has failed or not yet been provided.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection