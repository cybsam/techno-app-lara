@extends('layouts.SupUserMaster')

@section('title', 'Insert Product and Service - Techno Apogee Limited')
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
            <div>
                @if($errors->all())
                <span class="text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </span>
                @endif
            </div>
            <form action="{{ route('SupUser.ProductSerInsert') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product & service name</label>
                    <input type="text" name="__prosername" class="form-control" id="__prosername"  required="required">
                    <div class="text-danger">
                        @error('__prosername')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Menu Select</label>
                    <select name="__prosermenuselect" class="form-control" id="__prosermenuselect" required="required">
                        <option value="0.null" selected>Select Menu Option</option>
                        <option value="1.design-and-consultancy-services">DESIGN & CONSULTANCY SERVICES</option>
                        <option value="2.electrical-solution">ELECTRICAL SOLUTION</option>
                        <option value="3.fire-solution">FIRE SOLUTION</option>
                        <option value="4.automation-solution">AUTOMATION SOLUTION</option>
                    </select>
                    <div class="text-danger">
                        @error('__prosermenuselect')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Product & service Header Image</label>
                    <input type="file" name="__proserheadimage" id="__proserheadimage" class="form-control" required="required">
                    <div class="text-danger">
                        @error('__proserheadimage')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>Product & service keyword</label>
                    <input type="text" name="__proserkeyword" class="form-control" id="__proserkeyword" required="required">
                    <div class="text-danger">
                        @error('__proserkeyword')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="__proserdescription" id="summernote" cols="30" rows="10" required="required"></textarea>
                    <div class="text-danger">
                        @error('__proserdescription')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
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
        placeholder: 'Type something about product or service...',
        tabsize: 2,
        height: 200
    });
</script>



@include('dashboard.productService.partials.modal')
@endsection
@section('js')
@include('dashboard.productService.partials.js')
@endsection