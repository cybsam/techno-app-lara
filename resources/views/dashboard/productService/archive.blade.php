@extends('layouts.SupUserMaster')

@section('title', 'Index Product and Service - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Index Product & Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProductSerIndex') }}">Product & Service</a></li>
                <li class="breadcrumb-item active">Product & Service Archive</li>
            </ol>
        </nav>
    </div>
    
    @if (Session::get('productDelteSucc'))
    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
        role="alert">
        {{ Session::get('productDelteSucc') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif
@if (Session::get('productDelteFall'))
<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
    role="alert">
    {{ Session::get('productDelteFall') }}
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
@endif
    <hr>
    <table class="table table-hover datatable table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Slug</th>
                <th scope="col">image</th>
                <th scope="col">Parent</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listArchive as $key => $productService)
                <tr>
                    <td>{{ $productService->id }}</td>
                    <td><a href="{{ route('SupUserProduct.SubMenuShow',['menu_slug'=>$productService->__proserslug]) }}">{{ $productService->__proserslug }}</a></td>
                    <td><img src="{{ asset('image/productservice') }}/{{ $productService->__proserheadimage }}" height="55px" width="55px" alt="{{ $productService->__prosername }}"></td>
                    <td>{{ $productService->__prosermenuselect }}</td>
                    <td>
                        <div class="button-group">
                            
                            <button type="button" value="{{ $productService->id }}" class="btn btn-primary productrestoreBTN btn-sm"><i class="bi bi-arrow-clockwise"></i></button>
                            <button type="button" value="{{ $productService->id }}" class="btn btn-danger productHardDeleteBTN btn-sm"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>




    @include('dashboard.productService.partials.modal')
    @endsection
    @section('js')
    @include('dashboard.productService.partials.js')
    @endsection