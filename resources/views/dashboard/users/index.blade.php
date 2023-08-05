@extends('layouts.SupUserMaster')
@section('title', 'Users Page - Techno Apogee Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>

                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Users List
                <div class="float-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addusermodal">
                        + User
                    </button>
                </div>
                 
            </h5>
            
            @if (Session::get('regSuccAdmin'))
                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                    {{ Session::get('regSuccAdmin') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            @if (Session::get('regErroradmin'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                    {{ Session::get('regErroradmin') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            <!-- Default Tabs -->
            <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link text-center w-100 active" id="home-tab" href="" data-bs-toggle="tab"
                        data-bs-target="#home-justified" type="button" role="tab" aria-controls="home"
                        aria-selected="true">Users</button>

                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Admin</button>
                </li>
                
            </ul>
            <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">


                    <table class="table table-hover datatable table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Verified</th>
                                <th scope="col">is active</th>
                                <th scope="col">create</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($users as $key => $users)
                                <tr class="table-light">
                                    <th scope="row"><a href="#">#{{ $users->id }}</a></td>
                                    <td>{{ Str::limit($users->name,10) }}</a></td>
                                    <td><a class="" href=""><span>@</span>{{ Str::limit($users->username,6) }}</a></td>
                                    <td><a href="mailto:{{ $users->email }}">{{ $users->email }}</a></td>
                                    <td><img src="{{ asset('image/users') }}/{{ $users->user_image }}" height="35px" width="35px" alt=""></td>
                                    <td>
                                        @if ($users->email_verified == 1)
                                            <i class="bi bi-patch-check-fill text-primary"></i>
                                        @else
                                            <i class="bi bi-patch-exclamation text-danger"></i>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input is_active_switch" id="switch[{{ $key }}]" data-id="{{$users->id}}" {{ $users->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label" for="switch[{{ $key }}]"></label>
                                        </div>
                                    </td>
                                    <td>{{ $users->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="{{ $users->id }}" data-name="{{ $users->name }}" data-username="{{ $users->username }}" data-email="{{ $users->email }}" data-role_int="{{ $users->role_int }}" data-role="{{ $users->role }}" class="btn btn-warning">
                                                <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteUser" data-id="{{ $users->id }}" class="btn btn-danger">
                                                <i class="bi bi-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        {{-- <a class="text-success" href="{{ route('supuser.UpdateUser',['user_id'=>$SupUser->id]) }}"><i class="bi bi-pencil-square"></i></a><span>&nbsp;&nbsp;</span><a class="text-danger" href=""><i class="bi bi-trash"></i></a> --}}
                                        {{-- <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('supuser.UpdateUser', ['user_id' => $SupUser->id]) }}"
                                                class="btn btn-success btn-sm">Update</a>

                                        </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                            {{-- {{ route('subcatagory.Restor',['cate_id'=>$listCat->id ]) }} --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Verified</th>
                                <th scope="col">is active</th>
                                <th scope="col">create</th>
                                <th scope="col">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-hover datatable table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Verified</th>
                                <th scope="col">is active</th>
                                <th scope="col">create</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Admin as $key => $admin)
                                <tr class="table-light">
                                    <th scope="row"><a href="#">#{{ $admin->id }}</a></td>
                                    <td>{{ Str::limit($admin->name,10) }}</td>
                                    <td><a class="" href=""><span>@</span>{{ Str::limit($admin->username,6) }}</a></td>
                                    <td><a href="mailto:{{ $admin->email }}">{{ $admin->email }}</a></td>
                                    <td><img src="{{ asset('image/users') }}/{{ $admin->user_image }}" height="35px" width="35px" alt=""></td>
                                    <td>
                                        @if ($admin->email_verified == 1)
                                            <i class="bi bi-patch-check-fill text-primary"></i>
                                        @else
                                            <i class="bi bi-patch-exclamation text-danger"></i>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input is_active_switch" id="switch[{{ $key }}]" data-id="{{$admin->id}}" {{ $admin->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label" for="switch[{{ $key }}]"></label>
                                        </div>
                                        
                                    </td>
                                    <td>{{ $admin->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#adminUpdateModal" data-admin_id="{{ $admin->id }}" data-admin_name="{{ $admin->name }}" data-admin_username="{{ $admin->username }}" data-admin_email="{{ $admin->email }}" data-admin_role_int="{{ $admin->role_int }}" data-admin_role="{{ $admin->role }}" class="btn btn-warning">
                                                <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                            </button>
                                            <button type="submit" data-bs-toggle="modal" data-bs-target="#deleteUser" data-id="{{ $admin->id }}" class="btn btn-danger">
                                                <i class="bi bi-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        {{-- <a class="text-success" href=""><i class="bi bi-pencil-square"></i></a><span>&nbsp;&nbsp;</span><a class="text-danger" href=""><i class="bi bi-trash"></i></a> --}}
                                        {{-- <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('supuser.UpdateUser', ['user_id' => $blogUser->id]) }}"
                                                class="btn btn-success btn-sm">Update</a>
                                            <a href="{{ route('supuser.archiveUser', ['user_id' => $blogUser->id]) }}"
                                                class="btn btn-warning btn-sm">Archive</a>
                                            <a href="{{ route('supuser.BlockUser', ['user_id' => $blogUser->id]) }}"
                                                class="btn btn-danger btn-sm">Block</a>
                                        </div> --}}

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Verified</th>
                                
                                <th scope="col">is active</th>
                                <th scope="col">create</th>
                                <th scope="col">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
            </div><!-- End Default Tabs -->

        </div>
    </div>





    

    </div>
    </div>
    

    @include('dashboard.users.partials.modal')
@endsection
@section('js')
@include('dashboard.users.partials.js')
@endsection
