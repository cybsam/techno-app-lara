@extends('layouts.SupUserMaster')

@section('title', 'Update Project Details - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Update Project Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Project</a></li>
                <li class="breadcrumb-item active">Update Project Details</li>
            </ol>
        </nav>
    </div>


    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">


                        <a href="{{ route('SupUser.ProjectCategoryShow') }}" class="btn btn-success">Project Category
                            List</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#projectcategory">+ Project Category</button>
                        <div class="float-right">
                            <a href="{{ URL::previous() }}" class="btn btn-secondary">Return Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::get('projectUpdateComplete'))
                            <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('projectUpdateComplete') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Session::get('projectUpdateFailed'))
                            <div class="alert alert-primary bg-warning text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('projectUpdateFailed') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="">
                            @if ($errors->all())
                                <span class="text-danger">
                                    @foreach ($errors->all() as $error)
                                        <li><b>{{ $error }}</b></li>
                                    @endforeach
                                </span>
                            @endif
                        </div>

                        <form action="{{ route('SupUser.ProjectUpdateCont') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="">__Project Name: <b class="text-danger">*</b></label>
                                <input type="text" name="project_name" id="project_name" class="form-control"
                                    value="{{ $fetchProjectFromDB->project_name }}" readonly>
                                <div class="text-danger">
                                    @error('project_name')
                                        <b>{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">__Project Header Image: <b class="text-danger">*</b></label>
                                <input type="file" name="project_header_image" id="project_header_image"
                                    class="form-control">
                                <input type="hidden" name="id" value="{{ $fetchProjectFromDB->id }}">
                                <div class="text-danger">
                                    @error('project_header_image')
                                        <b>{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="" class="text-danger">__Select Project Category: <b
                                        class="text-danger">**</b></label>
                                <select name="project_category_slug" class="form-control" id="project_category_slug">
                                    <option value="{{ $fetchProjectFromDB->project_category_slug }}" selected>{{ $fetchProjectFromDB->project_category_slug }}</option>
                                    @foreach ($projectCategory as $key => $projectCategory)
                                        <option
                                            value="{{ $projectCategory->id }}{{ _('.') }}{{ $projectCategory->project_category_slug }}">
                                            {{ $projectCategory->project_category }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="project_slug" value="{{ $fetchProjectFromDB->project_slug }}">
                                <div class="text-danger">
                                    @error('project_category_slug')
                                        <b>{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="form-group mt-2">
                                <label for="">__Project Keywords: ( , )<b class="text-danger">**</b></label>
                                <input type="text" name="project_keyword"
                                    value="{{ $fetchProjectFromDB->project_keyword }}" class="form-control"
                                    id="project_keyword" required="required">
                                <div class="text-danger">
                                    @error('project_keyword')
                                        <b>{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">__Project Scope: <b class="text-danger">*</b></label>
                                <textarea class="form-control" name="project_scope" id="project_scope">{{ $fetchProjectFromDB->project_scope }}</textarea>
                                <div class="text-danger">
                                    @error('project_scope')
                                        <b>{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">__Project Type: <b class="text-danger">*</b></label>
                                <textarea name="project_type" id="project_type" class="form-control">{{ $fetchProjectFromDB->project_type }}</textarea>
                                <div class="text-danger">
                                    @error('project_type')
                                        <b>{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">__Project Location <span class="text-warning">(if have location then
                                        insert or leave it blank)</span></label>
                                <input type="text" name="project_location"
                                    value="{{ $fetchProjectFromDB->project_location }}" id="project_location"
                                    class="form-control" placeholder="Ex. ho:226, rd:03, ave:01, mirpur 12">
                                <div class="text-danger">
                                    @error('project_location')
                                        <b>{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">__Project Description <b class="text-danger">**</b></label>
                                <textarea name="project_description" class="form-control" id="summernote">{{ $fetchProjectFromDB->project_description }}</textarea>
                                <div class="text-danger">
                                    @error('project_description')
                                        <b>{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="" class="text-warning">__Project Status (On-Going or Complete) <b
                                        class="text-danger">**</b></label>
                                <select name="is_ongoing" class="form-control" id="is_ongoing">
                                    <option value="{{ $fetchProjectFromDB->is_ongoing }}" selected>@if($fetchProjectFromDB->is_ongoing == 0) Complete @else On Going @endif</option>
                                    <option value="0">Complete</option>
                                    <option value="1">On Going</option>
                                </select>
                                <div class="text-danger">
                                    @error('is_ongoing')
                                        <b>{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <div class="button-group">
                                    
                                    <button type="submit" class="btn btn-primary">Update Project</button>
                                    <button type="reset" class="btn btn-secondary">Reset Page</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Project Image</h5>
                    </div>
                    <div class="card-body">
                        
                        <img src="{{ asset('image/project') }}/{{ $fetchProjectFromDB->project_header_image }}"
                            alt="">
                    </div>
                </div>
            </div>
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
