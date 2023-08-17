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
                <li class="breadcrumb-item active">Product & Service Sub Menu</li>
            </ol>
        </nav>
    </div>
    <hr>
    <div class="card-header">
        <a href="{{ URL::previous() }}" class="btn btn-info"><- Back</a>
        <div class="float-right">
            <a href="{{ route('SupUserProduct.SubMenuInsert',['menu_slug'=>$menu_slug]) }}" class="btn btn-primary btn-sm">+ Sub Product</a>
        </div>
    </div>
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
            @foreach ($ProductServiceSubMenu as $key => $ProductServiceSubMenu)
                <tr>
                    <td>{{ $ProductServiceSubMenu->id }}</td>
                    <td><a href="">{{ $ProductServiceSubMenu->__proserslug }}</a></td>
                    <td><img src="{{ asset('image/productservice/subproduct') }}/{{ $ProductServiceSubMenu->__proserheadimage }}" height="55px" width="55px" alt="{{ $ProductServiceSubMenu->__prosername }}"></td>
                    <td>{{ $ProductServiceSubMenu->__prosermaincateslug }}</td>
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


@endsection