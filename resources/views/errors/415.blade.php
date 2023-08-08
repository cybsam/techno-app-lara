
@extends('FrontEndView.layouts.frontMaster')
@section('title','415 Unsupported Media Type ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">415</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Unsupported Media Type.</p>
        <p class="lead">
            The server will not accept the request, because the media type is not supported .
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection