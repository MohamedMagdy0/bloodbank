    @extends('layouts.front.front-master', ['pageClass' => 'signin-account'])

    @section('page_title')
        login
    @endsection

    @section('content')


        <!--form-->
        <div class="form">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                        </ol>
                    </nav>
                </div>
                <div class="signin-form">
                    <!-- form -->


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


                    <form method="POST" action="{{ route('login-client.store') }}">
                        @csrf

                        <div class="logo">
                            <img src="{{ asset('Front/imgs/logo.png') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" id="phone"
                                aria-describedby="phone" value="{{ old('phone') }}" placeholder="الجوال">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                                id="password" placeholder="كلمة المرور">
                        </div>
                        <div class="row options">
                            <div class="col-md-6 remember">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                                </div>
                            </div>
                            <div class="col-md-6 forgot">
                                <img src="{{ asset('Front/imgs/complain.png') }}">
                                <a href="{{ route('reset-client') }}">هل نسيت كلمة المرور</a>
                            </div>
                        </div>
                        <div class="row buttons">
                            <div class="col-md-6 right">
                                <button type="submit" class="btn btn-lg btn-primary">دخول</button>
                            </div>
                            <div class="col-md-6 left">
                                <a href="{{ route('register-client') }}">انشاء حساب جديد</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- @include('layouts.front.master-footer') --}}
    @endsection
