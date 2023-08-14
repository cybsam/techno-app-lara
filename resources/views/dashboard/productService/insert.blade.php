@extends('layouts.SupUserMaster')

@section('title', 'Index Product and Service - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Insert Product & Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProductSerIndex') }}">Product & Service</a></li>
                <li class="breadcrumb-item active">Insert Product & Service</li>
            </ol>
        </nav>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            Insert Product & Service
        </div>
        <div class="card-body">
            <form action="{{ route('SupUser.ProductSerInsert') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product & service name</label>
                    <input type="text" name="__prosername" class="form-control" id="__prosername">
                </div>
                <div class="form-group">
                    <label for="">Menu Select</label>
                    <select name="__prosermenuselect" class="form-control" id="__prosermenuselect">
                        <option value="0.null" selected>Select Menu Option</option>
                        <option value="1.design-and-consultancy-services">DESIGN & CONSULTANCY SERVICES</option>
                        <option value="2.electrical-solution">ELECTRICAL SOLUTION</option>
                        <option value="3.fire-solution">FIRE SOLUTION</option>
                        <option value="4.automation-solution">AUTOMATION SOLUTION</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product & service Header Image</label>
                    <input type="file" name="__proserheadimage" class="form-control" id="__proserheadimage">
                </div>
                <hr>
                <div class="form-group">
                    <label>Product & service keyword</label>
                    <input type="text" name="__proserkeyword" class="form-control" id="__proserkeyword">
                </div>
                <hr>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="__proserdescription" id="summernote" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <div class="button-group">
                        <button type="submit" class="btn btn-primary">Insert Product & Service</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    


<script>
    $('#summernote').summernote({
        placeholder: 'Type something about project...',
        tabsize: 2,
        height: 200
    });
</script>



@include('dashboard.project.partials.modal')
@endsection
@section('js')
@include('dashboard.project.partials.js')
@endsection