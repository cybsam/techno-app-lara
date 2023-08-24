@extends('layouts.SupUserMaster')
@section('title', 'Blog Page - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Blog Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>

                <li class="breadcrumb-item active">Blog Page</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="button-group">
                <div class="float-left">
                    <a href="{{ URL::previous() }}" class="btn btn-info"><- back</a>
                </div>
                <div class="float-right">
                    <b><a href="{{ route('SupUserBlog.InsertIndex') }}" class="btn btn-primary">+ Insert Blog Post</a></b>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (Session::get('blogDeleteComplete'))
                <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ Session::get('blogDeleteComplete') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (Session::get('blogDeleteFailed'))
                <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">


                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <img src="..." class="rounded me-2" alt="...">
                            <strong class="me-auto">Blog Page</strong>
                            <small>0 mins ago</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            {{ Session::get('blogDeleteFailed') }}
                        </div>
                    </div>
                </div>
            @endif
            <table class="table table-sm datatable table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allListBlog as $key => $listBlog)
                        <tr>
                            <td>{{ $listBlog->id }}</td>
                            <td><a href="{{ route('SupUserBlog.Update',['blog_id'=>$listBlog->id,'blog_slug'=>$listBlog->__blog_slug]) }}">{{ $listBlog->__blog_name }}</a></td>
                            <td>
                                <img src="{{ asset('image/blog') }}/{{ $listBlog->__blog_header_image }}" height="50px"
                                    width="70px">
                            </td>
                            <td>
                                <div class="button-group">
                                    <a href="{{ route('SupUserBlog.Update',['blog_id'=>$listBlog->id,'blog_slug'=>$listBlog->__blog_slug]) }}" class="btn btn-info btn-sm">Update</a>
                                    <button type="button" value="{{ $listBlog->id }}"
                                        class="btn btn-danger DeleteBlogServiceModal btn-sm">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('dashboard.blog.partials.modal')
@endsection
@section('js')
    @include('dashboard.blog.partials.js')
@endsection
