@extends('layouts.SupUserMaster')
@section('title', 'Team Category ~ Techno Apogee')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Team Category </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Settings</a></li>
                <li class="breadcrumb-item active">Management</li>
            </ol>
        </nav>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                <a href="{{ route('SupUser.TeamManagementDegination') }}" class="btn btn-success">Show Degination</a>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addManagementCate">+
                    Management</button>
            </div>
        </div>
        <div class="card-body">
            <div class="text-info">
                @if (Session::get('succ'))
                    <span>{{ Session::get('succ') }}</span>
                @endif
            </div>
            <div class="text-danger">
                @if (Session::get('err'))
                    <span>{{ Session::get('err') }}</span>
                @endif
            </div>
            <table class="table table-hover datatable table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Management Department</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Added By</th>
                        <th scope="col">Create at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($getData as $key => $Data)
                        <tr class="table-light">
                            <th scope="row"><a href="#">#{{ $Data->id }}</a></td>
                            <td>{{ Str::limit($Data->team_department, 30) }}</td>
                            <td>{{ Str::limit($Data->team_department_slug, 30) }}</td>
                            <td>{{ Str::title($Data->add_by) }}</td>


                            <td>{{ $Data->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    
                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#deleteUser"
                                        data-id="{{ $Data->id }}" class="btn btn-danger">
                                        <i class="bi bi-trash" aria-hidden="true"></i>
                                    </button>
                                </div>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Management Department</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Added By</th>
                        <th scope="col">Create at</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="modal fade" id="addManagementCate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add team member</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('SupUser.TeamManagementInsertTr') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Management Name</label>
                            <input type="text" name="team_department_slug" id="management-name" required
                                class="form-control">
                            @error('team_department_slug')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Insert Management</button>
                        </div>


                    </div>

                </form>




                </form>
            </div>
        </div>
    </div>



@endsection
