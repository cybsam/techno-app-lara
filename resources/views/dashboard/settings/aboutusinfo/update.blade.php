@extends('layouts.SupUserMaster')
@section('title', 'Settings ~ About Us Information or Address - Techno Apogee Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Address or About us information</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Settings</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.SetingsAboutUsInfo') }}">About Us Information</a></li>
                <li class="breadcrumb-item active">About Us Information Update</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>About Us Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('SupUser.SetingsAboutUsInfoUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Company Name</label>
                    <input type="text" name="company_name" value="{{ $checkDBFromId->company_name }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Website</label>
                    <input type="text" name="company_web" value="{{ $checkDBFromId->company_web }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Email</label>
                    <input type="text" name="company_email" value="{{ $checkDBFromId->company_email }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Office Time</label>
                    <input type="text" name="office_time" value="{{ $checkDBFromId->company_office_time }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Header</label>
                    <input type="text" name="company_header" value="{{ $checkDBFromId->company_header }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Description</label>
                    <input type="text" name="company_description" value="{{ $checkDBFromId->company_description }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Address 1</label>
                    <input type="text" name="company_address_1" value="{{ $checkDBFromId->company_address_1 }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Address 2</label>
                    <input type="text" name="company_address_2" value="{{ $checkDBFromId->company_address_2 }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Mobile 1</label>
                    <input type="text" name="company_mobile_1" value="{{ $checkDBFromId->company_mobile_1 }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Mobile 2</label>
                    <input type="text" name="company_mobile_2" value="{{ $checkDBFromId->company_mobile_2 }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Telephone</label>
                    <input type="hidden" name="id" value="1">
                    <input type="text" name="company_tele" value="{{ $checkDBFromId->company_telephone }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Facebook Page</label>
                    <input type="text" name="facebook_page" value="{{ $checkDBFromId->company_facebook }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Twitter Username</label>
                    <input type="text" name="twitter_username" value="{{ $checkDBFromId->company_twitter }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Linkdein</label>
                    <input type="text" name="linkedin_user" value="{{ $checkDBFromId->company_linkedin }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company Telegram</label>
                    <input type="text" name="telegram_link" value="{{ $checkDBFromId->company_telegram }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company WhatsApp</label>
                    <input type="text" name="whatsapp_number" value="{{ $checkDBFromId->company_whatsapp }}" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">Company YouTube</label>
                    <input type="text" name="youtube_channel" value="{{ $checkDBFromId->company_youtube }}" class="form-control" id="company_name">
                </div>
                <hr>
                
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="submit">Update Information</button>
                  </div>
            </form>
        </div>
    </div>

@include('dashboard.settings.aboutusinfo.partials.modal')
@endsection
@section('js')
@include('dashboard.settings.aboutusinfo.partials.js')
@endsection