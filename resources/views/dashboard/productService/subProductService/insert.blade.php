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
                <li class="breadcrumb-item active">Product & Service Insert</li>
            </ol>
        </nav>
    </div>
    
    
    <hr>

    

    <div class="card">
        <div class="card-header">
            Insert Product & Service
            <div class="float-right">
                <a href="{{ URL::previous() }}" class="btn btn-info"><- Back</a>
            </div>
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
            <div class="text-info">
                @if (Session::get('prosubInsCom'))
                    <b>{{ Session::get('prosubInsCom') }}</b>
                @endif
            </div>
            <div class="text-danger">
                @if (Session::get('prosubInsErr'))
                    <b>{{ Session::get('prosubInsErr') }}</b>
                @endif
            </div>
            <form action="{{ route('SupUserProduct.SubMenuInsertS') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product & service name</label>
                    <input type="text" name="__prosername" value="{{ old('__prosername') }}" class="form-control" id="__prosername"  required="required">
                    <div class="text-danger">
                        @error('__prosername')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Product Menu</label>
                    <input type="text" value="{{ $menu_slug }}" name="__prosermaincateslug" id="__prosermaincateslug" class="form-control" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>Product & service Header Image</label>
                    <input type="file" value="{{ old('__proserheadimage') }}" name="__proserheadimage" id="__proserheadimage" class="form-control" required="required">
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
                    <input type="text" name="__proserkeyword" value="{{ old('__proserkeyword') }}" class="form-control" id="__proserkeyword" required="required">
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
                    <textarea name="__proserdescription" id="summernote" cols="30" rows="10" required="required" value="{{ old('__proserdescription') }}"></textarea>
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

@endsection