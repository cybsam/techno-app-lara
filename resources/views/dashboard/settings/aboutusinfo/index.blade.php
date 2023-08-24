@extends('layouts.SupUserMaster')
@section('title', 'Settings ~ About Us Information or Address - Techno Apogee Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Address or About us information</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Settings</a></li>
                <li class="breadcrumb-item active">About Us Information</li>
            </ol>
        </nav>
    </div>
    

    <div class="conainer">
        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Company Name</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_name }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Website</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_web }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Email</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_email }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Office Time</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_office_time }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Header</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_header }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Description</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_description }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Address 1</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_address_1 }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Address 2</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_address_2 }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Mobile 1</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_mobile_1 }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Mobile 2</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_mobile_2 }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Telephone</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_telephone }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Facebook Page</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_facebook }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Twitter Username</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_twitter }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Linkdein</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_linkedin }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company Telegram</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_telegram }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company WhatsApp</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_whatsapp }}</th>
                        </tr>
                        <tr>
                            <th scope="col">Company YouTube</th>
                            <th scope="col">:</th>
                            <th scope="">{{ $companyInfo->company_youtube }}</th>
                        </tr>
                    </thead>
                </table>
                <div class="text-info">
                    <a href="{{ route('SupUser.SetingsAboutUsInfoUpd',['aboutusinfo_id'=>$companyInfo->id]) }}" class="btn btn-outline-warning text-black">Update Contact Information</a>
                </div>
            </div>
        </div>
    </div>






@include('dashboard.settings.aboutusinfo.partials.modal')
@endsection
@section('js')
@include('dashboard.settings.aboutusinfo.partials.js')
@endsection