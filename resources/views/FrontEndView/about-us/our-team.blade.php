@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Our Team ~ About Us - Fire Panel Repair & Maintenance BD | Techno Apogee Limited')
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
    <style>
        .team-member {
            background: #e6e2e0;
            text-align: center;
            transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
        }

        .team-member .team-photo {
            background: #fff;
            min-height: 200px;
            margin: 0 auto;
            padding: 24px 24px 32px 24px;
        }

        .team-member .team-attrs {
            padding: 2px 16px 16px 16px;
            color: #303030;
        }

        .team-member .team-attrs .team-name {
            font-size: 21px;
        }

        .team-member .team-attrs .team-position {
            font-size: 12px;
            letter-spacing: 2px;
            color: #a7a7a7;
        }

        .team-member .team-content {
            color: #303030;
            opacity: .8;
            padding: 16px 24px 40px 24px;
        }

        .team-member:hover {
            box-shadow: 2px 3px 9px rgba(0, 0, 0, 0.2);
        }


        /*------------------------------------------------------------------
    [10. Hover Effects]
    */

        .item-wrap {
            margin-bottom: 30px;
        }

        figure {
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        figure img {
            position: relative;
            opacity: 1.0;
        }

        figure figcaption {
            padding: 1.0em;
            color: #303030;
            text-transform: uppercase;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        figure figcaption>.fig-description a {
            z-index: 1000;
            text-indent: 200%;
            white-space: nowrap;
            font-size: 0;
        }

        figure figcaption:before,
        figure figcaption:after {
            pointer-events: none;
        }

        figure figcaption,
        figure figcaption>a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        figure h3 {
            word-spacing: -0.15em;
            font-family: "Montserrat", sans-serif;
        }

        figure h3 span {
            font-family: "Montserrat", sans-serif;
        }

        figure h3,
        figure p {
            margin: 0;
        }

        figure p {
            letter-spacing: 1px;
            font-size: 68.5%;
        }


        /* Team Hover */

        figure.effect-zoe {
            margin: 0;
            width: 100%;
            height: auto;
            min-width: 200px;
            max-height: none;
            max-width: none;
            float: none;
        }

        figure.effect-zoe img {
            display: inline-block;
            opacity: 1;
        }

        figure.effect-zoe p.icon-links {
            margin: 0px;
        }

        figure.effect-zoe p.icon-links a {
            color: #fff;
            -webkit-transition: -webkit-transform 0.35s;
            transition: transform 0.35s;
            -webkit-transform: translate3d(0, 200%, 0);
            transform: translate3d(0, 200%, 0);
        }

        figure.effect-zoe p.icon-links a i::before {
            color: #fff;
            font-size: 24px;
            display: inline-block;
            padding: 15px 10px;
            margin-left: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        figure.effect-zoe p.icon-links a:hover i::before {
            color: #f2f2f2;
        }

        figure.effect-zoe p.phone-number a {
            color: #fff;
            font-size: 12px;
        }

        figure.effect-zoe p.phone-number a:hover {
            color: #f2f2f2;
            text-decoration: none;
        }

        figure.effect-zoe figcaption {
            top: auto;
            bottom: 0;
            padding: 0;
            height: 8em;
            background: #a7a7a7;
            border-top: 3px solid #fff;
            color: #5d5d5d;
            -webkit-transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }

        figure.effect-zoe:hover figcaption,
        figure.effect-zoe:hover h2,
        figure.effect-zoe:hover p.icon-links a {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        figure.effect-zoe:hover p.icon-links a:nth-child(3) {
            -webkit-transition-delay: 0.1s;
            transition-delay: 0.1s;
        }

        figure.effect-zoe:hover p.icon-links a:nth-child(2) {
            -webkit-transition-delay: 0.15s;
            transition-delay: 0.15s;
        }

        figure.effect-zoe:hover p.icon-links a:first-child {
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
        }
    </style>

    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#303030">
                    Our team
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row bootstrap snippets bootdey">
            <div class="col-md-4">
                <div class="team-member">
                    <figure class="effect-zoe">
                        <div class="team-photo">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Rachel James Johnes"
                                class="img-responsive">
                        </div>
                        <div class="team-attrs">
                            <div class="team-name font-accident-two-bold-italic">Jack Moss</div>
                            <div class="team-position">CEO</div>
                        </div>
                        {{-- <div class="team-content small">
                            Truong is also the recipient of The George C. Lin Emerging Filmmaker Award from the San Diego
                        </div> --}}
                        <figcaption>

                            <p class="icon-links">
                                <a href="#!"><i class="fa fa-google"></i></a>
                                <a href="#!"><i class="fa fa-instagram"></i></a>
                                <a href="#!"><i class="fa fa-facebook"></i></a>
                            </p>

                            <p class="phone-number">
                                <a href="#!">tel: 1 234 567-89-10</a>
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="dividewhite4"></div>
            </div>

            <div class="col-md-4">
                <div class="team-member">
                    <figure class="effect-zoe">
                        <div class="team-photo">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Rachel James Johnes"
                                class="img-responsive">
                        </div>
                        <div class="team-attrs">
                            <div class="team-name font-accident-two-bold-italic">Kate Keppler</div>
                            <div class="team-position">Art-Director</div>
                        </div>
                        <div class="team-content small">
                            Truong is also the recipient of The George C. Lin Emerging Filmmaker Award from the San Diego
                        </div>
                        <figcaption>
                            <p class="icon-links">
                                <a href="#!"><i class="fa fa-google"></i></a>
                                <a href="#!"><i class="fa fa-instagram"></i></a>
                                <a href="#!"><i class="fa fa-facebook"></i></a>
                            </p>

                            <p class="phone-number">
                                <a href="#!">tel: 1 234 567-89-10</a>
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="dividewhite4"></div>
            </div>

            <div class="col-md-4">
                <div class="team-member">
                    <figure class="effect-zoe">
                        <div class="team-photo">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Rachel James Johnes"
                                class="img-responsive">
                        </div>
                        <div class="team-attrs">
                            <div class="team-name font-accident-two-bold-italic">Mario Quinn</div>
                            <div class="team-position">Designer</div>
                        </div>
                        <div class="team-content small">
                            Truong is also the recipient of The George C. Lin Emerging Filmmaker Award from the San Diego
                        </div>
                        <figcaption>
                            <p class="icon-links">
                                <a href="#!"><i class="fa fa-google"></i></a>
                                <a href="#!"><i class="fa fa-instagram"></i></a>
                                <a href="#!"><i class="fa fa-facebook"></i></a>
                            </p>

                            <p class="phone-number">
                                <a href="#!">tel: 1 234 567-89-10</a>
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="dividewhite4"></div>
            </div>

            <div class="col-md-4">
                <div class="team-member">
                    <figure class="effect-zoe">
                        <div class="team-photo">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Rachel James Johnes"
                                class="img-responsive">
                        </div>
                        <div class="team-attrs">
                            <div class="team-name font-accident-two-bold-italic">Ramon Vasquez</div>
                            <div class="team-position">Manager</div>
                        </div>
                        <div class="team-content small">
                            Truong is also the recipient of The George C. Lin Emerging Filmmaker Award from the San Diego
                        </div>
                        <figcaption>
                            <p class="icon-links">
                                <a href="#!"><i class="fa fa-google"></i></a>
                                <a href="#!"><i class="fa fa-instagram"></i></a>
                                <a href="#!"><i class="fa fa-facebook"></i></a>
                            </p>

                            <p class="phone-number">
                                <a href="#!">tel: 1 234 567-89-10</a>
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="dividewhite4"></div>
            </div>
        </div>
    </div>





@endsection