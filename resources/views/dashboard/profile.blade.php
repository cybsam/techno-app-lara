@extends('layouts.SupUserMaster')
@section('title', 'Profile ~ User - Techno Apogee Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Super User Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Users</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ asset('image/users') }}/{{ Auth::user()->user_image }}" alt="Profile"
                            class="rounded-circle">
                        <h2>{{ Str::title(Auth::user()->name) }}</h2>
                        <h3>{{ Str::title(Auth::user()->role) }}</h3>

                        <div class="social-links mt-2">
                            
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->


                        <ul class="nav nav-tabs nav-tabs-bordered">

                            

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>



                            <li class="nav-item">
                                <button class="nav-link " data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            @if ($errors->all())
                                <span class="text-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </span>
                            @endif
                            @if (Session::get('success'))
                                    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                        role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (Session::get('logfail'))
                                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                                        role="alert">
                                        {{ Session::get('logfail') }}
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('SupUser.ProfileUpdateNameImage') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ asset('image/users') }}/{{ Auth::user()->user_image }}"
                                                alt="Profile">
                                            <div class="pt-2">
                                                
                                                    <input type="file" name="profileImageUpload" id="profileImageUpload" class="btn btn-primary btn-sm">
                                                
                                                    
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="changeFullName" type="text" class="form-control"
                                                placeholder="Your Full Name" id="changeFullName"
                                                value="{{ Str::title(Auth::user()->name) }}">
                                            @error('changeFullName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>



                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="oldpassword" type="password" placeholder="Current Password"
                                                class="form-control @error('oldpassword') is-invalid @enderror"
                                                id="oldpassword">
                                            <div class="">
                                                @error('oldpassword')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" placeholder="New Password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password">
                                            <div class="">
                                                @error('password')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password_confirmation" type="password"
                                                placeholder="Re-enter New Password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation">
                                            <div class="">
                                                @error('password_confirmation')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection
