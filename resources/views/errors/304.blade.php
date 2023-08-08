
@extends('FrontEndView.layouts.frontMaster')
@section('title','304 Not Modified ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">304</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span>Not Modified.</p>
        <p class="lead">
            Indicates the requested page has not been modified since last requested.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection