@extends('layouts.SupUserMaster')
@section('title', 'Insert Blog - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Blog Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUserBlog.Index') }}">Blog</a></li>
                <li class="breadcrumb-item active">Insert Blog</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="button-group">
                <div class="float-left">

                </div>
                <div class="float-right">
                    <b><a href="{{ URL::previous() }}" class="btn btn-primary"><- Previous Page</a></b>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="text-danger">
                @if (Session::get('bloginsertFailed'))
                    <b>{{ Session::get('bloginsertFailed') }}</b>
                @endif
            </div>
            <div class="text-primary">
                @if (Session::get('insertBlogSuccess'))
                    <b>{{ Session::get('insertBlogSuccess') }}</b>
                @endif
            </div>
            <form action="{{ route('SupUserBlog.Insert') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Blog Title</label>
                    <input type="text" class="form-control" name="blogName" value="{{ old('blogName') }}" id="blogName">
                    <div class="text-danger">
                        @error('blogName')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Blog Feature Image</label>
                    <input type="file" class="form-control" name="blogImage" id="blogImage">
                    <div class="text-danger">
                        @error('blogImage')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Blog keyword <span>seperate by ( , )</span></label>
                    <input type="text" class="form-control" name="blogKeyword" value="{{ old('blogKeyword') }}"
                        id="blogKeyword">
                    <div class="text-danger">
                        @error('blogKeyword')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Blog Short Description</label>
                    <textarea name="blogShortDesc" id="blogShortDesc" class="form-control"></textarea>
                    <div class="text-danger">
                        @error('blogShortDesc')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="blogDescriptions" id="summernote" class="form-control"></textarea>
                    <div class="text-danger">
                        @error('blogDescriptions')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group align-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox"  id="flexCheckDefault" value="0">
                        <label class="form-check-label" for="flexCheckDefault">
                            Publish Article
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="button-group">
                        <button type="submit" class="btn btn-primary">Insert Blog</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        $('#summernote').summernote({
            placeholder: 'Description...',
            tabsize: 2,
            height: 200
        });
    </script>
@endsection
