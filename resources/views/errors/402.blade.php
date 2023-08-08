
@extends('FrontEndView.layouts.frontMaster')
@section('title','402 Payment Required ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">402</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Payment Required.</p>
        <p class="lead">
            Reserved for future use
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection