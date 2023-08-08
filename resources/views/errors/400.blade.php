
@extends('FrontEndView.layouts.frontMaster')
@section('title','400 Bad Request ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">400</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span>Bad Request.</p>
        <p class="lead">
            The request cannot be fulfilled due to bad syntax.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection