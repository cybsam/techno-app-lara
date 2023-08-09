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
            <div class="text-danger">
                @if (Session::get('validerr'))
                    <b>{{ Session::get('validerr') }}</b>
                @endif
            </div>
            <div class="text-info">
                @if (Session::get('succ'))
                    <b>{{ Session::get('succ') }}</b>
                @endif
            </div>
            <div class="">
                @if ($errors->all())
                    <span class="text-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </span>
                @endif
            </div>
            <a href="{{ route('SupUser.ProjectCategoryShow') }}" class="btn btn-success">Project Category List</a>
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addteammember">+ Project Category</button>
            </div>
        </div>
        <div class="card-body">
            
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-2">
                    <label for="">__Project Name: <b class="text-danger">*</b></label>
                    <input type="text" name="project_name" id="project_name" class="form-control" value="" placeholder="Ex. Navana Engineering Limited" required="required" >
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Header Image: <b class="text-danger">*</b></label>
                    <input type="file" name="project_header_image" id="project_header_image" class="form-control" >
                </div>
                <div class="form-group mt-2">
                    <label for="" class="text-danger">__Select Project Category: <b class="text-danger">**</b></label>
                    <select name="project_category_slug" class="form-control" id="project_category_slug">
                        <option value="0" selected>Select Project Category</option>

                    </select>
                </div>
                <hr>
                <div class="form-group mt-2">
                    <label for="">__Project Keywords: ( , )<b class="text-danger">**</b></label>
                    <input type="text" name="project_keyword" class="form-control" id="project_keyword" required="required">
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Scope: <b class="text-danger">*</b></label>
                    <textarea class="form-control" name="project_scope" id="project_scope"></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Type: <b class="text-danger">*</b></label>
                    <textarea name="project_type" id="project_type" class="form-control"></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Location <span class="text-warning">(if have location then insert or leave it blank)</span></label>
                    <input type="text" name="project_location" id="project_location" class="form-control" placeholder="Ex. ho:226, rd:03, ave:01, mirpur 12">
                </div>
                <div class="form-group mt-2">
                    <label for="">__Project Description <b class="text-danger">**</b></label>
                    <textarea name="project_description" class="form-control" id="summernote" ></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="" class="text-warning">__Project Status (On-Going or Complete) <b class="text-danger">**</b></label>
                    <select name="is_ongoing" class="form-control" id="is_ongoing">
                        <option value="null" selected>Select Project Status</option>
                        <option value="0">Complete</option>
                        <option value="1">On Going</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <div class="button-group">
                        <button type="" class="btn btn-secondary">Clear</button>
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