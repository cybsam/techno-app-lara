
@extends('FrontEndView.layouts.frontMaster')
@section('title','101 rest of the request ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">100</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span>Request has been received without any problems.</p>
        <p class="lead">
            The rest of the request should now be sent.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection