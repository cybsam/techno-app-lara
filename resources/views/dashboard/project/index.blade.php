@extends('layouts.SupUserMaster')

@section('title', 'Insert New Project Details - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Insert New Project Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Project</a></li>
                <li class="breadcrumb-item active">Insert New Project Details</li>
            </ol>
        </nav>
    </div>
    
    
    <hr>
    <div class="card">
        <div class="card-header">
            
            
            <a href="{{ route('SupUser.ProjectCategoryShow') }}" class="btn btn-success">Project Category List</a>
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#projectcategory">+ Project Category</button>
            </div>
        </div>
        <div class="card-body">
            
            
                @if (Session::get('ProjectInsertComplete'))
                    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                        role="alert">
                        {{ Session::get('ProjectInsertComplete') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::get('ProjectInsertFailed'))
                    <div class="alert alert-primary bg-warning text-light border-0 alert-dismissible fade show"
                        role="alert">
                        {{ Session::get('ProjectInsertFailed') }}
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
            
            <form action="{{ route('SupUser.ProjectInsert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-2">
                    <label for="">__Project Name: <b class="text-danger">*</b></label>
                    <input type="text" name="project_name" id="project_name" class="form-control" value="{{ old('project_name') }}" placeholder="Ex. Navana Engineering Limited" required="required" >
                    <div class="text-danger">
                        @error('project_name')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Header Image: <b class="text-danger">*</b></label>
                    <input type="file" name="project_header_image" id="project_header_image" class="form-control" >
                    <div class="text-danger">
                        @error('project_name')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="" class="text-danger">__Select Project Category: <b class="text-danger">**</b></label>
                    <select name="project_category_slug" class="form-control" id="project_category_slug">
                        <option value="null" selected>Select Project Category</option>
                        @foreach ($projectCategory as $key => $projectCategory)
                            <option value="{{ $projectCategory->id }}{{ _('.') }}{{ $projectCategory->project_category_slug }}">{{ $projectCategory->project_category }}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('project_name')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group mt-2">
                    <label for="">__Project Keywords: ( , )<b class="text-danger">**</b></label>
                    <input type="text" name="project_keyword" value="{{ old('project_name') }}" class="form-control" id="project_keyword" required="required">
                    <div class="text-danger">
                        @error('project_name')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Scope: <b class="text-danger">*</b></label>
                    <textarea class="form-control"  name="project_scope" id="project_scope">{{ old('project_name') }}</textarea>
                    <div class="text-danger">
                        @error('project_name')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Type: <b class="text-danger">*</b></label>
                    <textarea name="project_type"  id="project_type" class="form-control">{{ old('project_name') }}</textarea>
                    <div class="text-danger">
                        @error('project_name')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Location <span class="text-warning">(if have location then insert or leave it blank)</span></label>
                    <input type="text" name="project_location" value="{{ old('project_name') }}" id="project_location" class="form-control" placeholder="Ex. ho:226, rd:03, ave:01, mirpur 12">
                    <div class="text-danger">
                        @error('project_location')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Description <b class="text-danger">**</b></label>
                    <textarea name="project_description" class="form-control" id="summernote" >{{ old('project_description') }}</textarea>
                    <div class="text-danger">
                        @error('project_description')
                            <b>{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="" class="text-warning">__Project Status (On-Going or Complete) <b class="text-danger">**</b></label>
                    <select name="is_ongoing" class="form-control" id="is_ongoing">
                        <option value="null" selected>Select Project Status</option>
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
                        <button type="reset" class="btn btn-secondary">Reset Page</button>
                        <button type="" class="btn btn-primary">Insert Project</button>
                    </div>
                </div>
                
            </form>
            
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