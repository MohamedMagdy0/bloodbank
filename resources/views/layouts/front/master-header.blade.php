<!doctype html>
<html lang="en" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <!--google fonts css-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <!--font awesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="icon" href="{{ asset('Front/imgs/Icon.png') }}">

    <!--owl-carousel css-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/assets/css/owl.theme.default.min.css') }}">

    <!--style css-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/style.css') }}">

    <title>Blood Bank</title>
</head>

<body class="{{ $pageClass ?? '' }}">
    <!--upper-bar-->
    <div class="upper-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">

                    <div class="language">
                        <a href="/" class="ar active">عربى</a>
                        <a href="/" class="en inactive">EN</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="social">
                        <div class="icons">
                            <a href="{{ $settings->fb_link }}" class="facebook" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="{{ $settings->insta_link }}" class="instagram" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="{{ $settings->tw_link }}" class="twitter" target="_blank"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="{{ $settings->whatsapp_link }}" class="whatsapp" target="_blank"><i
                                    class="fab fa-whatsapp"></i></a>
                            <a href="{{ route('client.front-logout') }}" onMouseOver="this.style.color='#FFA500'"
                                onMouseOut="this.style.color='#ffff'"><i
                                    class="fas fa-door-open cursor-pointer"></i></a>

                        </div>
                    </div>
                </div>

                <!-- not a member-->
                <div class="col-lg-4">
                    <div class="info" dir="ltr">
                        <div class="phone">
                            <i class="fas fa-phone-alt"></i>
                            <p>{{ $settings->contact_phone }}</p>
                        </div>
                        <div class="e-mail">
                            <i class="far fa-envelope"></i>
                            <p>{{ $settings->contact_email }}</p>
                        </div>
                    </div>

                    {{-- I'm a member --}}

                    {{-- <div class="member">
                            <p class="welcome">مرحباً بك</p>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    احمد محمد
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="index-1.html">
                                        <i class="fas fa-home"></i>
                                        الرئيسية
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-user"></i>
                                        معلوماتى
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-bell"></i>
                                        اعدادات الاشعارات
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-heart"></i>
                                        المفضلة
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-comments"></i>
                                        ابلاغ
                                    </a>
                                    <a class="dropdown-item" href="contact-us.html">
                                        <i class="fas fa-phone-alt"></i>
                                        تواصل معنا
                                    </a>
                                    <a class="dropdown-item" href="index.html">
                                        <i class="fas fa-sign-out-alt"></i>
                                        تسجيل الخروج
                                    </a>
                                </div>
                            </div>
                        </div> --}}



                </div>
            </div>
        </div>
    </div>
