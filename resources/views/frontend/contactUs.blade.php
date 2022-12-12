@extends('layouts.front.front-master', ['pageClass' => 'contact-us'])

@section('page_title')
    Contact Us
@endsection

@section('content')
    <!--contact-us-->
    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{ asset('Front/imgs/logo.png') }}">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>الجوال:</span> {{ $settings->contact_phone }}</li>
                                    <li><span>فاكس:</span> {{ $settings->contact_fax }}</li>
                                    <li><span>البريد الإلكترونى:</span> {{ $settings->contact_email }}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons  " dir="ltr">
                                    <div class="out-icon">
                                        <a href="{{ $settings->fb_link }}"><img
                                                src="{{ asset('Front/imgs/001-facebook.svg') }}" width="30"
                                                target="_blank"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->tw_link }}"><img
                                                src="{{ asset('Front/imgs/002-twitter.svg') }}" width="30"
                                                target="_blank"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->youtube_link }}"><img
                                                src="{{ asset('Front/imgs/003-youtube.svg') }}" width="30"
                                                target="_blank"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->insta_link }}"><img
                                                src="{{ asset('Front/imgs/004-instagram.svg') }}" width="30"
                                                target="_blank"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->whatsapp_link }}"><img
                                                src="{{ asset('Front/imgs/005-whatsapp.svg') }}" width="30"
                                                target="_blank"></a>
                                    </div>
                                    {{-- <div class="out-icon">
                                            <a href="#"><img src="{{ asset('Front/imgs/006-google-plus.svg') }}" width="30"></a>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- @if (auth('web-client')) --}}
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>

                        <div class="fields">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" action="{{ route('contact-us.store') }}">

                                @csrf
                                {{-- <input type="text" name="" class="form-control" id="exampleFormControlInput1" placeholder="الإسم" name="name"> --}}
                                {{-- <input type="email" name="" class="form-control" id="exampleFormControlInput1" placeholder="البريد الإلكترونى" name="email"> --}}
                                {{-- <input type="text" name="" class="form-control" id="exampleFormControlInput1" placeholder="الجوال" name="phone"> --}}
                                <input type="text" name="title_message" class="form-control"
                                    id="exampleFormControlInput1" placeholder="عنوان الرسالة">
                                <textarea placeholder="نص الرسالة" name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                                <button type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- @else
                    <a href="{{ route('clients.create') }}"></a>
                @endif --}}


            </div>
        </div>
    </div>
@endsection
