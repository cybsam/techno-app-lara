@extends('backEndView.layouts.backMaster')

@section('page_header')
    Administrator Dashboard
@endsection
@section('title')
    List Users
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Users List</li>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Users List') }}</h4>
                        <div class="text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                {{ _(' User') }}
                            </button>
                        </div>  
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dt-select">
                                <thead>
                                    <tr>
                                        <th scope="col">SL:</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($listAllUsers as $key => $value)
                                    <tbody>
                                        <tr>
                                            @php
                                                $counter = 1;
                                            @endphp
                                            <td>{{ $counter = $counter + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->username }}</td>
                                            <td>{{ $value->email }}</td>

                                            <td>{{ $value->role }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#updateModal" data-id="{{ $value->id }}"
                                                    data-title="{{ $value->title }}" data-priority="{{ $value->priority }}"
                                                    data-row="{{ $value->row }}">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal" data-id="{{ $value->id }}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>

                        <table id="dt-select" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Extn.</th>
                                <th>Start date</th>
                                <th>Salary</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Extn.</th>
                                <th>Start date</th>
                                <th>Salary</th>
                              </tr>
                            </tfoot>
                          </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('backEndView.users.partials.modal')
@endsection
@section('js')
@include('backEndView.users.partials.js')
@endsection
