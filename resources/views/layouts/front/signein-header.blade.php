<!doctype html>
<html lang="en" dir="rtl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

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
    <body class="signin-account">
        <!--upper-bar-->
        <div class="upper-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="language">
                            <a href="/" class="ar active">عربى</a>
                            <a href="/" class="en inactive">EN</a>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div class="accounts" dir="ltr">
                            <a href="{{ route('login-client') }}" class="signin">الدخول</a>
                            <a href="{{ route('register-client') }}" class="create-new">إنشاء حساب جديد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
