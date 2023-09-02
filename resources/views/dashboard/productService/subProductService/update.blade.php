@extends('layouts.SupUserMaster')

@section('title', 'Update Product and Service - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Update Product & Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProductSerIndex') }}">Product & Service</a></li>
                <li class="breadcrumb-item active">Update Product & Service</li>
            </ol>
        </nav>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <span style="font-style: italic;">{{ $fetchProductFromDB->__prosername }}</span>
                            <div class="float-right">
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Return Back</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div>
                            @if ($errors->all())
                                <span class="text-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </span>
                            @endif
                        </div>
                        @if (Session::get('productUpdateCompleteSub'))
                            <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('productUpdateCompleteSub') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Session::get('productUpdateFailedSub'))
                            <div class="alert alert-primary bg-warning text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('productUpdateFailedSub') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('SupUserProduct.SubMenuUpdate') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Product & service name</label>
                                <input type="text" name="__prosername" value="{{ $fetchProductFromDB->__prosername }}"
                                    readonly="readonly" class="form-control" id="__prosername" required="required">

                            </div>
                            <div class="form-group">
                                <label>Product & service Header Image</label>
                                <input type="file" name="__proserheadimage" id="__proserheadimage" class="form-control">
                                <input type="hidden" name="product_id" value="{{ $fetchProductFromDB->id }}">
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
                                <input type="text" name="__proserkeyword"
                                    value="{{ $fetchProductFromDB->__proserkeyword }}" class="form-control"
                                    id="__proserkeyword" required="required">
                                <input type="hidden" name="product_slug" value="{{ $fetchProductFromDB->__proserslug }}">
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
                                <textarea name="__proserdescription" id="summernote" cols="30" rows="10" required="required"
                                    value="{{ old('__proserdescription') }}">{{ $fetchProductFromDB->__proserdescription }}</textarea>
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
                                    <button type="submit" class="btn btn-primary">Update Product & Service</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Status: <span class="badge bg-primary">Active</span></h5>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <h4 class="text-secondary text-italic">Feature Image</h4>
                            <img src="{{ asset('image/productservice/subproduct') }}/{{ $fetchProductFromDB->__proserheadimage }}"
                                alt="">
                        </div>

                    </div>
                </div>
            </div>
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
