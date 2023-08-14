@extends('layouts.SupUserMaster')

@section('title', 'Index Product and Service - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Index Product & Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">Product & Service</li>
            </ol>
        </nav>
    </div>
    
    
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
            @foreach ($productServiceStatus as $key => $productService)
                <tr>
                    <td>{{ $productService->id }}</td>
                    <td><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>$productService->__proserslug]) }}">{{ $productService->__proserslug }}</a></td>
                    <td><img src="{{ asset('image/productservice') }}/{{ $productService->__proserheadimage }}" height="55px" width="55px" alt="{{ $productService->__prosername }}"></td>
                    <td>{{ $productService->__prosermenuselect }}</td>
                    <td>
                        <div class="button-group">
                            <a href="" class="btn btn-warning btn-sm">Update</a>
                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



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