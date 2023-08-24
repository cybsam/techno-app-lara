@extends('layouts.SupUserMaster')
@section('title', 'Update Blog - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Blog Update</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUserBlog.Index') }}">Blog</a></li>
                <li class="breadcrumb-item active">Blog Update</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div><h5>{{ $getDataFromBlog->__blog_name }}</h5></div>
                        
                    </div>
                    <div class="card-body">
                        <form action="{{ route('SupUserBlog.UpdateSave') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Blog Name</label>
                                <input type="text" value="{{ $getDataFromBlog->__blog_name }}" name="blog_name" class="form-control" readonly="readonly">
                                <input type="hidden" value="{{ $getDataFromBlog->__blog_slug }}" name="blog_slug" class="form-control" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="">Blog Feature Image</label>
                                <input type="file" class="form-control" name="blogfeatureImage" id="blogfeatureImage">
                            </div>
                            <div class="form-group">
                                <label for="">Blog meta title</label>
                                <input type="text" value="{{ $getDataFromBlog->__blog_meta_title }}" class="form-control" name="blogMetaTitle" id="blogMetaTitle">
                            </div>
                            <div class="form-group">
                                <label for="">Blog Keyword</label>
                                <input type="text" value="{{ $getDataFromBlog->__blog_meta_keyword }}" class="form-control" name="blogMetaKeyword" id="blogMetaKeyword">
                            </div>
                            <div class="form-group">
                                <label for="">Blog Short Description</label>
                                <textarea name="blogShortDesc" id="blogShortDesc" class="form-control">{{ $getDataFromBlog->__blog_short_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Blog Description</label>
                                <textarea name="blogDescription" id="summernote" class="form-control">{{ $getDataFromBlog->__blog_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <select name="checkActiveOrNot" class="form-control bg-success text-white" id="checkActiveOrNot">
                                    <option value="0" default>Select Publish or not</option>
                                    <option value="0">Publish</option>
                                    <option value="1">Darft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="button-group align-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ URL::previous() }}" class="btn btn-secondary">Return Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ URL::previous() }}" class="btn btn-primary">Return Back</a>
                    </div>
                    <div class="card-body">
                        <div>
                            <img src="{{ asset('image/blog') }}/{{ $getDataFromBlog->__blog_header_image }}" alt="">
                        </div>
                        <hr>
                        <p>Blog Status: <span class="@if($getDataFromBlog->__blog_status == 0) badge bg-primary @endif">Active</span></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#summernote').summernote({
            placeholder: 'Description...',
            tabsize: 2,
            height: 200
        });
    </script>


@include('dashboard.blog.partials.modal')
@endsection
@section('js')
    @include('dashboard.blog.partials.js')
@endsection