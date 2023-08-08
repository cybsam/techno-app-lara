
@extends('FrontEndView.layouts.frontMaster')
@section('title','403 Forbidden ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">403</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Forbidden.</p>
        <p class="lead">
            The request was a legal request, but the server is refusing to respond to it.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection