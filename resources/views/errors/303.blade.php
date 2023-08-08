


@extends('FrontEndView.layouts.frontMaster')
@section('title','303 See Other ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">303</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> See Other.</p>
        <p class="lead">
            The requested page can be found under a different URL.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection