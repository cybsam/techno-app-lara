
@extends('FrontEndView.layouts.frontMaster')
@section('title','410 Gone ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">410</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span>Gone.</p>
        <p class="lead">
            The requested page is no longer available.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection