
@extends('FrontEndView.layouts.frontMaster')
@section('title','206 error ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">206</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> </p>
        <p class="lead">
            The server is delivering only part of the resource due to a range header sent by the client.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection