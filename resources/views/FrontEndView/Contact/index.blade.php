@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Contact ~ Fire Panel Repair & Maintenance BD | Techno Apogee Limited')
@section('content')

<style>
    .rs-breadcrumbs {
        background-image: url("public/image/fontend/img/breadcrumbs/inr_6.jpg");
        /* background-image: url('./public/image/fontend/img/breadcrumbs/inr_6.jpg'); */
        background-repeat: no-repeat !important;
        background-size: cover !important;
        background-position: center !important;
    }
</style>

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                Contact Us
            </h1>
        </div>
    </div>
</div>

<section id="contact-information">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="address-contact text-center">

                    <h5>Address</h5>
                    <h6><b>Dhaka Office:</b> House # 226, Road# 03, Avenue # 01 , Mirpur DOHS, Dhaka – 1216.</h6>
                    <h6><b>Ctg. Office:</b> House # 50, Road # 04, O.R. Nizam Road (R/A), GEC Circle, Ctg, Bangladesh.
                    </h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="address-contact text-center">
                    <h5>Phone</h5>
                    <h6>+880-2- 55041062</h6>
                    <h6>+880-2- 55041063</h6>
                    <h6>+880 1714378008</h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="address-contact text-center">
                    <h5>Email</h5>
                    <h6>info@technoapogee.com, technoapogee@gmail.com</h6>

                </div>
            </div>
        </div>
    </div>
</section>
<section id="conform">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contactlist text-center">
                    <form>

                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Mobile No.">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="message">
                            <textarea name="" id="" placeholder="Message"></textarea>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="iframe">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3649.5574241040745!2d90.36603400000001!3d23.834332!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcf8b78b8fb2e30e0!2sTechno%20Apogee!5e0!3m2!1sen!2sus!4v1674060355076!5m2!1sen!2sus"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

</div>




@endsection