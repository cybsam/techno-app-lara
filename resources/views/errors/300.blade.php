
@extends('FrontEndView.layouts.frontMaster')
@section('title','300 Multiple Choices ~ Techno Apogee Limited')


@section('content')



<div class="d-flex align-items-center justify-content-center vh-60 pt-5">
    <div class="text-center">
        <h1 class="display-1 fw-bold">300</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Multiple Choices</p>
        <p class="lead">
            A link list. The user can select a link and go to that location.
          </p>
          <a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
<div class="pt-5"></div>
@endsection