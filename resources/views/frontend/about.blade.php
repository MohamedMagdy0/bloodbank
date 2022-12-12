@extends('layouts.front.front-master',['pageClass'=>'about-us'])

@section('page_title')
About Us
@endsection

@section('content')



        <!--inside-article-->
        <div class="about-us my-5">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">من نحن</li>
                        </ol>
                    </nav>
                </div>
                <div class="details my-5">
                    <div class="logo">
                        <img src="{{ asset('Front/imgs/logo.png') }}">
                    </div>
                    <div class="text">
                        <p class="m-5">{{ $settings->about_us_text }}</p>
                    </div>
                </div>
            </div>
        </div><!-- about-us -->


@endsection
