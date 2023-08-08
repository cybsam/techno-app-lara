

@extends('FrontEndView.layouts.frontMaster')
@section('title','502 Bad Gateway ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">502</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span>Bad Gateway.</p>
        <p class="lead">
            The server was acting as a gateway or proxy and received an invalid response from the upstream server.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection